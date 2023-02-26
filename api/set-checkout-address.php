<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


function redirectBackWithError(int|string $errorCode, ?string $errorField = null): void
{
    global $isCreatingCheckout;

    // TODO: redirect to #error
    $parameters = ["error" => $errorCode, "field" => $errorField];
    if ($isCreatingCheckout) {
        $parameters["create"] = "yes";
    }

    API::redirectToPage(Page::Checkout, $parameters);
}


// TODO: handle numeric error codes
$shippingRateHandle = $_POST["delivery-method"] ?? redirectBackWithError(400);
$shippingAddressInfo = (object) [];

$isCreatingCheckout = (bool) $_POST["is-creating-checkout"];
$customerAccessToken = $_POST["customer-access-token"] ?? null;


$shippingAddressInfo->title = NameTitle::tryFrom($_POST["title"]) ?? redirectBackWithError(400);
$shippingAddressInfo->firstName = $_POST["first-name"] ?? redirectBackWithError(400);
$shippingAddressInfo->lastName = $_POST["last-name"] ?? redirectBackWithError(400);
$shippingAddressInfo->email = $_POST["email"] ?? redirectBackWithError(400);

if ($shippingRateHandle === Cart::SHOPIFY_CLICK_COLLECT_HANDLE) {
    $shippingAddressInfo->phone = $_POST["phone"] ?? null;

    // set business address for Click & Collect
    $shippingAddressInfo->address1 = Info::BUSINESS_ADDRESS_LINE_1;
    $shippingAddressInfo->address2 = Info::BUSINESS_ADDRESS_LINE_2;
    $shippingAddressInfo->postalCode = (string) Info::BUSINESS_ADDRESS_POSTAL_CODE;
    $shippingAddressInfo->countryCode = Info::BUSINESS_ADDRESS_COUNTRY_CODE;
    $shippingAddressInfo->country = Info::COUNTRIES_SELLING[$shippingAddressInfo->countryCode];
    $shippingAddressInfo->city = Info::BUSINESS_ADDRESS_CITY;
} else {
    $shippingAddressInfo->phone = $_POST["phone"] ?? redirectBackWithError(400);

    $shippingAddressInfo->address1 = $_POST["address-1"] ?? redirectBackWithError(400);
    $shippingAddressInfo->address2 = $_POST["address-2"] ?? null;
    $shippingAddressInfo->postalCode = $_POST["postal-code"] ?? redirectBackWithError(400);
    $shippingAddressInfo->countryCode = $_POST["country"] ?? redirectBackWithError(400);
    $shippingAddressInfo->country = Info::COUNTRIES_SELLING[$shippingAddressInfo->countryCode];
    $shippingAddressInfo->city = $_POST["city"] ?? redirectBackWithError(400);
}


Session::start();

if (!isset($_SESSION[Session::KEY_CHECKOUT_ID]) || !mb_strlen($_SESSION[Session::KEY_CHECKOUT_ID])) {
    // create checkout from cart
    $cartID = $_SESSION[Session::KEY_CART_ID] ?? redirectBackWithError(500);
    $cartInfo = Shopify::retrieveCart($cartID);
    if (is_null($cartInfo)) {
        redirectBackWithError(500);
    }

    $creationResponseData = Shopify::createCheckoutFromCartAndAddress($cartInfo, $shippingAddressInfo);
    $creationError = Shopify::parseStorefrontAPIError($creationResponseData->checkoutUserErrors ?? null);
    if (!is_null($creationError)) {
        redirectBackWithError($creationError->code, $creationError->field);
    }

    $checkoutID = $creationResponseData->checkout->id;
    $_SESSION[Session::KEY_CHECKOUT_ID] = $checkoutID;


    // apply cart discount codes if any
    if (!empty($cartInfo->discountCodes) && is_array($cartInfo->discountCodes)) {
        foreach ($cartInfo->discountCodes as $discountCode) {
            if ($discountCode->applicable) {
                // TODO: handle errors
                $discountResponseData = Shopify::applyCheckoutDiscountCode($checkoutID, $discountCode->code);
            }
        }
    }


    // associate customer if logged in
    if (!empty($customerAccessToken)) {
        $associationResponseData = Shopify::associateCustomerWithCheckout($checkoutID, $customerAccessToken);
        $associationError = Shopify::parseStorefrontAPIError($associationResponseData->checkoutUserErrors ?? null);
        if (!is_null($associationError)) {
            redirectBackWithError($associationError->code, $associationError->field);
        }
    }


    // poll checkout info for shipping rate handles
    $availableShippingRates = null;
    $availableShippingRatesPollingRetryCount = 5;
    $availableShippingRatesPollingRetryIntervalSeconds = 3;
    foreach (range(1, $availableShippingRatesPollingRetryCount) as $i) {
        if ($i > 1) {
            sleep($availableShippingRatesPollingRetryIntervalSeconds);
        }

        $directlyQueriedCheckoutInfo = Shopify::queryCheckout($checkoutID);
        $availableShippingRatesInfo = $directlyQueriedCheckoutInfo->availableShippingRates;

        if (Env::isDevEnv()) {
            \Shopify\Context::log(
                "$i" . PHP_EOL .
                print_r($availableShippingRatesInfo, true) . PHP_EOL
            );
        }

        // TODO: break only when the exact handle is found
        if (!empty($availableShippingRatesInfo->shippingRates)) {
            $availableShippingRates = $availableShippingRatesInfo->shippingRates;
            break;
        }
    }
    // TODO: return error if not found


    // FIXME: empty the cart after checkout being completed
//    Cart::create(onlyIfNone: false);
} else {
    // existing checkout; update address
    $checkoutID = $_SESSION[Session::KEY_CHECKOUT_ID];
    // TODO: handle errors
    Shopify::updateCheckoutShippingAddress($checkoutID, $shippingAddressInfo);
}


// update shipping line
$updateResponseData = Shopify::updateCheckoutShippingLine($checkoutID, $shippingRateHandle);
$updateError = Shopify::parseStorefrontAPIError($updateResponseData->checkoutUserErrors ?? null);
if (!is_null($updateError)) {
    redirectBackWithError($updateError->code, $updateError->field);
}


if (Checkout::SHOULD_REDIRECT_TO_SHOPIFY_WEB_CHECKOUT) {
    $checkoutBrief = $updateResponseData->checkout;

    // FIXME: poll if not ready
    if (!$checkoutBrief->ready || empty($checkoutBrief->webUrl)) {
    }

    API::redirectToURL($checkoutBrief->webUrl);
} else {
    // FIXME: confirm checkout is ready & has web URL before redirecting
    API::redirectToPage(Page::Checkout);
}

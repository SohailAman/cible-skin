<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


function redirectBackWithError(int|string $errorCode, ?string $errorField = null): void
{
    global $destinationPage, $isCreatingCheckout;

    // TODO: redirect to #error
    $parameters = ["destination" => $destinationPage?->value, "error" => $errorCode, "field" => $errorField];
    if ($isCreatingCheckout) {
        $parameters["create"] = "yes";
    }

    API::redirectToPage(Page::Login, $parameters);
}


$destinationPage = Page::tryFrom($_POST["destination"]);
$isCreatingCheckout = (bool) ($_POST["is-creating-checkout"] ?? null);

$email = $_POST["email"] ?? redirectBackWithError(400);
$password = $_POST["password"] ?? redirectBackWithError(400);
$shouldRememberCustomer = (bool) ($_POST["remember-me"] ?? null);

$localWishList = $_POST["wish-list"] ?? null;


$loginResponseData = Shopify::createAccessTokenUsingEmailAndPassword($email, $password);
$loginError = Shopify::parseStorefrontAPIError($loginResponseData->customerUserErrors ?? null);
if (!is_null($loginError)) {
    redirectBackWithError($loginError->code, $loginError->field);
}


$customerAccessToken = $loginResponseData?->customerAccessToken?->accessToken;
if (is_null($customerAccessToken)) {
    // TODO: handle unexpected error
}

Session::start(shouldLast: $shouldRememberCustomer);

$_SESSION[Session::KEY_CUSTOMER_ACCESS_TOKEN] = $customerAccessToken;

// FIXME: handle token expiration


// TODO: handle errors
$briefCustomerInfo = Shopify::queryCustomerInfoByAccessToken($customerAccessToken, true);
$customerID = $briefCustomerInfo->id;
$wishListMetafieldID = $briefCustomerInfo->wishList->id ?? null;
$existingWishList = $briefCustomerInfo->wishList->value ?? null;

$_SESSION[Session::KEY_CUSTOMER_ID] = $customerID;


// store local wish list to customer account, only if customer currently has none
if (empty($existingWishList) || empty(json_decode($existingWishList))) {
    if (!is_null($localWishList)) {
        $localWishList = json_decode($localWishList);
        if (is_array($localWishList) && !empty($localWishList)) {
            Shopify::updateCustomerWishList($customerID, $wishListMetafieldID, $localWishList);
        }
    }
}


// associate buyer identity to the cart
Cart::create();
$cartID = $_SESSION[Session::KEY_CART_ID];
Shopify::updateCartBuyerIdentity($cartID, $customerAccessToken);


API::redirectToPage($destinationPage ?? Page::Checkout, ["create" => $isCreatingCheckout ? "yes" : null]);

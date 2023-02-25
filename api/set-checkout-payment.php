<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


function redirectBackWithError(int|string $errorCode, ?string $errorField = null): void
{
    // TODO: redirect to #error
    API::redirectToPage(Page::Checkout, ["error" => $errorCode, "field" => $errorField]);
}


$paymentMethod = PaymentMethod::tryFrom($_POST["payment-method"]) ?? redirectBackWithError(400);
// FIXME: validate total amount
$totalAmount = $_POST["total-amount"] ?? redirectBackWithError(500);
$currencyCode = $_POST["currency-code"] ?? redirectBackWithError(500);

$agreementAccepted = $_POST["agreement-accepted"] ?? null;
$subscribingNewsletter = $_POST["subscribing-newsletter"] ?? null;


Session::start();

$checkoutID = $_SESSION[Session::KEY_CHECKOUT_ID] ?? redirectBackWithError(500);


if ($paymentMethod === PaymentMethod::CreditCard) {
    $billingAddressInfo = (object) [];

    $billingAddressInfo->firstName = $_POST["billing-address-first-name"] ?? redirectBackWithError(400);
    $billingAddressInfo->lastName = $_POST["billing-address-last-name"] ?? redirectBackWithError(400);
    $billingAddressInfo->phone = $_POST["billing-address-phone"] ?? redirectBackWithError(400);
    $billingAddressInfo->company = $_POST["billing-address-company"] ?? null;

    $billingAddressInfo->address1 = $_POST["billing-address-address-1"] ?? redirectBackWithError(400);
    $billingAddressInfo->address2 = $_POST["billing-address-address-2"] ?? null;
    $billingAddressInfo->postalCode = $_POST["billing-address-postal-code"] ?? redirectBackWithError(400);
    $billingAddressInfo->country = $_POST["billing-address-country"] ?? redirectBackWithError(400);
    $billingAddressInfo->province = $_POST["billing-address-province"] ?? null;
    $billingAddressInfo->city = $_POST["billing-address-city"] ?? redirectBackWithError(400);


    $cardNumber = $_POST["card-number"] ?? redirectBackWithError(400);
    $cardHolderName = $_POST["card-holder-name"] ?? redirectBackWithError(400);
    $expirationDate = $_POST["expiration-date"] ?? redirectBackWithError(400);
    $cvv = $_POST["cvv"] ?? redirectBackWithError(400);

    if (preg_match("/" . PaymentMethod::CREDIT_CARD_EXPIRATION_DATE_PATTERN . "/", $expirationDate) === 0) {
        redirectBackWithError(400);
    }


    $cardHolderNameParts = explode(" ", $cardHolderName, 2);
    $cardHolderFirstName = $cardHolderNameParts[0];
    $cardHolderLastName = $cardHolderNameParts[1] ?? "";

    [$expirationMonth, $expirationYear] = explode("/", $expirationDate, 2);


    // submit credit card info to get vault ID
    $vaultResponseData = Shopify::storeCreditCardInCardVault(
        $cardNumber,
        $cardHolderFirstName,
        $cardHolderLastName,
        $expirationMonth,
        $expirationYear,
        $cvv
    );
    $vaultID = $vaultResponseData->id;


    // complete checkout with credit card
    $completionResponseData = Shopify::completeCheckoutWithCreditCard(
        true,
        $checkoutID,
        $vaultID,
        $totalAmount,
        $currencyCode,
        $billingAddressInfo
    );

    if (is_null($completionResponseData)) {
        redirectBackWithError("access_denied", "checkoutcompletion");
    }

    $completionError = Shopify::parseStorefrontAPIError($completionResponseData->checkoutUserErrors ?? null);
    if (!is_null($completionError)) {
        redirectBackWithError($completionError->code, $completionError->field);
    }
}



API::redirectToPage(Page::Merci);

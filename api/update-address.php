<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


function redirectBackWithError(int|string $errorCode, ?string $errorField = null): void
{
    // TODO: redirect to #error
    API::redirectToPage(Page::Account, ["error" => $errorCode, "field" => $errorField]);
}


$addressID = $_POST["id"] ?? redirectBackWithError(500);
$customerAccessToken = $_POST["customer-access-token"] ?? redirectBackWithError(500);

$addressInfo = (object) [];

$addressInfo->firstName = $_POST["first-name"] ?? redirectBackWithError(400);
$addressInfo->lastName = $_POST["last-name"] ?? redirectBackWithError(400);
$addressInfo->phone = $_POST["phone"] ?? redirectBackWithError(400);
$addressInfo->company = $_POST["company"] ?? null;

$addressInfo->address1 = $_POST["address-1"] ?? redirectBackWithError(400);
$addressInfo->address2 = $_POST["address-2"] ?? null;
$addressInfo->postalCode = $_POST["postal-code"] ?? redirectBackWithError(400);
$addressInfo->country = $_POST["country"] ?? redirectBackWithError(400);
$addressInfo->province = $_POST["province"] ?? null;
$addressInfo->city = $_POST["city"] ?? redirectBackWithError(400);


Session::start();


$responseData = Shopify::updateCustomerAddress($addressID, $customerAccessToken, $addressInfo);
$error = Shopify::parseStorefrontAPIError($responseData->customerUserErrors ?? null);
if (!is_null($error)) {
    redirectBackWithError($error->code, $error->field);
}



API::redirectToPage(Page::Account, ["section" => "addresses"]);

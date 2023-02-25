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


Session::start();


$responseData = Shopify::deleteCustomerAddress($addressID, $customerAccessToken);
$error = Shopify::parseStorefrontAPIError($responseData->customerUserErrors ?? null);
if (!is_null($error)) {
    redirectBackWithError($error->code, $error->field);
}



API::redirectToPage(Page::Account, ["section" => "addresses"]);

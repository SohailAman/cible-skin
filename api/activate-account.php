<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


function redirectBackWithError(int|string $errorCode, ?string $errorField = null): void
{
    global $destinationPage, $activationURL;

    // TODO: redirect to #error
    $parameters = [
        "destination" => $destinationPage?->value,
        "url" => urlencode($activationURL),
        "error" => $errorCode,
        "field" => $errorField,
    ];

    API::redirectToPage(Page::AccountActivation, $parameters);
}


$destinationPage = Page::tryFrom($_POST["destination"]);

$activationURL = $_POST["activation-url"] ?? redirectBackWithError(400);
$activationURL = urldecode($activationURL);
$newPassword = $_POST["new-password"] ?? redirectBackWithError(400);


$activationResponseData = Shopify::activateCustomerByURL($activationURL, $newPassword);
$activationError = Shopify::parseStorefrontAPIError($activationResponseData->customerUserErrors ?? null);
if (!is_null($activationError)) {
    redirectBackWithError($activationError->code, $activationError->field);
}


API::redirectToPage(Page::Login);

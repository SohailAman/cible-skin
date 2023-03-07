<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


function redirectBackWithError(int|string $errorCode, ?string $errorField = null): void
{
    global $destinationPage, $resetURL;

    // TODO: redirect to #error
    $parameters = [
        "destination" => $destinationPage?->value,
        "reset-url" => urlencode($resetURL),
        "error" => $errorCode,
        "field" => $errorField,
    ];

    API::redirectToPage(Page::PasswordReset, $parameters);
}


$destinationPage = Page::tryFrom($_POST["destination"]);

$resetURL = $_POST["reset-url"] ?? redirectBackWithError(400);
$resetURL = urldecode($resetURL);
$newPassword = $_POST["new-password"] ?? redirectBackWithError(400);


$resetResponseData = Shopify::resetCustomerPasswordByResetURL($resetURL, $newPassword);
$resetError = Shopify::parseStorefrontAPIError($resetResponseData->customerUserErrors ?? null);
if (!is_null($resetError)) {
    redirectBackWithError($resetError->code, $resetError->field);
}


API::redirectToPage(Page::Login, ["destination" => $destinationPage?->value, "password" => "reset"]);

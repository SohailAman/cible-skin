<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


function redirectBackWithError(int|string $errorCode, ?string $errorField = null): void
{
    global $destinationPage;

    // TODO: redirect to #error
    $parameters = ["destination" => $destinationPage?->value, "error" => $errorCode, "field" => $errorField];

    API::redirectToPage(Page::ForgotPassword, $parameters);
}


$destinationPage = Page::tryFrom($_POST["destination"]);

$email = $_POST["email"] ?? redirectBackWithError(400);


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirectBackWithError("invalid", "email");
}


$recoveryResponseData = Shopify::sendPasswordRecoveryEmailTo($email);
$recoveryError = Shopify::parseStorefrontAPIError($recoveryResponseData->customerUserErrors ?? null);
if (!is_null($recoveryError)) {
    redirectBackWithError($recoveryError->code, $recoveryError->field);
}


API::redirectToPage(Page::Login, ["destination" => $destinationPage?->value, "recovery-email" => "sent"]);

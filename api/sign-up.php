<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


function redirectBackWithError(int|string $errorCode, ?string $errorField = null): void
{
    global $destinationPage;

    // TODO: redirect to #error
    $parameters = ["destination" => $destinationPage?->value, "error" => $errorCode, "field" => $errorField];

    API::redirectToPage(Page::SignUp, $parameters);
}


$destinationPage = Page::tryFrom($_POST["destination"]);

$email = $_POST["email"] ?? redirectBackWithError(400);
$password = $_POST["password"] ?? redirectBackWithError(400);
$title = NameTitle::tryFrom($_POST["title"]) ?? redirectBackWithError(400);
$firstName = $_POST["first-name"] ?? redirectBackWithError(400);
$lastName = $_POST["last-name"] ?? redirectBackWithError(400);


$creationResponseData = Shopify::createCustomer($email, $password, $firstName, $lastName);
$creationError = Shopify::parseStorefrontAPIError($creationResponseData->customerUserErrors ?? null);
if (!is_null($creationError)) {
    redirectBackWithError($creationError->code, $creationError->field);
}


$newCustomerID = $creationResponseData->customer->id;


// TODO: handle errors
Shopify::updateCustomerTitle($newCustomerID, $title);


API::redirectToPage(Page::Login, ["signed-up" => "yes", "destination" => $destinationPage->value]);

<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


function redirectBackWithError(int|string $errorCode, ?Page $destinationPage): void
{
    API::redirectToPage(Page::NoSignUp, ["error" => $errorCode, "destination" => $destinationPage?->value]);
}


$destinationPage = Page::tryFrom($_POST["destination"]);

$title = NameTitle::tryFrom($_POST["title"]) ?? redirectBackWithError(400, $destinationPage);
$firstName = $_POST["first-name"] ?? redirectBackWithError(400, $destinationPage);
$lastName = $_POST["last-name"] ?? redirectBackWithError(400, $destinationPage);
$email = $_POST["email"] ?? redirectBackWithError(400, $destinationPage);
$phone = $_POST["phone"] ?? redirectBackWithError(400, $destinationPage);

Session::start();
$cartID = $_SESSION[Session::KEY_CART_ID] ?? redirectBackWithError(500, $destinationPage);


// TODO: handle errors
$responseData = Shopify::updateCartAttributes(
    $cartID,
    [
        [
            "key" => "anonymousCustomerTitle",
            "value" => $title->value,
        ],
        [
            "key" => "anonymousCustomerFirstName",
            "value" => $firstName,
        ],
        [
            "key" => "anonymousCustomerLastName",
            "value" => $lastName,
        ],
        [
            "key" => "anonymousCustomerEmail",
            "value" => $email,
        ],
        [
            "key" => "anonymousCustomerPhone",
            "value" => $phone,
        ],
    ],
);


$destinationPage = $destinationPage ?? Page::Checkout;
API::redirectToPage($destinationPage, $destinationPage === Page::Checkout ? ["create" => "yes"] : null);

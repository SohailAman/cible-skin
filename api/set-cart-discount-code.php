<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


function redirectBackWithError(int|string $errorCode, ?string $errorField = null): void
{
    // TODO: redirect to #error
    $parameters = ["error" => $errorCode, "field" => $errorField];

    API::redirectToPage(Page::Cart, $parameters);
}


$discountCode = $_POST["discount-code"] ?? redirectBackWithError(400);
$discountCodes = [$discountCode];


Cart::create();
$cartID = $_SESSION[Session::KEY_CART_ID];

$updateResponseData = Shopify::setCartDiscountCode($cartID, $discountCodes);
$updateError = Shopify::parseStorefrontAPIError($updateResponseData->userErrors ?? null);
if (!is_null($updateError)) {
    redirectBackWithError($updateError->code, $updateError->field);
}


API::redirectToPage(Page::Cart);

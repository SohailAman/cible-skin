<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


$merchandiseID = $_GET["id"] ?? API::errorResponseJSON(400);

Cart::create();
$cartID = $_SESSION[Session::KEY_CART_ID];

$response = Shopify::addLineToCart($cartID, $merchandiseID, 1);


echo API::successResponseJSON();

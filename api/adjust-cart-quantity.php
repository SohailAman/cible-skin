<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


$cartID = $_GET["cart"] ?? API::errorResponseJSON(400);
$cartLineID = $_GET["line"] ?? API::errorResponseJSON(400);
$targetQuantity = $_GET["quantity"] ?? API::errorResponseJSON(400);

$response = Shopify::adjustCartQuantity($cartID, $cartLineID, (int) $targetQuantity);


echo API::successResponseJSON();

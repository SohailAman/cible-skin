<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


$cartID = $_GET["cart"] ?? API::errorResponseJSON(400);
$cartLineID = $_GET["line"] ?? API::errorResponseJSON(400);
$cartLineIDs = [$cartLineID];

$response = Shopify::removeLinesFromCart($cartID, $cartLineIDs);


echo API::successResponseJSON();

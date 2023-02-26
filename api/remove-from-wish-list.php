<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


$productID = $_GET["id"] ?? API::errorResponseJSON(400);


if (!Customer::hasLoggedIn()) {
    API::errorResponseJSON(401);
}
$customerID = $_SESSION[Session::KEY_CUSTOMER_ID];
$customerAccessToken = $_SESSION[Session::KEY_CUSTOMER_ACCESS_TOKEN];


// get current wish list
$customerBriefInfo = Shopify::queryCustomerInfoByAccessToken($customerAccessToken, true) ??
    API::errorResponseJSON(500);
$wishListMetafieldID = $customerBriefInfo->wishList->id ?? API::errorResponseJSON(400);
$wishList = $customerBriefInfo->wishList->value ?? API::errorResponseJSON(400);
$wishList = json_decode($wishList);

if (($productKey = array_search($productID, $wishList)) !== false) {
    unset($wishList[$productKey]);
    $wishList = array_values($wishList);
    // TODO: handle errors
    $response = Shopify::updateCustomerWishList($customerID, $wishListMetafieldID, $wishList);
}


echo API::successResponseJSON();

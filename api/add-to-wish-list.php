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
$wishListMetafieldID = $customerBriefInfo->wishList->id ?? null;
$wishList = $customerBriefInfo->wishList->value ?? null;
$wishList = is_null($wishList) ? [] : json_decode($wishList);

if (!in_array($productID, $wishList)) {
    $wishList[] = $productID;
    // TODO: handle errors
    $response = Shopify::updateCustomerWishList($customerID, $wishListMetafieldID, $wishList);
}


echo API::successResponseJSON();

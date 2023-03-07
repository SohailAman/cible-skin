<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


// empty cart
Cart::create(false);


Session::logout();


API::redirectToPage(Page::ProductList);

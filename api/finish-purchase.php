<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


Customer::hasLoggedIn() ?
    API::redirectToPage(Page::Checkout, ["create" => "yes"]) :
    API::redirectToPage(Page::Login, ["destination" => Page::Checkout->value, "create" => "yes"]);

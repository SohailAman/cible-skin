<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


ob_start();
require __DIR__ . "/../../include/html/cart-slideover.php";
echo ob_get_clean();

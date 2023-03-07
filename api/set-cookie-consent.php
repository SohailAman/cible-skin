<?php

namespace CibleSkin;

require_once __DIR__ . "/../../vendor/autoload.php";


$cookieConsentType = CookieConsentType::tryFrom($_GET["type"]) ?? API::errorResponseJSON(400);

Session::start();
$_SESSION[Session::KEY_COOKIE_CONSENT_TYPE] = $cookieConsentType->value;


// FIXME: store user consent


echo API::successResponseJSON();

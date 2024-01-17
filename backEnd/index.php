<?php

use App\Core\Core;
require 'vendor/autoload.php';
require_once __DIR__."/config.php";
require_once __DIR__."/src/Router/routes.php";
require_once __DIR__."/src/Core/Core.php";

$core = new Core($routes);
$core->run();

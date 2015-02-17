<?php
ini_set('display_errors',1);
require "vendor/autoload.php";

use SQL\createFk;
use SQL\updateFk;
$createFk = new createFk();
$createFk->run();
$updateFk = new updateFk();
$updateFk->run();
?>

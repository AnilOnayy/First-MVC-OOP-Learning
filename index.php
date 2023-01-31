<?php 



require __DIR__."/config.php";
require BASEDIR."vendor/autoload.php";


$cms = new \Core\Starter();

 
require BASEDIR."App/Routes/Route.php";
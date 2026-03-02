<?php
header_remove("X-Powered-By");
define("BASEPATH", TRUE);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require __DIR__ . '/cheeprentalpanel/autoload.php';
$mail = new PHPMailer; 
require __DIR__ . '/application/init.php';
require __DIR__ . '/rental/cheeprentalpanel.php'; 

$first_route = explode('?', $_SERVER["REQUEST_URI"]);
$gets = explode('&', $first_route[1]);
foreach ($gets as $get) {
  $get = explode('=', $get);
  $_GET[$get[0]] = $get[1];
}

$routes = array_filter(explode('/', $first_route[0]));
if (SUBFOLDER === true) {
  array_shift($routes);
  $route = $routes;
} else {
  foreach ($routes as $index => $value):
    $route[$index - 1] = $value;
  endforeach;
}
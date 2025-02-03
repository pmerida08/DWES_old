<?php
require_once "../vendor/autoload.php";
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
define('DBHOST', $_ENV['DBHOST']);
define('DBUSER', $_ENV['DBUSER']);
define('DBPASS', $_ENV['DBPASS']);
define('DBNAME', $_ENV['DBNAME']);
define('DBPORT', $_ENV['DBPORT']);

// define('CLIENT', new Google_Client());
// CLIENT->setClientId($_ENV['CLIENT_ID']);
// CLIENT->setClientSecret($_ENV['CLIENT_SECRET']);
// CLIENT->setRedirectUri($_ENV['REDIRECT_URI']);
// CLIENT->addScope('email');
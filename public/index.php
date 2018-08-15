<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/db.php';

$app = new \Slim\App;

//Customer Routes
require_once '../src/routes/documentation.php';
require_once '../src/routes/books.php';
require_once '../src/routes/customers.php';

//Execute Application
$app->run();
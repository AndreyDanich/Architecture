<?php
session_start();

use app\engine\Db;
use app\engine\Autoload;
use app\models\{Products,Users};
use app\engine\Render;
use app\engine\TwigRender;

//Подключаем автозагрузчик
include "../engine/Autoload.php";
include "../config/config.php";

//регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);


$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    echo "404 нет такого контроллера";
}

//работаем с объектами

//$product = new Products("Пицца","Описание", 125);


//$product->insert();

//$product = Products::getOne(1);
//$product->price = 24;
//$product->update();
//var_dump($product);
//$product->delete();


//$user = new Users("user", 123);
//$user->insert();


//$product = Products::getOne(8);
//$product->delete();

//var_dump($product->getAll());
/*
$user = new Users();

var_dump($user->getOne(1));
var_dump($user->getAll());*/


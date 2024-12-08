<?php
session_start();

$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';

$controllerName = ucfirst($controller) . "Controller";
$controllerFile = "controllers/" . $controllerName . ".php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;

 
    if (class_exists($controllerName)) {
        $controllerInstance = new $controllerName();

        if (method_exists($controllerInstance, $action)) {
            $id = $_GET['id'] ?? null;
            if ($id !== null) {
                $controllerInstance->$action($id);
            } else {
                $controllerInstance->$action();
            }
        } else {
            echo "Action <b>$action</b> không tồn tại trong controller <b>$controller</b>!";
        }
    } else {
        echo "Controller class <b>$controllerName</b> không tồn tại!";
    }
} else {
    echo "File controller <b>$controllerFile</b> không tồn tại!";}
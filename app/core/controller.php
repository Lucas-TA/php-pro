<?php

/**
 * @throws Exception
 */
function controller($searchedUri, $params)
{
    [$controller, $method] = explode('@', array_values($searchedUri)[0]);

    $controllerWithNameSpace = CONTROLLER_PATH.$controller;

    if (!class_exists($controllerWithNameSpace))
    {
       throw new Exception('Controller "'.$controller.'" not found');
    }

    $controllerInstance = new $controllerWithNameSpace;

    if (!method_exists($controllerInstance, $method)) {
        throw new Exception('The method: '. "'$method' does not exists on controller: '.$controller.'");
    }
    $controller = $controllerInstance->{$method}($params);

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        die();
    }
    return $controller;
}
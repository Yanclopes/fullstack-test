<?php

namespace App\Core;

use App\Controller\NotFoundController;

class Core
{
    private array $routes;

    public function __construct($routes)
    {
        $this->setRoutes($routes);
    }

    public function run():void
    {
        $url = '/';

        isset($_GET['url']) ? $url .= $_GET['url'] : '';

        ($url != '/') ? $url = rtrim($url, '/') : $url;

        $routerFound = false;

        foreach ($this->getRoutes() as $path => $controllerAndAction) {
            $pattern = '#^' . preg_replace('/{id}/', '([\w-]+|\d+)', $path) . '$#';

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);

                $routerFound = true;

                [$currentController, $action] = explode('@', $controllerAndAction);

                $controller = new ("App\\Controller\\" . $currentController)();
                $controller->$action($matches);
            }
        }

        if (!$routerFound) {
            require_once __DIR__ . "/../Controller/NotFoundController.php";
            $controller = new NotFoundController();
            $controller->index();
        }
    }

    protected function getRoutes()
    {
        return $this->routes;
    }

    protected function setRoutes($routes): void
    {
        $this->routes = $routes;
    }
}

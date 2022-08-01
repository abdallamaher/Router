<?php

namespace Src;
class App
{
    private Router $router;

    public function run(): void
    {
        $this->initRouting();
        $this->router->dispatch();
    }

    private function initRouting() : void
    {
        $routes = require_once 'routes/Web.php';

        $this->router = new Router($routes);

    }
}
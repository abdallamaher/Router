<?php
namespace Src;
class Router
{
    private array $routes;
    

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function route(string $path, $callback): void
    {
        $this->routes[$path] = $callback;
    }

    public function dispatch(): void
    {
        $uriArray =parse_url($_SERVER['REQUEST_URI']);
        $uri = $uriArray['path'];

        foreach($this->routes as $path => $callback)
        {
            if($path !== $uri)continue;
            
            if(is_string($callback)){
                $callback = "Views\\" . $callback;
                $object = new $callback();
                $object();
            }
            else 
            {
                $callback();
            }
        }
    }
}
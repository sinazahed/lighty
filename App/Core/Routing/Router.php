<?php
namespace App\Core\Routing;

use App\Core\Request;
use App\Core\Routing\Route;
use App\Core\Routing\Validator;

class Router
{

    private $request;
    private $routes;
    private $current_route;
    private $validator;

    const BASE_CONTROLLER = 'App\Controllers\\';

    public function __construct()
    {
        $this->request=new Request();
        $this->routes = Route::all();
        $this->validator = new Validator();
        $this->current_route = $this->findRoute($this->request);
        $this->run_middleware();
    }

    private function run_middleware()
    {
        $middlewares = $this->current_route['middleware'] ?? [];
        foreach($middlewares as $middleware){
            $middlewareObj = new $middleware();
            $middlewareObj->handle();
        }
    }

    public function findRoute(Request $request) : array
    {
        foreach($this->routes as $route){
            if(in_array($request->getMethod(), $route['methods']) && $request->getUri() == $route['uri']){
                return $route;
            }
        }
        return [];
    }

    public function handle()
    {
        $route=$this->validator->validateRoute($this->current_route);

        $className = self::BASE_CONTROLLER . $route[0];
        $method = $route[1];
        if(!class_exists($className))
            throw new \Exception("Class $className Not Exist");
        if(!method_exists($className,$method))
            throw new \Exception("Method $method Not Exist");
        $controller = new $className();
        $controller->$method();
    }
}
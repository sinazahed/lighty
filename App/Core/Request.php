<?php

namespace App\Core;

class Request
{
    private $params;
    private $method;
    private $agent;
    private $ip;

    public function __construct()
    {
        $this->params=$_REQUEST;
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
    }

    public function __get($key)
    {
        return $this->input($key);
    }
    // Class Apis
    public function getParams()
    {
        return $this->params;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getAgent()
    {
        return $this->agent;
    }

    public function ip()
    {
        return $this->ip;
    }
    // End Class Api

    public function input(string $key) : string
    {
        return $this->params[$key] ?? 'null';
    }

    public function exist(string $key) : bool
    {
        return isset($this->params[$key]);
    }

    public function redirect(string $route)
    {
        header("Location:" . site_url($route));
    }
}
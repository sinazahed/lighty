<?php
namespace App\Controllers;
use App\Core\Request;

class BaseController
{
    public function index()
    {
        global $request;
        var_dump($request->getRouteParam('asd'));
        die();
        view('welcome');
    }
}
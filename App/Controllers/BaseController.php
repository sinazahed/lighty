<?php
namespace App\Controllers;
use App\Core\Request;

class BaseController
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        var_dump($this->request->getParams());
        die();
        view('welcome',$data);
    }
}
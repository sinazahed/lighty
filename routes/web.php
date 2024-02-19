<?php
use App\Core\Routing\Route;
use App\Middleware\BaseMiddleware;

Route::get('/a','BaseController@index',[BaseMiddleware::class]);

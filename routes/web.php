<?php
use App\Core\Routing\Route;
use App\Middleware\BaseMiddleware;

Route::get('/a/{asd}','HomeController@index',[BaseMiddleware::class]);
Route::get('/b/{slug}','HomeController@index',[BaseMiddleware::class]);

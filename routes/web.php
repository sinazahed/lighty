<?php
use App\Core\Routing\Route;
use App\Middleware\BaseMiddleware;

Route::get('/a','BaseController@index',[BaseMiddleware::class]);
Route::get('/a/{asd}','BaseController@index',[BaseMiddleware::class]);
Route::get('/b/{slug}','BaseController@index',[BaseMiddleware::class]);

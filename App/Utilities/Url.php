<?php
namespace App\Utilities;

class Url
{
    public static function current()
    {
        return (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    public static function current_route()
    {
        strtok($_SERVER['REQUEST_URI'],'?');
    }
}
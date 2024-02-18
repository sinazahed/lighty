<?php
namespace App\Utilities;


class Asset
{
    public static function __callStatic($name,$arguments)
    {
        return $_ENV['BASE_URL'] . "{$name} / {$arguments[0]}";
    }
}

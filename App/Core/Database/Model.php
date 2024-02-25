<?php

namespace App\Core\Database;
use App\Core\Database\Contracts\DatabaseInterface;

abstract class Model
{
    protected static $db;
    private $model;
    private $table;
    

    public function __construct()
    {
        self::$table = self::getClassName();
    }

    public static function setDatabase(DatabaseInterface $db) 
    {
        self::$db = $db;
    }

    public static function find($id) 
    {
        return self::$db->find($id, self::$table);
    }

    public static function create($data) 
    {
        return self::$db->create($data, self::$table);
    }

    public static function getClassName()
    {
        return substr(strrchr(static::class, '\\'),1);
    }

}
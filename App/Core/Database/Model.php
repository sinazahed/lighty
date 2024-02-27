<?php

namespace App\Core\Database;
use App\Core\Database\Contracts\DatabaseInterface;

abstract class Model
{
    protected static $db;
    private $model;
    private $table;
    private $idColumn;

    public function init()
    {
        die();
        self::$table = self::getClassName();
        self::$idColumn = self::getIdProperty();
    }

    public static function setDatabase(DatabaseInterface $db) 
    {
        self::$db = $db;
    }

    public static function find($id) 
    {
        return self::$db->find($id, self::$table, self::$idColumn);
    }

    public static function create($data) 
    {
        return self::$db->create($data, self::$table, self::$idColumn);
    }

    public static function getClassName()
    {
        return substr(strrchr(static::class, '\\'),1) ?? static::$table ;
    }

    public static function getIdProperty()
    {
        return  static::$id ?? 'id';
    }

}
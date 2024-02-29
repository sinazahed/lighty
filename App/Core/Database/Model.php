<?php

namespace App\Core\Database;
use App\Core\Database\Contracts\DatabaseInterface;

abstract class Model
{
    protected static $db;
    private $model;
    private $table;
    private $idColumn;

    public static function setDatabase(DatabaseInterface $db) 
    {
        self::$db = $db;
    }

    public static function find($id) 
    {
        return self::$db->find($id, static::$table, static::getIdProperty());
    }

    public static function create($data) 
    {
        return self::$db->create($data, static::$table, static::getIdProperty());
    }

    public static function getClassName()
    {
        return substr(strrchr(static::class, '\\'),1) ?? static::$table ;
    }

    // public function update()
    // { 
    //     return self::$db->update($data, static::$table)
    // }

    public static function getIdProperty()
    {
        return  static::$id ?? 'id';
    }

}
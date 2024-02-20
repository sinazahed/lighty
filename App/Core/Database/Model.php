<?php

namespace App\Core\Database;
use App\Core\Database\Contracts\DatabaseInterface;

abstract class Model
{
    protected static $db;
    private $model;
    
    public static function setDatabase(DatabaseInterface $db) {
        self::$db = $db;
    }

    public static function find() {
        return self::$db->find();
    }

    public static function create($data) {
        return self::$db->create($data);
    }
}
<?php
namespace App\Core\Database\Contracts;

interface DatabaseInterface
{
    // public function create();
    public function find($id, $table, $idColumn);
    // public function update();
    // public function delete();
}
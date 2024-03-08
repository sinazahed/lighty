<?php
namespace App\Core\Database\Contracts;

interface DatabaseInterface
{
    public function create($table, $data);
    public function find($id, $table, $idColumn);
    public function update($table, $data, $idColumn, $id);
    public function delete($id, $table, $idColumn);
}
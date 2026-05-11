<?php
abstract class AbstractRepository
{
protected string $tableName;
protected PDO $bdd ;

public function __construct(PDO $bdd,string $tableName)
{
   $this->bdd = $bdd ;
   $this->tableName = $tableName;
}

abstract public function selectByID(int $id); 
abstract public function selectAll();
abstract public function deleteByID(int $id);
abstract public function insert();
abstract public function updateByID();


}
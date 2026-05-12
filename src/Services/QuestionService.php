<?php


class QuestionService{
 private   QuestionRepository $obj  ; 
 private   $data = [];
 private   PDO $bdd ;
 private    int $limit;
 private    int $index;

public function __construct(PDO $idcon , int $limit,string $tableName)
{
   $this->obj = new QuestionRepository($idcon, $tableName) ;
   $this->limit = $limit ;
   $this->bdd = $idcon ;
   $this->index = 0 ;
}

public function generate():bool
{
  

return true;
}

}
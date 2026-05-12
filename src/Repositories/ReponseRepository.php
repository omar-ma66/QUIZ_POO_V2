<?php

class ReponseRepository extends AbstractRepository
{
 private ReponsesMapper $mapper;  

 public function selectByID(int $id){}
 public function selectByQuestionIDAll(Questions $obj ):?Reponses
 {
   $smt =    $this->bdd->prepare("SELECT * FROM $this->tableName WHERE question_id = :id LIMIT 4");
   $smt->bindParam(":id",$obj->id,PDO::PARAM_INT);
   $smt->execute();
   $reponses = $smt->fetchAll(PDO::FETCH_ASSOC);
                if($reponses)
                    {  
                      // ici ca va posé un probleme  le mapper ne gere pas ce cas;
                      $this->mapper = new ReponsesMapper();
                       return $this->mapper->mapToObjet($reponses);
                
                    }
                    return null ;
 }
 
 public function selectByQuestionID(Questions $obj ):?Reponses
 {
   $smt =    $this->bdd->prepare("SELECT * FROM $this->tableName WHERE question_id = :id ORDER BY RAND() LIMIT 1");
   $smt->bindParam(":id",$obj->id,PDO::PARAM_INT);
   $smt->execute();
   $reponses = $smt->fetch(PDO::FETCH_ASSOC);
                if($reponses)
                    {   
                        $this->mapper = new ReponsesMapper();
                       return $this->mapper->mapToObjet($reponses);        
                    }
                    return null ;
   
 }

 public function selectAll(){}
 public function deleteByID(int $id){}
 public function insert(){}
 public function updateByID(){} 
}

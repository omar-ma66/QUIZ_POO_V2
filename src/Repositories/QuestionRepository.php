<?php
class QuestionRepository extends AbstractRepository
{
 private QuestionsMapper $mapper ;
 public function selectByID(int $id):?Questions
 {
   $smt = $this->bdd->prepare("SELECT * FROM ".$this->tableName." WHERE id= :id");
   $smt->bindParam(":id",$id,PDO::PARAM_INT);
   $smt->execute();
   $question = $smt->fetch(PDO::FETCH_ASSOC); 
        if($question)
            {
                $this->mapper = new QuestionsMapper();
                return $this->mapper->mapToObjet($question);
            }
        return null;    
 }

 public function selectByThemeID(Theme $obj):?Questions 
 {
  $smt = $this->bdd->prepare("SELECT * FROM $this->tableName WHERE theme_id = :id  ORDER BY RAND() LIMIT 1") ;   
  $smt->bindParam(":id",$obj->id,PDO::PARAM_INT); 
  $smt->execute();
  $question = $smt->fetch(PDO::FETCH_ASSOC);
        if($question)
            {
                    $this->mapper = new QuestionsMapper();
                    return $this->mapper->mapToObjet($question);
               
            } 
          return null ;      
 
 }

 

 
 public function selectAll(){}
 public function deleteByID(int $id){}
 public function insert(){}
 public function updateByID(){}

}


?>
<?php


class QuestionService{
 private   QuestionRepository $objRipo  ; 
 private   $dataID = [];
 private    $dataQuestions = [];
 private   PDO $bdd ;
 private    int $limit;
 private    int $index;
 private    Theme $theme;

public function __construct(QuestionRepository $objRipo,Theme $theme , int $limit)
{
   $this->objRipo = $objRipo;
   $this->limit = $limit ;
   $this->index = 0 ;
   $this->theme = $theme ;
}

public function generate():bool
{
  // signature de la question id question theme_id
 
  if($this->index < $this->limit)
   {
  $fin = false ;
  while( $fin === false)
   {
   $questionTemps = $this->objRipo->selectByThemeID($this->theme);
    if( !in_array($questionTemps->getId(),$this->dataID) )
         {
               array_push($this->dataID,$questionTemps->getId());
               array_push($this->dataQuestions,$questionTemps);
               $this->index++;
               $fin = true;
         }
    
   }
   
return true;
   }
 return false;  
}
public function getQuestion(int $index):?Questions
{
      if( $index >= $this->limit || $index < 0 || $index >= $this->index)
          {
            return null;
         }
       else
         return $this->dataQuestions[$index];  
}
}
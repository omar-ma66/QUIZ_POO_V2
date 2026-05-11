<?php
class ReponsesMapper{
    public function mapToObjet(array $data):Reponses
    {
        return new Reponses($data["id"],$data["question_id"],$data["reponse"],$data["isTrue"]) ;
    }
    
    public function mapToArray(object $obj):array
    {
        return [$obj->getID(),$obj->getQuestionID(),$obj->getReponse(),$obj->isTrue()]    ;
    }
        
    
}
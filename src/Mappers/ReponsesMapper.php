<?php
class ReponsesMapper{
    public function mapToObjet(array $data):Reponses
    {
        return new Reponses($data["id"],$data["question_id"],$data["question"],$data["isTrue"]) ;
    }
    public function mapToArray(Reponses $obj):array
    {
        return [$obj->getID(),$obj->getQuestionID(),$obj->getReponse(),$obj->isTrue()]    ;
    }
    
}
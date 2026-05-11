<?php

class QuestionsMapper implements MapperInterface{
   
public function mapToObjet(array $data):Questions
{
                return new Questions($data["id"],$data["question"],$data["theme_id"]);
}

public function mapToArray(object $obj):array
{
                return [$obj->getId(),$obj->getQuestion(),$obj->getThemeID()];
}
               
};
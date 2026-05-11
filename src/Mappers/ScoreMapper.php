<?php

//int $id, int $themeID, int $nbReponse, int $duree, int $userID
class ScoreMapper implements MapperInterface
{

public function mapToObjet(array $data):Score
{
    return new Score ($data["id"],$data["theme_id"],$data["nb_reponse"],$data["duree"],$data["user_id"]);
}


public function mapToArray(object $obj):array
{
    return [$obj->getID(),$obj->getThemeID(),$obj->getNbReponse(),$obj->getDuree(),$obj->getUserID()]  ;  
}
    

}

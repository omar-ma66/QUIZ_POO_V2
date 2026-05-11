<?php
require("../../utils/autoload.php");
require("../../config/PDOConnect.php");

$idcon = PDOConnect("../../config/param");
#################################################################
$userRipo = new UserRepository($idcon,"users");
$themeRipo = new ThemeRepository($idcon,"themes");
$questionRipo = new QuestionRepository($idcon,"questions");
$reponseRipo  = new ReponseRepository($idcon,"reponses");

#################################################################

 $userObj   =  $userRipo->create("Bob Marley");

$themeObj = $themeRipo->selectByName("science");
$questionObj   = $questionRipo->selectByThemeID($themeObj);
$reponseObj   =  $reponseRipo->selectByQuestionID($questionObj);    
####################################################################
 echo  $userObj->getPseudo() ."<br>" ;
 echo  $userObj->getId()  ."<br>" ;
 echo str_repeat("-",80) ."<br>" ;
 echo $themeObj->getTheme() ."<br>" ;
 echo $themeObj->getThemeID()."<br>" ;
 echo str_repeat("-",80) ."<br>" ;

 echo $questionObj->getQuestion() ."<br>" ;
 echo $questionObj->getId() ."<br>" ;
 echo $questionObj->getThemeID() ."<br>";
 
 echo str_repeat("-",80) ."<br>" ;


 echo $reponseObj->getReponse() ."<br>" ; 
echo $reponseObj->isTrue() ."<br>" ;


    $userRipo->deleteByObjet($userObj);
    $userRipo->deleteByID(15);
    $userRipo->deleteByID(16);
    $userRipo->deleteByID(14);

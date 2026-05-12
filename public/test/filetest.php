<?php
require("../../utils/autoload.php");
require("../../config/PDOConnect.php");

$idcon = PDOConnect("../../config/param");

  $themeRipo = new ThemeRepository($idcon,"themes");
  $questionRipo = new QuestionRepository($idcon,"questions");
$themeObj    = $themeRipo->selectByName("science");

                $QuestionService = new QuestionService($questionRipo,$themeObj,5);

            if( $QuestionService->generate())
                {
                    $question = $QuestionService->getQuestion(0);
                      if($question !== null)
                    echo $question->getQuestion() . "<br>";
                }  
            else
                {
                    echo "probleme <br>";
                }      
      if( $QuestionService->generate())
                {
                    $question = $QuestionService->getQuestion(1);
                        if($question !== null)
                                echo $question->getQuestion() . "<br>";
                }  
            else
                {
                    echo "probleme <br>";
                }     
         if( $QuestionService->generate())
                {
                    $question = $QuestionService->getQuestion(2);
                      if($question !== null)
                    echo $question->getQuestion() . "<br>";
                }  
            else
                {
                    echo "probleme <br>";
                }             
                
                


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

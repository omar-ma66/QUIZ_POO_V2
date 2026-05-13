<?php
require("../../utils/autoload.php");
session_start();
header("content-type:application/json");

if (!isset($_SESSION["connecter"]) || $_SESSION["connecter"] !== "yes")
    header("location:../index.php");
if(!isset($_SESSION["index_question"]))
    header("location:../index.php");
if(isset($_SESSION["index_question"]) && $_SESSION["index_question"] >= 5 )
    header("location:../view/endGame.php");

$themeIdArray =  json_decode(file_get_contents("php://input"), true);

 
 


if ($themeIdArray["status"] === "debug") {
      $_SESSION["index_question"] = 
      $question_ =   $_SESSION["questions"][$_SESSION["index_question"]]->getQuestion();
      $reponses_  =   $_SESSION["questions"][$_SESSION["index_question"]]->getReponses(); 
        
      $allreponses = [];
             foreach($reponses_ as $r)
                    {  
                $allreponses[] = ["id" =>$r->getID() ,"reponse"=>$r->getReponse()]; 
             } 

            $_SESSION["index_question"]++; 
          echo json_encode(["status"=>"success","question"=>$question_,"reponses"=>$allreponses]);   
             }                
?>


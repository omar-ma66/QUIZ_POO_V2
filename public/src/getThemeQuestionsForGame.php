<?php
require("../../utils/autoload.php");
session_start();
header("content-type:application/json");
if (!isset($_SESSION["connecter"]) || $_SESSION["connecter"] !== "yes")
    header("location:../index.php");

$themeIdArray =  json_decode(file_get_contents("php://input"), true);

if ($themeIdArray["status"] === "debug") {

          $themeRipo = new ThemeRepository();
          $questionService = new QuestionService();
       
         $theme =  $themeRipo->selectByName($_SESSION["theme"]); 
           $theme_id  =     $theme->getThemeID();
           $questions =   $questionService->generate($theme,5);
         

    $_SESSION["questions"]  = $questions ;
    $_SESSION["index_question"] = 0 ;     
   
   error_log("FICHIER getThemeQuestionForGame OK");
    echo json_encode(["status" => "success"]);

    }

?>
<?php


require("../../utils/autoload.php");
require("../../config/PDOConnect.php");


session_start();

$themeRipo = new ThemeRepository();
// $questionRipo = new QuestionRepository();

// $reponseRepo  = new ReponseRepository();

$theme           = $themeRipo->selectByID(1);

$questionService = new QuestionService();

$questions       = $questionService->generate($theme, 5);

if (!empty($questions)) {
    $_SESSION['questions'] = $questions;
    $_SESSION['index_question'] = 0;
    header("Location: ./filetest2.php");
   
}



// if ($QuestionService->generate($themeRipo->selectByID(1),5)) {
//     $question = $QuestionService->getQuestion(0);
//     if ($question !== null) {
//         echo $question->getQuestion() . "<br>";
//         $reponseService = new ReponseService($reponseRepo, $question);

//         if ($reponseService->generate()) {
//             echo  $reponseService->getReponse(0)->getReponse() . "<br>";
//         }
//         if ($reponseService->generate()) {
//             echo  $reponseService->getReponse(1)->getReponse() . "<br>";
//         }
//     }

//     echo str_repeat("-", 80) . "<br>";
//     echo str_repeat("-", 80) . "<br>";

//     echo "Super ca marche <br>";

//     echo str_repeat("-", 80) . "<br>";
//     echo str_repeat("-", 80) . "<br>";
// } else {
//     echo "probleme <br>";
// }

// echo str_repeat("-", 80) . "<br>";




// echo str_repeat("-", 80) . "<br>";
// echo str_repeat("-", 80) . "<br>";
// echo str_repeat("-", 80) . "<br>";





// #################################################################
// $userRipo = new UserRepository($idcon, "users");
// $themeRipo = new ThemeRepository($idcon, "themes");
// $questionRipo = new QuestionRepository($idcon, "questions");
// $reponseRipo  = new ReponseRepository($idcon, "reponses");

// #################################################################

// $userObj   =  $userRipo->create("Bob Marley");

// $themeObj = $themeRipo->selectByName("science");
// $questionObj   = $questionRipo->selectByThemeID($themeObj);
// $reponseObj   =  $reponseRipo->selectByQuestionID($questionObj);
// ####################################################################
// echo  $userObj->getPseudo() . "<br>";
// echo  $userObj->getId()  . "<br>";
// echo str_repeat("-", 80) . "<br>";
// echo $themeObj->getTheme() . "<br>";
// echo $themeObj->getThemeID() . "<br>";
// echo str_repeat("-", 80) . "<br>";

// echo $questionObj->getQuestion() . "<br>";
// echo $questionObj->getId() . "<br>";
// echo $questionObj->getThemeID() . "<br>";

// echo str_repeat("-", 80) . "<br>";


// echo $reponseObj->getReponse() . "<br>";
// echo $reponseObj->isTrue() . "<br>";


// $userRipo->deleteByObjet($userObj);
// $userRipo->deleteByID(15);
// $userRipo->deleteByID(16);
// $userRipo->deleteByID(14);

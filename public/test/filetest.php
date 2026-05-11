<?php
require("../../utils/autoload.php");
require("../../config/PDOConnect.php");

$idcon = PDOConnect("../../config/param");
#################################################################
$userRipo = new UserRepository($idcon,"users");
$themeRipo = new ThemeRepository($idcon,"themes");
$questionRipo = new QuestionRepository($idcon,"questions");

#################################################################

$userObj   =  $userRipo->create("Bob Marley");
$themeObj = $themeRipo->selectByName("science");
$qestionObj   = $questionRipo->selectByThemeID($themeObj,5);

####################################################################
 echo  $userObj->getPseudo() ."<br>" ;
 echo $themeObj->getTheme() ."<br>" ;


/*
$user->create("test");
$user->deleteByID(7);
$user->deleteByID(8);
$user->deleteByID(9);
$user->deleteByID(10);
$user->deleteByID(11);
$user->deleteByID(12);
$user->deleteByID(13);
$user->deleteByID(6);
*/

           
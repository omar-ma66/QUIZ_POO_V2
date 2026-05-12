<?php
require("../../utils/autoload.php");

session_start();
header("content-type:application/json");
if (!isset($_SESSION["connecter"]) || $_SESSION["connecter"] !== "yes")
    header("location:../index.php");

$themeArray =     json_decode(file_get_contents("php://input"), true);



if ($themeArray["status"] === "debug") {
  
    $themeChoisi = htmlspecialchars($themeArray["theme"]);

   $themRipo = new ThemeRepository();
  $theme =    $themRipo->selectByName($themeChoisi);     
        $_SESSION["theme_id"] = $theme->getThemeID();
        error_log($_SESSION["theme_id"]);
        echo json_encode(["status" => "success", "infoTheme" => [$theme->getThemeID(),$theme->getTheme()]]);
    }
 else {
    echo json_encode(["status" => "error"]);
}

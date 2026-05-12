<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("location:../public/index.php?server-error:no-post-method");
}
if (isset($_POST["pseudo"]) && !empty($_POST["pseudo"])) {
  $pseudo = htmlspecialchars($_POST["pseudo"]);
  
require("../../utils/autoload.php");
require("../../config/PDOConnect.php");
$idcon = PDOConnect("../../config/param");

  $userRipo = new UserRepository($idcon,"users");
   $user    =   $userRipo->create($pseudo);
            if($user !== null)
                {             
    $_SESSION["connecter"] = "yes";
    $_SESSION["pseudo"] =  $user->getPseudo();
    $_SESSION["pseudo_id"] = $user->getId();
    header("location:../public/view/theme.php");
                }
            else
                {
     $_SESSION["connecter"] = "no";  
    header("location:../public/view/home.php");

                }



 
}


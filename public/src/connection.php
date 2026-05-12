<?php
require("../../utils/autoload.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("location:../public/index.php?server-error:no-post-method");
}
if (isset($_POST["pseudo"]) && !empty($_POST["pseudo"])) {
  $pseudo = htmlspecialchars($_POST["pseudo"]);
 
  $userRipo = new UserRepository();
   $user    =   $userRipo->create($pseudo);
            if($user !== null)
                {             
    $_SESSION["connecter"] = "yes";
    $_SESSION["pseudo"] =  $user->getPseudo();
    $_SESSION["pseudo_id"] = $user->getId();
    header("location:../view/theme.php");
                }
            else
                {
     $_SESSION["connecter"] = "no";  
    header("location:../public/view/home.php");

                }



 
}


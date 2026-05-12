<?php
require("../../utils/autoload.php");

session_start();

if (isset($_SESSION["questions"]) && !empty($_SESSION["questions"]) ) {
    var_dump($_SESSION["questions"][1]);
    echo str_repeat("-",100);
  
}

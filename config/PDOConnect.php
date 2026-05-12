<?php
function PDOConnect(string $param): string|PDO
{
    require($param . ".inc.php");
    $base = DATABASE;
    $dsn = "mysql:host=" . HOST . ";dbname=" . $base;
    $user = USER;
    $pass = PASS;
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES,
        false
    ];
    try {
        $dbcon = new PDO($dsn, $user, $pass, $options);
        return $dbcon;
    } catch (PDOException $errPDO) {
        return "Une erreur PDO c'est produite MESSAGE : " . $errPDO->getMessage() . " \nnom du fichier : " . $errPDO->getFile() . " \nnuméro de  ligne : " . $errPDO->getLine() . " \nCode erreur : " . $errPDO->getCode();
    }
}

?>
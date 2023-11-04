<?php

include_once(__DIR__ . "/../util/config.php");
include_once(__DIR__ . "/pocaoDAO.php");

$dao = new PocaoDAO();
$arr = $dao->list();
var_dump($arr);

?>
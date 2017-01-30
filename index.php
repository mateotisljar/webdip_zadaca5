<?php

session_start();
ob_start();
include_once'dnevnik.php';
if(!isset($_SESSION['korisnicko_ime'])){
    header("Location: prijava.php");
    exit();
}


require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);
varijableSesije($smarty);
$smarty->display('header.tpl');
$smarty->display('index.tpl');
$smarty->display('footer.tpl');
ob_end_flush();


?>

        
        
        
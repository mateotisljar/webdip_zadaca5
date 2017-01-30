<?php

require_once 'vanjske_biblioteke/smarty/libs/Smarty.class.php';

function smartyConf(&$smarty) {
    
    $smarty->setTemplateDir('predlosci/');
    $smarty->setCompileDir('vanjske_biblioteke/smarty/templates_c/');
    $smarty->setCacheDir('vanjske_biblioteke/smarty/cache/');
    $smarty->setConfigDir('vanjske_biblioteke/smarty/configs/');
}
$date = date('m/d/Y h:i:s a', time());
$_SESSION['vrijeme'] = $date;
function varijableSesije(&$smarty) {
    $smarty->assign('vrijeme', $_SESSION['vrijeme']);
    $smarty->assign('ime', $_SESSION['ime']);
    $smarty->assign('prezime', $_SESSION['prezime']);
    $smarty->assign('id_korisnika', $_SESSION['id_korisnika']);
    $smarty->assign('tip_korisnika', $_SESSION['tip_korisnika']);
    $smarty->assign('email', $_SESSION['email']);
    $smarty->assign('korisnicko_ime', $_SESSION['korisnicko_ime']);
    $smarty->assign('mobilni_telefon', $_SESSION['mobilni_telefon']);
}

?>
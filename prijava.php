<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
ob_start();

include 'login.php';
include 'dnevnik.php';
//include 'baza.class.php';

if (isset($_SESSION['korisnicko_ime'])) {
    header("Location: index.php");
    exit();
} else {
    if(isset($_COOKIE['korisnicko_ime'])){
        $cookie_korisnicko_ime = $_COOKIE['korisnicko_ime'];
    }
    $greska = "";
    $baza = new Baza();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $korisnicko_ime = $_POST['korisnicko_ime'];
        $pass = $_POST['password'];
        $upit = "SELECT * from korisnici2 WHERE korisnicko_ime ='" . $korisnicko_ime . "' and password = '" . $pass . "'";
        $rezultat = $baza->select($upit);
        if (mysqli_num_rows($rezultat) == 1) {
            $pronadjeni = mysqli_fetch_array($rezultat);
            kreirajSesiju($pronadjeni);
            if (isset($_POST['checkbox']) && !isset($_COOKIE['korisnicko_ime'])) {
                kreirajKolacic($pronadjeni['id_korisnika']);
                pisiUDnevnik();
            }
            if (!isset($_POST['checkbox']) && isset($_COOKIE['korisnicko_ime'])) {
                brisiKolacic();
            }
            
            header("Location: index.php");
        } else {
            $greska = "Korisnicko ime i lozinka nisu ispravni.";
            
            header("Location: pregledDnevnika.php");
        }
    }
}
       

require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);

$smarty->assign('greska', $greska);
$smarty->assign('cookie_korisnicko_ime', $cookie_korisnicko_ime);
$smarty->display('header.tpl');
$smarty->display('prijava.tpl');
$smarty->display('footer.tpl');
ob_end_flush();

?>
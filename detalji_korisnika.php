<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
session_start();
ob_start();
include_once 'baza.class.php';
$baza = new Baza();
$poruka="";
if($_GET['korisnicko_ime']){

$korisnicko_ime = $_GET['korisnicko_ime'];
$upit = "select * from korisnici2 where korisnicko_ime = '$korisnicko_ime' limit 1";
$rezultat = $baza->select($upit);
$dohvaceni_podaci = $rezultat->fetch_array();
}

else if (isset($_POST['promijeni'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['password'];
    $lozinka2 = $_POST['password2'];
    $enkripcija = $_POST['keygen'];
    $rodjendan_dan = $_POST['rodjendan_dan'];
    $rodjendan_mjesec = $_POST['rodjendan_mjesec'];
    $rodjendan_godina = $_POST['rodjendan_godina'];
    $spol = $_POST['spol'];
    $drzava = $_POST['drzava'];
    $broj = $_POST['mobilni_telefon'];
    $email = $_POST['email'];
    $lokacija = $_POST['lokacija'];
    $obavijest = $_POST['obavijest'];

    $upit = "update korisnici2 set ime= '" . $ime . "', prezime='" . $prezime . "', korisnicko_ime = '" . $korisnicko_ime 
            . "', password='" . $password . "',  password2='" . $password2 . "', keygen='" . $enkripcija 
            . "', rodjendan_dan='" . $rodjendan_dan . "', rodjendan_mjesec='" . $rodjendan_mjesec . "', rodjendan_godina='" 
            . $rodjendan_godina . "', spol='" . $spol . "', drzava='" . $drzava . "', mobilni_telefon='" . $mobilni_telefon 
            . "', email='" . $email . "', lokacija='" . $lokacija . "', obavijest='" . $obavijest 
            . "' where email = '{$_POST['email']}'";
    
    if (empty($ime) || empty($prezime) || empty($korisnicko_ime) || empty($lozinka) || empty($lozinka2) || empty($enkripcija) || empty($rodjendan_dan) || empty($rodjendan_mjesec) || empty($rodjendan_godina)  || empty($spol) || empty($drzava) || empty($mobilni_telefon) || empty($email) || empty($lokacija) || empty($obavijest)) {
        $value = "nisu uneseni svi podaci";
    }
    if ($baza->update($upit)) {
        $poruka = "Podaci su uspjesno izmjenjeni";
        header("Location: ispis_korisnika.php");
    }
    else{
        setcookie('greska', $value, time() + 3600);
        header("Location: ");
    }
    
}



require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);
varijableSesije($smarty);
$smarty->assign('poruka', $poruka);
$smarty->assign('korisnik', $dohvaceni_podaci);
$smarty->assign('korisnicko_ime', $korisnicko_ime);
$smarty->display('header.tpl');
$smarty->display('detalji_korisnika.tpl');
$smarty->display('footer.tpl');
ob_end_flush();
?>




       
      

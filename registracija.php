<!DOCTYPE html>
<?php
include_once './baza.class.php';
$baza = new Baza();
$poruke = "";

if (isset($_POST['submit'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $rodjendan_dan = $_POST['rodjendan_dan'];
    $rodjendan_mjesec = $_POST['rodjendan_mjesec'];
    $rodjendan_godina = $_POST['rodjendan_godina'];
    $spol = $_POST['spol'];
    $drzava = $_POST['drzava'];
    $mobilni_telefon = $_POST['mobilni_telefon'];
    $email = $_POST['email'];

    $lokacija = $_POST['lokacija'];
    $obavijest = $_POST['obavijest'];



    if (ctype_upper($korisnicko_ime[0])) {
        $poruke.="Korisnicko ime mora poceti s malim slovom. <br>";
    }


    $uzorak_korisnicko_ime = '/([A-Z]{1})([_,-,!,#,$,?]{2})$/';
    if (!preg_match($uzorak_korisnicko_ime, $korisnicko_ime)) {
        $poruke .="Korisničko ime mora sadržavati jedno veliko slovo, te 2 specijalna znaka.<br>";
    }
    $uzorak_lozinka = '^[a-zA-Z]+\d+[_, -, !, #, $, ?]+^';
    if (!preg_match($uzorak_lozinka, $password)) {
        $poruke.="Lozinka mora imati mala i velika slova, brojeve i specijalne znakove. <br>";
    }

    if (strlen($korisnicko_ime) < 10) {
        $poruke.="Korisničko ime mora imati minimalno 10 znakova. <br>";
    }

    if (strlen($password) < 8) {
        $poruke.="Lozinka mora imati minimalno 8 znakova. <br>";
    }

    if ($password2 != $password) {
        $poruke.="Lozinke nisu identicne. <br>";
    }


    if (empty($ime) || empty($prezime) || empty($korisnicko_ime) || empty($password) || empty($password2) || empty($rodjendan_dan) || empty($rodjendan_mjesec) || empty($rodjendan_godina)  || empty($mobilni_telefon) || empty($email) || empty($lokacija) || empty($obavijest)) {
        $poruke.="Nisu uneseni svi podaci. <br>";
    }


    if ($rodjendan_dan < 1) {
        $poruke.="Datum nesmije biti negativan <br>";
    }

    if ($rodjendan_godina < 1930 || $rodjendan_godina > 2015) {
        $poruke.="Godina rodjenja mora biti veca od 1930 i manja od 2015. <br>";
    }

    $uzotak_email = '^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+^';
    if (!preg_match($uzotak_email, $email)) {
        $poruke.="Email mora biti formata: nesto.nesto@nesto. <br>";
    }


    $upit = "SELECT * from korisnici2 WHERE korisnicko_ime = '{$korisnicko_ime}' LIMIT 1";
    $rezultat = $baza->select($upit);
    $upit = "SELECT * from korisnici2 WHERE email = '{$email}' LIMIT 1";
    $rezultat2 = $baza->select($upit);

    if ($rezultat->num_rows == 1) {
        $poruke.="Korisnicko ime je vec zauzeto. <br>";
    }

    if ($rezultat2->num_rows == 1) {
        $poruke.="Email je vec zauzet. <br>";
    }

    $aktivacijski_kod = md5($korisnicko_ime . time());
    $nacin = "Y-m-d H:i:s";
    $vrijeme = new DateTime(date($nacin));
    $formatirano_vrijeme = $vrijeme->format($nacin);
    if (empty($poruke)) {
        $mail_od = 'Zadaca_04';
        $headers = '';
        $headers.='Content-type: text/html; charset=utf-8 \r\n;';
        $headers.='From: ' . $mail_od . "\r\n";
        $upit = "INSERT into korisnici2 (id_korisnika, ime, prezime, korisnicko_ime, password,  password2, rodjendan_dan, rodjendan_mjesec, rodjendan_godina, spol, drzava, mobilni_telefon, email, lokacija, obavijest, aktivan, vrijeme_registracije, tip_korisnika) values(default, '{$ime}', '{$prezime}', '{$korisnicko_ime}', '{$password}', '{$password2}', '{$rodjendan_dan}', '{$rodjendan_mjesec}', '{$rodjendan_godina}', '{$spol}', '{$drzava}', '{$mobilni_telefon}', '{$email}', '{$lokacija}', '{$obavijest}', '{$aktivacijski_kod}', '{$formatirano_vrijeme}', 3);";
        if ($baza->update($upit)) {


            $primatelj = $email;
            $naslov = "Aktivacija računa";
            $poruka = "Aktivacija korisničkog računa vrši se putem klika na: <a href='https://barka.foi.hr/WebDiP/2015/zadaca_05/mtisljar/aktivacija.php?aktivan={$aktivacijski_kod}'>link</a>";
            mail($primatelj, $naslov, $poruka, $headers);
            header("Location: prijava.php");
        } else {
            $poruke .="Neuspješna registracija. <br>";
        }
    }
}


require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);
$smarty->assign('poruke', $poruke);
$smarty->display('header.tpl');
$smarty->display('registracija.tpl');
$smarty->display('footer.tpl');
ob_end_flush();
?>

        
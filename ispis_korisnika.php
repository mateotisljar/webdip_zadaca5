<?php

ob_start();
session_start();

if (!isset($_SESSION['korisnicko_ime'])) {
    header("Location: prijava.php");
    exit();
}

if ($_SESSION['tip_korisnika'] != 1) {
    echo 'Niste administrator';
    exit();
}



//include_once 'baza.class.php';
include_once 'dnevnik.php';


$baza = new Baza();



if (isset($_POST['submit'])) {
  
    if (is_uploaded_file($_FILES['korisnici']['name'])) {
        echo 'datoteka je upoladana.';
        echo 'dodani su slijedeći podaci: ';
        readfile($_FILES['korisnici.csv']);
    }
    $handle = fopen($_FILES['korisnici.csv'], 'r');
    while (($data = fgetcsv($handle, 1000, ";")) !== false) {
        $upit = "INSERT into korisnici2 (id_korisnika, ime, prezime, korisnicko_ime, password,  password2, rodjendan_dan, rodjendan_mjesec, rodjendan_godina, spol, drzava, mobilni_telefon, email, lokacija, obavijest, aktivan, vrijeme_registracije) values(default, '$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]', '$data[12]', '$data[13]', '$data[14]');";
        update($upit);
    }
    fclose($handle);
}


require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);
varijableSesije($smarty);
$smarty->display('header.tpl');
$smarty->display('ispis_korisnika.tpl');

if (isset($_SESSION['korisnicko_ime'])) {
   $korisnik = $_SESSION['korisnicko_ime'];
    $prezime = $_SESSION['prezime'];
    $id_korisnika = $_SESSION['id_korisnika'];
    $ime = $_SESSION['ime'];
    $url = $_SERVER["REQUEST_URI"];
    $datum_vrijeme = date('m/d/Y h:i:s a', time());
    $greska="nista";
    $akcija ="Zahtjev za ispisom korisnika.";
    Dnevnik::pisiUDnevnik($korisnik, $prezime, $id_korisnika, $ime, $url, $datum_vrijeme, $greska, $akcija);
    
    $upit = "SELECT * from korisnici2 where aktivan!='1'";
    $rezultat = $baza->select($upit);
    echo "<table border=1>";
    echo "<caption>Ispis neaktiviranih korisnika koji sadrze u imenu i prezimenu slovo 'a' </caption>";
    echo "<thead>"
    . "<th>ID</th>"
    . "<th>Ime</th>"
    . "<th>Prezime</th>"
    . "<th>Korisnicko ime</th>"
    . "<th>Lozinka</th>"
    . "<th>Lozinka</th>"
    . "<th>Keygen</th>"
    . "<th>Dan</th>"
    . "<th>Mjesec</th>"
    . "<th>Godina</th>"
    . "<th>Spol</th>"
    . "<th>Drzava</th>"
    . "<th>Telefon</th>"
    . "<th>Email</th>"
    . "<th>Lokacija</th>"
    . "<th>Obavijest</th>"
    . "<th>Kod</th>"
    . "<th>Vijeme registracije</th>"
    . "</thead>";

    while ($lista = $rezultat->fetch_array()) {
        if (strpos($lista[1], 'a') && strpos($lista[2], 'a')) {
            echo "<tr>"
            . "<td><a href='detalji_korisnika.php?korisnicko_ime=$lista[3]'</a>$lista[0]</td>"
            . "<td>$lista[1]</td>"
            . "<td>$lista[2]</td>"
            . "<td>$lista[3]</td>"
            . "<td>$lista[4]</td>"
            . "<td>$lista[5]</td>"
            . "<td>$lista[6]</td>"
            . "<td>$lista[7]</td>"
            . "<td>$lista[8]</td>"
            . "<td>$lista[9]</td>"
            . "<td>$lista[10]</td>"
            . "<td>$lista[11]</td>"
            . "<td>$lista[12]</td>"
            . "<td>$lista[13]</td>"
            . "<td>$lista[14]</td>"
            . "<td>$lista[15]</td>"
            . "<td>$lista[16]</td>"
            . "<td>$lista[18]</td>"
            . "</td>";
        }
    }

    echo "</table>";
} else {
    echo "Greška";
}



$smarty->display('footer.tpl');
ob_end_flush();
?>
            

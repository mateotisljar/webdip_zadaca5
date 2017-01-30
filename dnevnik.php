<?php
include 'baza.class.php';

class Dnevnik {
   public static function pisiUDnevnik($korisnik,$prezime,$id_korisnika,$ime,$url,$datum_vrijeme,$greska,$akcija){
       $baza = new Baza();
    $upit = "insert into dnevnik (datum_vrijeme, id_korisnika, korisnick_ime, ime, prezime, skripta, greska,akcija) values('".$datum_vrijeme."', $id_korisnika, '".$korisnik."', '".$ime."', '".$prezime."', '".$url."', '".$greska."', '".$akcija."')";
   
    $baza->update($upit);
    }
    public static function vratiPodatkeZaDnevnik(){
        $baza = new Baza();
        $upit="select * from dnevnik";
        $rezultat=$baza->select($upit);
        return $rezultat;
    }
    
}

    
    

<?php

function kreirajSesiju($korisnik){
    $_SESSION['tip_korisnika']= $korisnik['tip_korisnika'];
    $_SESSION['email']= $korisnik['email'];
    $_SESSION['id_korisnika'] = $korisnik['id_korisnika'];
    $_SESSION['ime'] = $korisnik['ime'];
     $_SESSION['prezime'] = $korisnik['prezime'];
    
    $_SESSION['korisnicko_ime']=$korisnik['korisnicko_ime'];
    $_SESSION['mobilni_telefon']=$korisnik['mobilni_telefon'];
    
}

function kreirajKolacic($korisnik){
                    
                    $cookieValue=$korisnik['email'];
                    setcookie('korisnicko_ime', $cookieValue, time() + (86400 * 3)); 
                   
                            
}

function brisiKolacic(){
    setcookie('korisnicko_ime', '', time() - 200);
}

function unistiSesiju(){
    session_start();
    session_unset() ;
    session_destroy();
    header("Location: prijava.php");
}
?>
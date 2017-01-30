<?php

class Baza {

    const server = "localhost";
    const baza = "WebDiP2015x083";
    //const baza = "mydb";
    const korisnik = "WebDiP2015x083";
    //const korisnik = "root";
    const lozinka = "admin_541y";
    //const lozinka = "";
    

    private function spojiNaBazu() {
        $mysqli = new mysqli(self::server, self:: korisnik, self::lozinka, self::baza);
        if ($mysqli->connect_errno) {
            echo "Neuspješno spajanje na bazu. " . $mysqli->connect_errno . ", " . $mysqli->connect_error;
        }

        return $mysqli;
    }

    function select($upit) {
        $veza = self::spojiNaBazu();
        $rezultat = $veza->query($upit) or trigger_error("Greška kod upita: {$upit} - " . "Greška: " . $veza->error . " " . E_USER_ERROR);
        if (!$rezultat) {
            $rezultat = null;
        }
        self::prekidVeze($veza);
        return $rezultat;
    }

    function prekidVeze($veza) {
        $veza->close();
    }

    function update($upit, $skripta = "") {
        $veza = self::spojiNaBazu();
        if ($rezultat = $veza->query($upit)) {
            self::prekidVeze($veza);
            if ($skripta != "") {
                header("Location: $skripta");
            } else {
                return $rezultat;
            }
        }
        else{
            echo "Pogreška: ".$veza->error;
            self::prekidVeze($veza);
            return $rezultat;
        }
    }

}
?>
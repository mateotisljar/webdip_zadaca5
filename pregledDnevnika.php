<?php

include 'dnevnik.php';
    $rezultat = Dnevnik::vratiPodatkeZaDnevnik();
    echo "<table border=1>";
    echo "<caption>Dnevnik</caption>";
    echo "<thead>"
    . "<th>Datum i vrijeme</th>"
    . "<th>Id_korisnika</th>"
    . "<th>Ime</th>"
    . "<th>Prezime</th>"
    . "<th>Korisnicko ime</th>"
    . "<th>Skripta</th>"
    . "<th>Greska</th>";
    
    while ($lista = $rezultat->fetch_array()) {
        
            echo "<tr>"
            . "<td>$lista[0]</td>"
            . "<td>$lista[1]</td>"
            . "<td>$lista[4]</td>"
            . "<td>$lista[2]</td>"
            . "<td>$lista[3]</td>"
            . "<td>$lista[5]</td>"
            . "<td>$lista[6]</td>"
            . "<td>$lista[7]</td>"
            . "</tr>";
        }
    
        
?>


<html>
    <head>
        <title>Registracija korisnika</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Mateo Tišljar">
        <meta name="keywords" content="FOI, WebDiP">
        <link href="css/mtisljar.css" rel="stylesheet" type="text/css">
        <link href="css/mtisljar_mobiteli.css" rel="stylesheet" type="text/css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <header>
            <h1 id="h1">Zadaca_05</h1>
            <ul><li><a href="odjava.php">Odjava</a></li></ul>
        </header>
        <aside>
            <nav id="nav">
                <ul>
                    
                    {if !isset($korisnicko_ime)}
                    <li><a href="registracija.php">Registracija</a></li>
                    <li><a href="prijava.php" >Prijava</a></li>
                    {else}
                    <li><a href="detalji_korisnika.php?korisnicko_ime={$korisnicko_ime}">Detalji korisnika</a></li>
                    {if $tip_korisnika == 1}
                    <li><a href="ispis_korisnika.php">Ispis korisnika</a></li>
                    <li><a href="pregledDnevnika.php">Dnevnik</a></li>
                    {/if}
                     
                    {/if}
                    
                    <li><a href="http://eportfolio.foi.hr/user/view.php?id=2998" target="_blank">E-portfolio</a></li>
                </ul>
            </nav>
        </aside>

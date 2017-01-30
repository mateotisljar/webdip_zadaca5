 <div id="sadrzaj">
            <section>
                <form method="POST" id="form1" name="form1" action="detalji_korisnika.php"> 
                    <label class="labele" for="ime">Unesite svoje ime: </label>
                    <input type="text" class="inputi" id="ime" name="ime" placeholder="Ime" size="20" value="{$korisnik.ime}" ><br><br>

                    <label class="labele" for="prezime">Unesite svoje prezime: </label>
                    <input type="text" class="inputi" id="prezime" name="prezime" placeholder="Prezime" size="30"  value="{$korisnik.prezime}" ><br><br>

                    <label class="labele" for="korisnicko_ime">Korisničko ime: </label>
                    <input type="text" class="inputi" id="korisnicko_ime" name="korisnicko_ime" maxlength="20" size="10" placeholder="Korsničko ime"  value="{$korisnik.korisnicko_ime}" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="password">Lozinka: </label>
                    <input type="text" class="inputi" name="password" id="password" placeholder="Lozinka" value="{$korisnik.password}" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="password2">Ponovno upišite lozinku: </label>
                    <input type="text" class="inputi" name="password2" id="password2" placeholder="Lozinka" value="{$korisnik.password2}" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="enkripcija">Enkripcija: </label>
                    <keygen class="inputi" id="enkripcija" name="keygen" value="<{$korisnik.keygen}" ><br><br>

                    <label class="labele" for="rodjendan_dan">Rođendan (dan): </label>
                    <input type="number" class="inputi" id="rodjendan_dan" name="rodjendan_dan"  value="{$korisnik.rodjendan_dan}" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="rodjendan_mjesec">Rođendan (mjesec): </label>
                    <input list="rodjendan_mjesec2" class="inputi" id="rodjendan_mjesec" name="rodjendan_mjesec" value="{$korisnik.rodjendan_mjesec}" > <span class="nevidljivo"></span><br><br>

                    <label class="labele" for="rodjendan_godina">Rođendan (godina) </label>
                    <input type="number" class="inputi" id="rodjendan_godina" name="rodjendan_godina" value="{$korisnik.rodjendan_godina}" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="spol">Spol: </label>
                    <input id="spol" name="spol" value="{$korisnik.spol}" >

                    <br><br>
                    <label class="labele" for="mobilni_telefon">Mobilni telefon: </label>
                    <input id="drzava" name="drzava" value="{$korisnik.drzava}" >

                    <input type="tel" class="inputi" id="mobilni_telefon" name="mobilni_telefon" value="{$korisnik.mobilni_telefon}" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="email">Email adresa: </label>
                    <input type="email" class="inputi" id="email" name="email" value="{$korisnik.email}" ><span class="nevidljivo"></span><br><br>


                    <label class="labele" for="lokacija">Lokacija: </label>
                    <textarea id="lokacija" class="inputi" name ="lokacija" cols="100" rows="40"  value="{$korisnik.lokacija}" ></textarea><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="slika">Slika: </label>
                    <img src="img/twrp.jpg" style=" height:50px;width:50px" ><br><br>

                    <label class="labele" for="obavijest">Obavijesti: </label>
                    <input  id="obavijest" name="obavijest"  value="{$korisnik.obavijest}" >

                    <input type="submit" name="promijeni" value="Promijeni">

                </form>
                <div>
                    
                    {$poruka}
                    
                </div>
            </section>

        </div>
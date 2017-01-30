<div id="sadrzaj">

            <section>
                <form method="POST" id="form1" name="registracija" action="registracija.php" enctype="multipart/form-data" > 
                    <label class="labele" for="ime">Unesite svoje ime: </label>
                    <input type="text" class="inputi" id="ime" name="ime" placeholder="Ime" size="20" ><br><br>

                    <label class="labele" for="prezime">Unesite svoje prezime: </label>
                    <input type="text" class="inputi" id="prezime" name="prezime" placeholder="Prezime" size="30" ><br><br>

                    <label class="labele" for="korisnicko_ime">Korisničko ime: </label>
                    <input type="text" class="inputi" id="korisnicko_ime" name="korisnicko_ime" maxlength="20" size="10" placeholder="Korsničko ime" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="password">Lozinka: </label>
                    <input type="password" class="inputi" name="password" id="password" placeholder="Lozinka"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="password2">Ponovno upišite lozinku: </label>
                    <input type="password" class="inputi" name="password2" id="password2" placeholder="Lozinka"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="enkripcija">Enkripcija: </label>
                    <keygen class="inputi" id="enkripcija" name="enkripcija"><br><br>

                    <label class="labele" for="rodjendan_dan">Rođendan (dan): </label>
                    <input type="number" class="inputi" id="rodjendan_dan" name="rodjendan_dan"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="rodjendan_mjesec">Rođendan (mjesec): </label>
                    <input list="rodjendan_mjesec2" class="inputi" id="rodjendan_mjesec" name="rodjendan_mjesec"> <span class="nevidljivo"></span>
                    <datalist id="rodjendan_mjesec2">
                        <option value="Siječanj">
                        <option value="Veljača">
                        <option value="Ožujak">
                        <option value="Travanj">
                        <option value="Svibanj">
                        <option value="Lipanj">
                        <option value="Srpanj">
                        <option value="Kolovoz">
                        <option value="Rujan">
                        <option value="Listopad">
                        <option value="Studeni">
                        <option value="Prosinac">
                    </datalist><br><br>
                    <label class="labele" for="rodjendan_godina">Rođendan (godina) </label>
                    <input type="number" class="inputi" id="rodjendan_godina" name="rodjendan_godina"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="spol">Spol: </label>
                    <select id="spol" name="spol">
                        <option value="0">Muški</option>
                        <option value="1">Ženski</option>
                    </select>
                    <br><br>
                    <label class="labele" for="mobilni_telefon">Mobilni telefon: </label>
                    <select id="drzava"  name="drzava">
                        <option value="+382 Crna Gora">+382 Crna Gora</option>
                        <option value="+383 Kosovo">+383 Kosovo</option>
                        <option value="+385 Hrvatska">+385 Hrvatska</option>
                        <option value="+386 Slovenija">+386 Slovenija</option>
                        <option value="+387 Bosna i Hercegovina">+387 Bosna i Hercegovina</option>

                    </select>
                    <input type="tel" class="inputi" id="mobilni_telefon" name="mobilni_telefon"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="email">Email adresa: </label>
                    <input type="email" class="inputi" id="email" name="email"><span class="nevidljivo"></span><br><br>



                    <label class="labele" for="lokacija">Lokacija: </label>
                    <textarea id="lokacija" class="inputi" name="lokacija" cols="100" rows="40" ></textarea><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="slika">Slika: </label>
                    <input type="file" class="inputi" id="slika" name="slika" ><br><br>

                    <label class="labele" for="obavijest">Obavijesti: </label>
                    <input type="radio" id="obavijest" name="obavijest" value="Da">Da
                    <input type="hidden" id="obavijest" name="obavijest" value="Ne">Ne<br><br>
                    <div class="g-recaptcha" data-sitekey="6LcY4B4TAAAAABXJZ-ODWygBNmv3nxhRh3d8WXKW"></div>

                    <input type="submit" name="submit" id="submit" value="Registriraj me" ><br><br>

                    <article id="greske">
                        {$poruke}
                    </article>

                </form>
            </section>

        </div>
        
<div id="sadrzaj2">

            <section>
                <form method="POST" id="form" name="form" action=""  > 
                    <span class="nevidljivo"></span><br>
                    <span class="nevidljivo"></span><br>
                    <label  for="korisnicko_ime" >Korisničko ime: </label>
                    <input type="text" id="korisnicko_ime" name="korisnicko_ime" placeholder="Korisničko ime" autofocus="autofocus"><br><br>

                    <label for="lozinka">Lozinka: </label>
                    <input type="password" id="password" name="password" placeholder="Lozinka"><br><br>

                    <label for="checkbox">Zapamti me?</label>
                    <input type="checkbox" id="checkbox" name="checkbox" checked="checked" ><br><br>

                    <input type="submit" name="submit" value="Prijavi se"><br><br>

                    <a href="registracija.php">Zaboravljena lozinka?</a><br><br>

                    <p>
                        Administrator<br>
                        Korisnicko ime: mtisljarM?!<br>
                        Lozinka: mateoTisljar94?!
                    </p>
                    <p>
                        Moderator<br>
                        Korisnicko ime: pcrnjakP?!<br>
                        Lozinka: pcrnjacicP93?!
                    </p>
                    <p>
                        Obični korisnik<br>
                        Korisnicko ime: hhrvoiccC?!<br>
                        Lozinka: hhrvoicH93?!
                    </p>

                </form>
                <section id="greska">
                    {$greska}
                </section>
            </section>


        </div>
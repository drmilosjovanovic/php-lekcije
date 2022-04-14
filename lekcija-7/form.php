<html>
    <head>
        <link href="style.css" rel="stylesheet" />
        <title>Moja prva forma</title>
    </head>
    <body>
        <form action="process.php" method="POST">
            <div class="form-row">
                <input type="text" name="ime" placeholder="Korisnicko ime" required/>
            </div>
            <div class="form-row">
                <input type="password" name="lozinka" placeholder="Lozinka"/>
            </div>
            <div class="form-row">
                <input type="radio" name="nalog" value="admin" checked> Admin
                <input type="radio" name="nalog" value="standardni korisnik"> Standard User
            </div>
            <div class="form-row">
                <input type="checkbox" name="prihvatam" value="prihvatam uslove"/> I accept terms and conditions
            </div>
            <div class="form-row">
                Odaberite omiljeni film: </br />
                <select name="favourite_movie[]" multiple>
                    <option value="Ko to tamo peva">Ko to tamo peva</option>
                    <option value="Maratonci">Maratonci</option>
                    <option value="Mrtav ladan">Mrtav ladan</option>
                </select>
            </div>
            <div class="form-row">
                Starost: <input type="number" name="age" min="18" max="35"/>
            </div>
            <div class="form-row">
                Datum: <input type="date" name="date"/>
            </div>    
            <div class="form-row">
                Vreme: <input type="time" name="vreme"/>
            </div>                       
            <div class="form-row">
                Opis:<br />
                <textarea name="description"></textarea>
            </div>
            <div class="form-row">
                <input type="reset" value="Ponisti unos"/>
                <input type="submit" value="Uloguj se"/>
            </div>
        </form>
    </body>
</html>
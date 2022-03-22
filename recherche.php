<?php
    $titre = "Rythm Break";
    $h1 = "Rythm Break";
    $link = "./css/styles-standards.css";
    $descrip = "Projet de Développement Web";
    require "./include/header.inc.php";
?> 

    <main>
        <section>

            <h2>Cherchez vos chansons favories</h2>
            <article>
                <h3>Musiques</h3>
                <fieldset>
                    <legend style="color:cyan">Rythm Break</legend>
                    <label for="mychoices">choisir le nom de l'artiste</label>
                    <input type="text" name="nom" placeholder="Choisir un nom" />

                    <label for="mychoices">choisir un mois</label>
                    <select name="type">
                        <option value="singer"> Artiste </option>
                        <option value="album"> Album </option>
                        <option value="song"> Musique </option>
                        <option value="song"> Autres </option>
                    </select>
                </fieldset>
                
            </article>

        </section>
        

        
    </main>

<?php
   require "./include/footer.inc.php";
?>
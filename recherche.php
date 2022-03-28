<?php
    $titre = "Rythm Break";
    $h1 = "Rythm Break";
    $link = "./css/styles-standards.css";
    $descrip = "Projet de Développement Web";
    require "./include/header.inc.php";
?> 

    <main>
        <section>
            <h2>Cherchez vos chansons favorites</h2>
            <article>

                <h3>Musiques</h3>
                <form action="recherche.php" method="get">
                    <fieldset>
                        <legend style="color:cyan">Rythm Break</legend>
                        <label for="mychoices">taper le nom de l'artiste</label>
                        <input type="text" name="nom" placeholder="Choisir un nom" />
                        <label for="mychoices">choisir le genre </label>
                        <select name="type">
                            <option value="singer"> Artiste </option>
                            <option value="album"> Album </option>
                            <option value="song"> Musique </option>
                            <option value="others"> Autres </option>
                        </select>
                        <input type="submit" value="rechercher" />  	
                    </fieldset>
                </form>
                
            </article>
        </section> 
        
        <?php
                if(isset($_GET["nom"])){
                    $elt = $_GET["nom"];
                    $nomart = getArtist($elt);
                    echo '<section><article id="is">';
                    echo "<h3 style='color:cyan'>$elt</h3>";
                    echo "<h4 style='color:red'>Liste des Artistes</h4>";
                    echo "<ul>";
                    for ($i=0; $i<sizeof($nomart); $i++) {
                        echo "<li style='color:white'>".$nomart[$i]->name."</li>";
                    }
                    echo "</ul>";
                    echo "</section></article>";
                } else if(empty($_GET["nom"])){
                    echo "veuillez entrer quelque chose";
                }

            ?>

    </main>

<?php
   require "./include/footer.inc.php";
?>
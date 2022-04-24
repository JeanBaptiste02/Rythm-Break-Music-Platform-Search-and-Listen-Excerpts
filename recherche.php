<?php
    $titre = "Rythm Break";
    $h1 = "Rythm Break";
    $link = "./css/styles-standards.css";
    $descrip = "Projet de DÃ©veloppement Web";
    require "./include/header.inc.php";
?> 

    <main>
        <section>
            <h2>Cherchez vos chansons favorites</h2>
            <article>

                <h3>Recherchez</h3>
                <form action="recherche.php" method="get">
                    <fieldset>
                        <legend class="legmain">Rythm Break</legend>
                        <label for="mychoices">taper le nom de l'artiste</label>
                        <input type="text" name="nom" placeholder="Choisir un nom" />
                        <label for="mychoices">choisir le genre </label>
                        <select name="type">
                            <option value="singer"> Artiste </option>
                            <option value="album"> Album </option>
                            <option value="song"> Musique </option>
                        </select>
                        <input type="submit" value="rechercher" />  	
                    </fieldset>
                </form>
                
            </article>
        </section> 
        
        <?php
                if(isset($_GET["nom"]) && (isset($_GET["type"])) && (!empty($_GET["nom"])) && $_GET["type"] == "singer"){
                    $nomart = getArtist(urlencode($_GET["nom"]));
                    echo '<section>';
                    echo "<h4>Liste des Artistes</h4>";
                    if(empty($nomart)) {
                        echo "<p style='color:white; padding-right: 1%;'>Aucun résultat trouvé</p> \n";
                    }
                    echo "<ol class='centerItems'>";
                    for ($i=0; $i<sizeof($nomart); $i++) {
                        echo '<article class="is">';
                        echo "<li class='recpageclr'><table class='listeItemClass'><tr><td>".$nomart[$i]->name."</td>";
                        echo '<td>  <form action="informations.php" method="get">
                                    <input type="hidden" name="artist" value='.urlencode($nomart[$i]->name).' />
                                    <input type="submit" value="Details" />
                                    </form>
                        </td></tr></table></li>';
                        echo "</article>";
                    }
                    echo "</ol>";
                    echo "</section>";
                }  else if(empty($_GET["nom"]) && (isset($_GET["type"])) && $_GET["type"] == "singer"){
                    echo "<section>";
                    echo "<h4>Liste des Artistes</h4>";
                    echo "<p style='color:white; padding-right: 1%;'>Aucun résultat trouvé</p> \n";
                    echo "</section>";
                }

                if(isset($_GET["nom"]) && (isset($_GET["type"])) && (!empty($_GET["nom"])) && $_GET["type"] == "album"){
                    $nomalb = getAlbums(urlencode($_GET["nom"]));
                    echo '<section>';
                    echo "<h4>Liste des Albums</h4>";
                    if(empty($nomalb)) {
                        echo "<p style='color:white; padding-right: 1%;'>Aucun résultat trouvé</p> \n";
                    }
                    echo "<ol class='centerItems'>";
                    for ($i=0; $i<sizeof($nomalb); $i++) {
                        echo '<article class="is">';
                        echo "<li class='recpageclr'><table class='listeItemClass'><tr><td>".$nomalb[$i]->name."</td>";
                        echo "<td> Artiste : ".$nomalb[$i]->artist."</td>";
                        echo '<td>  <form action="informations.php" method="get">
                                    <input type="hidden" name="album" value='.urlencode($nomalb[$i]->name).' />
                                    <input type="hidden" name="artiste" value='.urlencode($nomalb[$i]->artist).' />
                                    <input type="submit" value="Details" />
                                    </form>
                        </td></tr></table></li>';
                        echo "</article>";
                    }
                    echo "</ol>";
                    echo "</section>";
                } else if(empty($_GET["nom"]) && (isset($_GET["type"])) && $_GET["type"] == "album"){
                    echo "<section>";
                    echo "<h4>Liste des Albums</h4>";
                    echo "<p style='color:white; padding-right: 1%;'>Aucun résultat trouvé</p> \n";
                    echo "</section>";
                }

                if(isset($_GET["nom"]) && (isset($_GET["type"])) && (!empty($_GET["nom"])) && $_GET["type"] == "song"){
                    $songs = getTracks(urlencode($_GET["nom"]));
                    echo '<section>';
                    echo "<h4>Liste des Musiques</h4>";
                    if(empty($songs)) {
                        echo "<p style='color:white; padding-right: 1%;'>Aucun résultat trouvé</p> \n";
                    }
                    echo "<ol class='centerItems'>";
                    for ($i=0; $i<sizeof($songs); $i++) {
                        echo '<article class="is">';
                        echo '<li><img src="./images/noimage.jpg" height="30" width="30" alt="song image"/></li>';
                        echo "<li class='recpageclr'><table class='listeItemClass'><tr><td>".$songs[$i]->name."</td>";
                        echo "<td> Artiste : ".$songs[$i]->artist."</td>";
                        echo '<td>  <form action="informations.php" method="get">
                                    <input type="hidden" name="songs" value='.urlencode($songs[$i]->name).' />
                                    <input type="hidden" name="artiste" value='.urlencode($songs[$i]->artist).' />
                                    <input type="submit" value="Details" />
                                    </form>
                        </td></tr></table></li>';
                        echo "</article>";
                    }
                    echo "</ol>";
                    echo "</section>";
                } else if(empty($_GET["nom"]) && (isset($_GET["type"])) && $_GET["type"] == "song"){
                    echo "<section>";
                    echo "<h4>Liste des Musiques</h4>";
                    echo "<p style='color:white; padding-right: 1%;'>Aucun résultat trouvé</p> \n";
                    echo "</section>";
                }

            ?>

    </main>

<?php
   require "./include/footer.inc.php";
?>
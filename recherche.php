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

                <h3>Recherchez</h3>
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
                if(isset($_GET["nom"]) && (isset($_GET["type"])) && $_GET["type"] == "singer"){
                    $nomart = getArtist($_GET["nom"]);
                    echo '<section>';
                    echo "<h4>Liste des Artistes</h4>";
                    echo "<ol class='centerItems'>";
                    for ($i=0; $i<sizeof($nomart); $i++) {
                        echo '<article class="is">';
                        echo "<li style='color:whit; padding-right: 1%;'><table class='listeItemClass'><tr><td>".$nomart[$i]->name."</td>";
                        echo "<td><button>details</button></td></tr></table></li>";
                        echo "</article>";
                    }
                    echo "</ol>";
                    echo "</section>";
                }
                if(isset($_GET["nom"]) && (isset($_GET["type"])) && $_GET["type"] == "album"){
                    $nomalb = getAlbums($_GET["nom"]);
                    echo '<section>';
                    echo "<h4>Liste des Albums</h4>";
                    echo "<ol class='centerItems'>";
                    for ($i=0; $i<sizeof($nomalb); $i++) {
                        echo '<article class="is">';
                        echo "<li style='color:whit; padding-right: 1%;'><table class='listeItemClass'><tr><td>".$nomalb[$i]->name."</td>";
                        echo "<td> Artiste : ".$nomalb[$i]->artist."</td>";
                        echo "<td><button>details</button></td></tr></table></li>";
                        echo "</article>";
                    }
                    echo "</ol>";
                    echo "</section>";
                }
                if(isset($_GET["nom"]) && (isset($_GET["type"])) && $_GET["type"] == "song"){
                    $songs = getTracks($_GET["nom"]);
                    echo '<section>';
                    echo "<h4>Liste des Musiques</h4>";
                    echo "<ol class='centerItems'>";
                    for ($i=0; $i<sizeof($songs); $i++) {
                        echo '<article class="is">';
                        echo "<li style='color:white';><table class='listeItemClass'><tr><td>".$songs[$i]->name."</td>";
                        echo "<td> Artiste : ".$songs[$i]->artist."</td>";
                        echo '<td>  <form action="recherche.php" method="get">
                                    <input type="hidden" name="songs" value='.$songs[$i]->name.' />
                                    <input type="hidden" name="artiste" value='.$songs[$i]->artist.' />
                                    <input type="submit" value="Details" />
                                    </form>
                        </td></tr></table></li>';
                        echo "</article>";
                    }
                    echo "</ol>";
                    echo "</section>";
                }

                if ((isset($_GET["songs"]))&&(isset($_GET["artiste"]))){

                    $details = getTracksDetails($_GET["songs"], $_GET["artiste"]);
                    echo "<section style='background-color:gray; border-radius:30px; color:white; text-align:center;'><h2>Détails sur la musique : ".$details["name"]."</h2>";
                    echo "<ol>";
                    echo "<li>Artiste : ".$details["artist"]["name"]."</li>";
                    echo "<li>Album : ".$details["album"]["title"]." de ".$details["album"]["artist"]."</li>";
                    echo "<li>Artiste : ".$details["artist"]["name"]."</li>";
                    echo "<li>".$details["wiki"]["summary"]."</li>";
                    echo "</ol>";    
                    echo "</section>";
                }

            ?>

    </main>

<?php
   require "./include/footer.inc.php";
?>
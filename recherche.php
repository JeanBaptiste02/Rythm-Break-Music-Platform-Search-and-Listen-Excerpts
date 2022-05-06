<?php
    $titre = "Rythm Break";
    $h1 = "Rythm Break";
    $link = "./css/styles-standards.css";
    $descrip = "Projet de DÃ©veloppement Web";
    require "./include/header.inc.php";

    if(isset($_GET["nom"]) && !empty($_GET["nom"])) {
        $search = urldecode($_GET["nom"]);
    }
   
?> 

    <main>
        <section>
            <h2>Cherchez vos chansons favorites</h2>
            <article>

                <h3>Recherchez</h3>
                <form action="recherche.php" method="get">
                    <fieldset>
                        <legend style="color:cyan">Rythm Break</legend>
                        <label for="mychoices">Recherchez</label>
                        <input type="text" id="mychoices" name="nom" placeholder="Choisir un nom" value="<?php echo $search; ?>" />
                        <label for="mychoices">choisir le genre </label>
                        <select name="type">
                            <option value="singer" <?php if($_GET['type']=='singer') echo 'selected="selected"';?> > Artiste </option>
                            <option value="album" <?php if($_GET['type']=='album') echo 'selected="selected"';?> > Album </option>
                            <option value="song" <?php if($_GET['type']=='song') echo 'selected="selected"';?> > Musique </option>
                        </select>
                        <input type="submit" value="rechercher" />  	
                    </fieldset>
                </form>

                <?php
                if(isset($_GET["nom"]) && (isset($_GET["type"])) && (!empty($_GET["nom"])) && $_GET["type"] == "singer"){
                    $nomart = getArtists(urlencode($_GET["nom"]));
                    $rech = urldecode($_GET['nom']);
                    echo "<h4>Résultats de la recherche '".$rech."'</h4>";
                    echo "<div class='grid-container'> \n";
                    foreach($nomart['data'] as $row) {
                        $id = $row['id']; 
                        $artistName = $row['name'];
                        $artistName2 = urlencode($artistName);
                        $urlPicture = $row['picture_medium']; 
                        echo "<div class='grid-item'> \n";
                        echo "<figure> \n";
                        echo "<a href='informations.php?artist=$artistName2&id=$id'> \n";
                        echo "<img src='$urlPicture' alt='image de lartiste' width='250' height='250' /> \n";
                        echo "</a> \n";
                        echo "</figure> \n";
                        echo "<figcaption> \n";
                        echo "<h5>".$artistName."</h5> \n";
                        echo "</figcaption> \n";
                        echo "</div> \n";
                    }
                    echo "</div> \n";
                }  else if((empty($_GET["nom"]) && (isset($_GET["type"])) && $_GET["type"] == "singer")){
                        $rech = urldecode($_GET['nom']);
                        echo "<h4>Résultats de la recherche '".$rech."'</h4>";
                        echo "<p style='color:white; padding-right: 1%;'>Aucun résultat trouvé</p> \n";  
                }
              

                if(isset($_GET["nom"]) && (isset($_GET["type"])) && (!empty($_GET["nom"])) && $_GET["type"] == "album"){
                    $nomAlb = getAlbums(urlencode($_GET["nom"]));
                    $rech = urldecode($_GET['nom']);
                    echo "<h4>Résultats de la recherche '".$rech."'</h4>";
                    echo "<div class='grid-container'> \n";
                    foreach ($nomAlb['data'] as $row) {
                        $id = $row['id']; 
                        $albumName = $row['title'];
                        $albumName2 = urlencode($albumName);
                        $urlPicture = $row['cover_medium']; 
                        echo "<div class='grid-item'> \n";
                        echo "<figure> \n";
                        echo "<a href='informations.php?album=$albumName2&id=$id'> \n";
                        echo "<img src='$urlPicture' alt='image de lalbum' width='250' height='250' /> \n";
                        echo "</a> \n";
                        echo "</figure> \n";
                        echo "<figcaption> \n";
                        echo "<h5>".$albumName."</h5> \n";
                        echo "</figcaption> \n";
                        echo "</div> \n";
                    }
                    echo "</div> \n";
                    
                } else if(empty($_GET["nom"]) && (isset($_GET["type"])) && $_GET["type"] == "album"){
                    $rech = urldecode($_GET['nom']);
                    echo "<h4>Résultats de la recherche '".$rech."'</h4>";
                    echo "<p style='color:white; padding-right: 1%;'>Aucun résultat trouvé</p> \n";  
                }

                if(isset($_GET["nom"]) && (isset($_GET["type"])) && (!empty($_GET["nom"])) && $_GET["type"] == "song"){
                    $nomSon = getTracks(urlencode($_GET["nom"]));
                    $rech = urldecode($_GET['nom']);
                    echo "<h4>Résultats de la recherche '".$rech."'</h4>";
                    echo "<div class='grid-container'> \n";
                    foreach($nomSon['data'] as $row) {
                        $id = $row['id']; 
                        $songName = $row['title'];
                        $songName2 = urlencode($songName);
                        $urlPicture = $row['album']['cover_medium']; 
                        echo "<div class='grid-item'> \n";
                        echo "<figure> \n";
                        echo "<a href='informations.php?songs=$songName2&id=$id'> \n";
                        echo "<img src='$urlPicture' alt='image de lalbum' width='250' height='250' /> \n";
                        echo "</a> \n";
                        echo "</figure> \n";
                        echo "<figcaption> \n";
                        echo "<h5>".$songName."</h5> \n";
                        echo "</figcaption> \n";
                        echo "</div> \n";
                    }
                    echo "</div> \n";
                } else if(empty($_GET["nom"]) && (isset($_GET["type"])) && $_GET["type"] == "song"){
                    $rech = urldecode($_GET['nom']);
                    echo "<h4>Résultats de la recherche '".$rech."'</h4>";
                    echo "<p style='color:white; padding-right: 1%;'>Aucun résultat trouvé</p> \n";  
                }
            ?>
            
            </article>
        </section> 
    </main>

<?php
   require "./include/footer.inc.php";
?>
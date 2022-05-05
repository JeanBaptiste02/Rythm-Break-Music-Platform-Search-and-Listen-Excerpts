<?php
    $titre = "Rythm Break";
    $h1 = "Rythm Break";
    $link = "./css/styles-standards.css";
    $descrip = "Projet de Développement Web";
    require "./include/header.inc.php";

?> 

    <main>
        <section id="rechehceBienvenue">
            <h2> Bienvenue </h2>
            <h3>Rythm Break - Découvrez vos musiques préférées!</h3>
            <form action="recherche.php" method="get">
                <input type="text" name="nom" placeholder="Choisir un nom" />

                <select name="type">
                    <option value="singer"> Artiste </option>
                    <option value="album"> Album </option>
                    <option value="song"> Musique </option>
                </select>
                <input type="submit" class ="inputSubmitIndex" value="rechercher" />  	
            </form>
       

        </section>


        <?php
        
            $reper = 'photos';
            $imgtab = array();
            if (file_exists($reper) && is_dir($reper) ) {
                
                $dir_arr = scandir($reper);
                $tabimgs = array_diff($dir_arr, array('.','..') );
                foreach ($tabimgs as $fichier) {
                    $chemin = $reper."/".$fichier;
                    $ext = pathinfo($chemin, PATHINFO_EXTENSION);
                    if ($ext=="jpg" || $ext=="png" || $ext=="JPG" || $ext=="PNG") {
                    array_push($imgtab, $fichier);
                    }
                    
                }
                $count_img_index = count($imgtab) - 1;
                $random_img = $imgtab[rand( 0, $count_img_index )];
            }

            if(!empty($_COOKIE['songName']) && !empty($_COOKIE['idSong'])) {
                $idSon = $_COOKIE['idSong'];
                $nomSon = $_COOKIE['songName'];
                $urlPicture = getTrackPicture($idSon);
                echo "<h4 style='color: green'>Dernière musique consulté</h4> \n";
                echo "<figure> \n";
                echo "<a href='informations.php?songs=$nomSon&id=$idSon'> \n";
                echo "<img src='$urlPicture' alt='image de la chanson' width='150' height='150' class='lastMusiq' /> \n";
                echo "</a> \n";
                echo "</figure> \n";
                echo "<figcaption> \n";
                echo "<h5>".$nomSon."</h5> \n";
                echo "</figcaption> \n";
            }
            
            
        ?>

        <h4 style="color: green">Image au hasard</h4>
        <figure>
            <img src="<?php echo $reper."/".$random_img ?>" class="randomimage">
            <figcaption></figcaption>
        <figure>

    </main>

<?php
   require "./include/footer.inc.php";
?>
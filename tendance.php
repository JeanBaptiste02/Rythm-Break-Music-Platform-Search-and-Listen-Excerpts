<?php
    $titre = "Rythm Break";
    $h1 = "Rythm Break";
    $link = "./css/styles-standards.css";
    $descrip = "Projet de Développement Web";
    require "./include/header.inc.php";
?> 

    <main>
        <section>
            <h2>Les musiques les plus écoutés du moment</h2>
            <?php
                $tracks = getTracksTrending();
                if (!empty($tracks) && count($tracks) != 0) {
                    echo "<div class='grid-containernumb3'> \n";
                    foreach($tracks['data'] as $row) {
                        $idTrack = $row['id'];
                        $urlPicture = getTrackPicture($idTrack);
                        $trackName = $row['title']; 
                        $trackName2 = urlencode($trackName); 
                        echo "<figure> \n";
                        echo "<a href='informations.php?songs=$trackName2&id=$idTrack'> \n";
                        echo "<img src='$urlPicture' alt='image de la chanson' width='150' height='150' /> \n";
                        echo "</a> \n";
                        echo "</figure> \n";
                        echo "<figcaption> \n";
                        echo "<h4>".$trackName."</h4> \n";
                        echo "</figcaption> \n";
                    }
                    echo "</div>"; 
                }
            ?>
        </section> 
        <section>
            <h2>Les albums les plus écoutés du moment</h2>
            <?php
                $albums = getAlbumsTrending();
                if(!empty($albums) && count($albums) != 0) {
                    echo "<div class='grid-containernumb3'> \n";
                    foreach($albums['data'] as $row) {
                        $idAlb = $row['id'];
                        $albumName = $row['title']; 
                        $urlPictureAlbum = $row['cover_medium'];
                        $albumName2 = urlencode($albumName); 
                        echo "<figure> \n";
                        echo "<a href='informations.php?album=$albumName2&id=$idAlb'> \n";
                        echo "<img src='$urlPictureAlbum' alt='image de la chanson' width='150' height='150' /> \n";
                        echo "</a> \n";
                        echo "</figure> \n";
                        echo "<figcaption> \n";
                        echo "<h4>".$albumName."</h4> \n";
                        echo "</figcaption> \n";
                    }
                    echo "</div>";
                }
            ?>
        </section>
        <section>
            <h2>Les artistes les plus suivis du moment</h2>
            <?php
                $art = getArtistsTrending();
                if (!empty($art) && count($art) != 0) {
                    echo "<div class='grid-containernumb2'> \n";
                    foreach($art['data'] as $row) {
                        $idArtist = $row['id'];
                        $artistName = $row['name'];  
                        $artistName2 = urlencode($artistName); 
                        $urlPicture = $row['picture_medium']; 
                        echo "<article>";
                        echo "<figure> \n";
                        echo "<a href='informations.php?artist=$artistName2&id=$idArtist'> \n";
                        echo "<img src='$urlPicture' alt='image de lartiste' width='150' height='150' class='lastMusiq' /> \n";
                        echo "</a> \n";
                        echo "</figure> \n";
                        echo "<figcaption> \n";
                        echo "<h4>".$artistName."</h4> \n";
                        echo "</figcaption> \n";
                        echo "</article>";
                    }  
                    echo "</div>";
                } 
            ?>
        </section>
        
    </main>

<?php
   require "./include/footer.inc.php";
?>
<?php
    $titre = "Rythm Break";
    $h1 = "Rythm Break";
    $link = "./css/styles-standards.css";
    $descrip = "Projet de Développement Web";
    require "./include/header.inc.php";
?> 

    <main>
        <section class="details">
        <?php
            
            if (isset($_GET["songs"])) {
                $details = getTracksDetails($_GET["id"]);
                $idMusic = $details["id"];
                echo "<h2>Détails</h2> \n";

                echo "<div class='sec'> \n";
                $urlPicture = getTrackPicture($_GET["id"]);
                echo "<figure> \n";
                echo "<img src='$urlPicture' alt='image de lalbum' width='250' height='250' /> \n";
                echo "</figure> \n";

                echo "<div id='details-info'> \n \t";
                echo "<div id='details-info-title'> \n \t \t";
                $name = $details["title"];
                echo "<h3>$name</h3> \n";
                $length = $details["duration"]; 
                echo "<p class='p2'>Durée : ".gmdate("i:s", $length)."</p> \n";
                $date = $details["release_date"];
                $annee = substr($date, -10, -6);
                $mois = substr($date, -5, -3);
                $jour = substr($date, -2);
                echo "<p class='p2'>Date de sortie : ".$jour.'/'.$mois.'/'.$annee."</p> \n";
                $artistName = $details["artist"]["name"];
                $idArtist = $details["artist"]["id"];
                echo "<p class='p2'>Artiste : <a href='informations.php?artist=$artistName&id=$idArtist'>$artistName</a></p> \n";
                $albumName = $details["album"]["title"];
                $idAlbum = $details["album"]["id"];
                echo "<p class='p2'>de l'album : <a href='informations.php?album=$albumName&id=$idAlbum'>$albumName</a></p> \n";
                $urlMp3 = $details['preview'];
                echo "<audio controls> \n";
                echo "<source src='$urlMp3' type='audio/mpeg'/> \n"; 
                echo "</audio> \n";
                echo "</div> \n \t \t";
                echo "</div> \n \t";
                echo "</div> \n";
                
                $data = readCSV('songdata.csv');
                $sonName = urldecode($name);
                $artName = urldecode($artistName);

                if(($data[1][0] == NULL) && ($data[1][1] == NULL) && ($data[1][2] == NULL) && ($data[1][3] == NULL)) { // on place la 1ere musique dans le CSV
                    $data[] = array($sonName, $artName, 0, $idMusic);
                    writeCSV('songdata.csv', $data);     
                }
                $verif = FALSE;
                for($i=0; $i<sizeof($data); $i++) { // on parcour du debut tout le csv ligne par ligne
                    if(($data[$i][0] == $sonName) && ($data[$i][1] == $artName) && ($data[$i][3] == $idMusic)) { // si la musique exist deja  dans le CSV
                        $vue = $data[$i][2];
                        $vue++;
                        $data[$i] = array($sonName, $artName, $vue, $idMusic); // incrémente juste le nombre de vue de la musique
                        writeCSV('songdata.csv', $data);
                        $existDeja = TRUE;
                    }
                }
                if($existDeja == FALSE) { // la musique n'existe pas dans le CSV donc
                    $data[] = array($sonName, $artName, 1, $idMusic);
                    writeCSV('songdata.csv', $data);
                }
                 
            }

            if (isset($_GET["album"])) {
                $details = getAlbumsDetails($_GET["id"]);
                $idAlbum = $details["id"];
                echo "<h2>Détails</h2> \n";
                
                echo "<div class='sec'> \n";
                $urlPicture = getAlbumPicture($_GET["id"]);
                echo "<figure> \n";
                echo "<img src='$urlPicture' alt='image de lalbum' width='250' height='250' /> \n";
                echo "</figure> \n";

                echo "<div id='details-info'> \n \t";
                echo "<div id='details-info-title'> \n \t \t";
                $name = $details["title"];
                echo "<h3>$name</h3> \n";
                echo "<p class='p2'>Nombres de pistes : ".$details["nb_tracks"]."</p> \n";
                $length = $details["duration"] ; 
                echo "<p class='p2'>Durée : ".gmdate("H:i:s", $length)."</p> \n";
                echo "<p class='p2'>Nombres d'audiences : ".$details["fans"]."</p> \n";
                $date = $details["release_date"];
                $annee = substr($date, -10, -6);
                $mois = substr($date, -5, -3);
                $jour = substr($date, -2);
                echo "<p class='p2'>Date de sortie : ".$jour.'/'.$mois.'/'.$annee."</p> \n";
                $artistName = $details["artist"]["name"];
                $idArtist = $details["artist"]["id"];
                echo "<p class='p2'>Artiste : <a href='informations.php?artist=$artistName&id=$idArtist'>$artistName</a></p> \n";
                echo "</div> \n \t \t";
                echo "</div> \n \t";
                echo "</div> \n";

                $tracklistUrl = $details["tracklist"];
                $tracks = getTracksOfAlbum($tracklistUrl);
                if (!empty($tracks) && count($tracks) != 0) {
                    echo "<h3> Pistes : </h3> \n";
                    echo "<div class='grid-containernumb2' style='display:-webkit-inline-box;'> \n";
                    foreach($tracks['data'] as $row) {
                        $idTrack = $row['id'];
                        $trackName = $row['title']; 
                        $trackName2 = urlencode($trackName); 
                        $urlMp3 = $details['preview'];
                        echo "<figure> \n";
                        echo "<a href='informations.php?songs=$trackName2&id=$idTrack'> \n";
                        echo "<img src='$urlPicture' alt='image de la chanson' width='150' height='150' /> \n";
                        echo "</a> \n";
                        echo "<audio controls style='padding-top:90px;'> \n";
                        echo "<source src='$urlMp3' type='audio/mpeg'/> \n"; 
                        echo "</audio> \n";
                        echo "</figure> \n";
                        echo "<figcaption> \n";
                        echo "<h4 style='padding-top:90px;'>".$trackName."</h4> \n";
                        echo "</figcaption> \n";
                    }
                    echo "</div>"; 
                }
                
                $albums = getAlbumsOfArtist($idArtist);
                if (!empty($albums) && count($albums) != 0) {
                    echo "<h3> Albums similaires : </h3> \n";
                    echo "<div class='grid-containernumb4'> \n";
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

                  
                $data = readCSV('albumdata.csv');
                $albumName = urldecode($name);
                $artName = urldecode($artistName);

                if(($data[1][0] == NULL) && ($data[1][1] == NULL) && ($data[1][2] == NULL) && ($data[1][3] == NULL)) { // on place le 1er album dans le CSV
                    $data[] = array($albumName, $artName, 0, $idAlbum);
                    writeCSV('albumdata.csv', $data);     
                }
                $verif = FALSE;
                for($i=0; $i<sizeof($data); $i++) { // on parcour du debut tout le csv ligne par ligne
                    if(($data[$i][0] == $albumName) && ($data[$i][1] == $artName) && ($data[$i][3] == $idAlbum)) { // si lalbum exist deja  dans le CSV
                        $vue = $data[$i][2];
                        $vue++;
                        $data[$i] = array($albumName, $artName, $vue, $idAlbum); // incrémente juste le nombre de vue de lalbum
                        writeCSV('albumdata.csv', $data);
                        $existDeja = TRUE;
                    }
                }
                if($existDeja == FALSE) { // lalbum n'existe pas dans le CSV donc
                    $data[] = array($albumName, $artName, 1, $idAlbum);
                    writeCSV('albumdata.csv', $data);
                }
                

            }

            if (isset($_GET["artist"])){

                $details = getArtistsDetails($_GET["id"]);
                $idArtist = $details["id"];
                echo "<h2>Détails</h2> \n";
               
                echo "<div class='sec'> \n";
                $urlPicture = getArtistPicture($_GET["id"]);
                echo "<figure> \n";
                echo "<img src='$urlPicture' alt='image de lartiste' width='250' height='250' /> \n";
                echo "</figure> \n";

                echo "<div id='details-info'> \n \t";
                echo "<div id='details-info-title'> \n \t \t";
                $name = $details["name"];
                echo "<h3>$name</h3> \n";
                echo "<p class='p2'>Nombres d'albums : ".$details["nb_album"]."</p> \n";
                echo "<p class='p2'>Nombres d'audiences : ".$details["nb_fan"]."</p> \n";
                echo "</div> \n \t \t";
               
                echo "<div id='details-info-description'> \n \t \t";
                $descId = getIdArtist2($_GET["artist"]);
                if($descId != 0) {
                    $desc = getArtistDescription($descId);
                    if(strlen($desc) != 0) {
                        echo "<p class='p2'> Biographie : ".$desc."</p> \n";
                    } 
                }
                echo "</div> \n \t \t"; 
                echo "</div> \n \t";
                echo "</div> \n";

                $albums = getAlbumsOfArtist($_GET["id"]);
                if (!empty($albums) && count($albums) != 0) {
                    echo "<h3> Albums : </h3> \n";
                    echo "<div class='grid-containernumb4'> \n";
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

                $topSongs = getTopSongsOfArtist($_GET["id"]);
                if (!empty($topSongs) && count($topSongs) != 0) {
                    echo "<h3> Top titres : </h3> \n";
                    echo "<div class='grid-containernumb2'> \n";
                    foreach($topSongs['data'] as $row) {
                        $idSong = $row['id'];
                        $songName = $row['title']; 
                        $urlPictureSong = $row['album']['cover_medium'];
                        $urlMp3 = $row['preview'];
                        $songName2 = urlencode($songName); 
                        echo "<figure> \n";
                        echo "<a href='informations.php?songs=$songName2&id=$idSong'> \n";
                        echo "<img src='$urlPictureSong' alt='image de la chanson' width='150' height='150' /> \n";
                        echo "</a> \n";
                        echo "</figure> \n";
                        echo "<audio controls style='padding-top:90px;'> \n";
                        echo "<source src='$urlMp3' type='audio/mpeg'/> \n"; 
                        echo "</audio> \n";
                        echo "<figcaption> \n";
                        echo "<h4 style='padding-top:90px;'>".$songName."</h4> \n";
                        echo "</figcaption> \n";
                    }
                    echo "</div>";
                }

                $artSimilar = getArtistsSimilar($_GET["id"]);
                if (!empty($artSimilar) && count($artSimilar) != 0) {
                    echo "<h3> Artistes similaires : </h3> \n ";
                    echo "<div class='grid-containernumb2'> \n";
                    foreach($artSimilar['data'] as $row) {
                        $idArtistSim = $row['id'];
                        $artistSimName = $row['name'];  
                        $urlPictureSim = $row['picture_medium']; 
                        $artistSimName2 = urlencode($artistSimName); 
                        echo "<article>";
                        echo "<figure> \n";
                        echo "<a href='informations.php?artist=$artistSimName2&id=$idArtistSim'> \n";
                        echo "<img src='$urlPictureSim' alt='image de lartiste' width='150' height='150' /> \n";
                        echo "</a> \n";
                        echo "</figure> \n";
                        echo "<figcaption> \n";
                        echo "<h4>".$artistSimName."</h4> \n";
                        echo "</figcaption> \n";
                        echo "</article>";
                    }  
                    echo "</div>";
                } 

                $data = readCSV('artistdata.csv');
                $artName = urldecode($name);

                if(($data[1][0] == NULL) && ($data[1][1] == NULL) && ($data[1][2] == NULL)) { // on place le 1er artiste dans le CSV
                    $data[] = array($artName, 0, $idArtist);
                    writeCSV('artistdata.csv', $data);     
                }
                $verif = FALSE;
                for($i=0; $i<sizeof($data); $i++) { // on parcour du debut tout le csv ligne par ligne
                    if(($data[$i][0] == $artName) && ($data[$i][2] == $idArtist)) { // si lartist exist deja  dans le CSV
                        $vue = $data[$i][1];
                        $vue++;
                        $data[$i] = array($artName, $vue, $idArtist); // incrémente juste le nombre de vue de lartiste
                        writeCSV('artistdata.csv', $data);
                        $existDeja = TRUE;
                    }
                }
                if($existDeja == FALSE) { // lartiste n'existe pas dans le CSV donc
                    $data[] = array($artName, 1, $idArtist);
                    writeCSV('artistdata.csv', $data);
                }
            }
        ?>
        </section>
    </main>

<?php
   require "./include/footer.inc.php";
?>
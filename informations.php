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
            
            if ((isset($_GET["songs"]))&&(isset($_GET["artiste"]))){
                $details = getTracksDetails($_GET["songs"], $_GET["artiste"]);

                $data = readCSV('data.csv');
                $songName = urldecode($_GET["songs"]);
                $artistName = urldecode($_GET["artiste"]);
                if(($data[1][0] == NULL) && ($data[1][1] == NULL) && ($data[1][2] == NULL)) { // on place la 1ere musique dans le CSV
                    $data[] = array($songName, $artistName, 0);
                    writeCSV('data.csv', $data);     
                }
                $verif = FALSE;
                for($i=0; $i<sizeof($data); $i++) { // on parcour du debut tout le csv ligne par ligne
                    if(($data[$i][0] == $songName) && ($data[$i][1] == $artistName)) { // si la musique exist deja  dans le CSV
                        $vue = $data[$i][2];
                        $vue++;
                        $data[$i] = array($songName, $artistName, $vue); // incrémente juste le nombre de vue de la musique
                        writeCSV('data.csv', $data);
                        $existDeja = TRUE;
                    }
                }
                if($existDeja == FALSE) { // la musique n'existe pas dans le CSV donc
                    $data[] = array($songName, $artistName, 1);
                    writeCSV('data.csv', $data);
                }
                

                echo "<h2>Détails</h2> \n";
                echo "<ol> \n";
                $length = $details["duration"] / 1000; 
                echo "<li>Durée : ".gmdate("i:s", $length)."</li> \n";
                echo "<li>Nombres d'écoutes : ".$details["playcount"]."</li> \n";
                echo "<li>Artiste : ".$details["artist"]["name"]."</li> \n";
                echo "<li>Album : ".$details["album"]["title"]." de ".$details["album"]["artist"]."</li> \n";
                echo "<li>Description : ".$details["wiki"]["summary"]."</li> \n";
                $url = $details["album"]["image"]["3"]["#text"];
                if(empty($url)) {
                    echo "<figure> \n";
                    echo "<img class='monimage' src='./images/noimage.jpg' alt='image par default de la musique' /> \n";
                    echo "</figure> \n";
                } else {
                    echo "<figure> \n";
                    echo "<img class='monimage' src='$url' alt='image de l'album' width='250' height='250' /> \n";
                    echo "<figcaption class='center'>".$details["album"]["title"]."</figcaption> \n";
                    echo "</figure> \n";
                }
                
                if(!empty($details["toptags"])) {
                    for( $n = 0 ; $n < count($details["toptags"]["tag"]); $n++) {
                        $tags.= $details["toptags"]["tag"][$n]["name"];
                        $tags.= " ";
                        }
                    echo "<li> Tags : ".$tags."</li> \n";
                }
                echo "</ol> \n";    
            }

            if ((isset($_GET["album"]))&&(isset($_GET["artiste"]))){
                $details = getAlbumsDetails($_GET["album"], $_GET["artiste"]);
                echo "<h2>Détails</h2> \n";
                echo "<ol> \n";
                echo "<li>Nombres d'écoutes : ".$details["playcount"]."</li> \n";
                echo "<li>Artiste : ".$details["artist"]."</li> \n";
                echo "<li>Album : ".$details["name"]." de ".$details["artist"]."</li> \n";
                echo "<li>Description : ".$details["wiki"]["summary"]."</li> \n";
                $url = $details["image"]["3"]["#text"];
                if(empty($url)) {
                    echo "<figure> \n";
                    echo "<img class='monimage' src='./images/noimgalbum.jpg' alt='image par default de lalbum' /> \n";
                    echo "</figure> \n";
                } else {
                    echo "<figure> \n";
                    echo "<img class='monimage' src='$url' alt='image de l'album' width='250' height='250' /> \n";
                    echo "<figcaption class='center'>".$details["name"]."</figcaption> \n";
                    echo "</figure> \n";
                }
               
                if (!empty($details["tracks"])) {
                    for( $n = 0 ; $n < count($details["tracks"]["track"]); $n++) {
                    $num = $n + 1;
                    echo "<li> musique n°$num : ".$details["tracks"]["track"][$n]["name"]."</li> \n";
                    }
                }

                if(!empty($details["tags"])) {
                    for( $n = 0 ; $n < count($details["tags"]["tag"]); $n++) {
                        $tags.= $details["tags"]["tag"][$n]["name"];
                        $tags.= " ";
                        }
                    echo "<li> Tags : ".$tags."</li> \n";
                }
               
                echo "</ol> \n";   
            }

            if (isset($_GET["artist"])){
                $details = getArtistsDetails($_GET["artist"]);
                echo "<h2>Détails</h2> \n";
                echo "<ol> \n";
                echo "<li>Artiste : ".$details["name"]."</li> \n";
                echo "<li>Nombres d'audiences : ".$details["stats"]["listeners"]."</li> \n";
                echo "<li>Nombres d'écoutes : ".$details["stats"]["playcount"]."</li> \n";
                echo "<li>Description : ".$details["bio"]["summary"]."</li> \n";

                $url = $details["image"]["3"]["#text"];
                if(empty($url)) {
                    echo "<figure> \n";
                    echo "<img class='monimage' src='./images/noartist.png' alt='image par default de lalbum' /> \n";
                    echo "</figure> \n";
                } else {
                    echo "<figure> \n";
                    echo "<img class='monimage' src='$url' alt='image de l'album' width='250' height='250' /> \n";
                    echo "</figure> \n";
                }
               
                if (!empty($details["similar"])) {
                    for( $n = 0 ; $n < count($details["similar"]["artist"]); $n++) {
                        $sim.= $details["similar"]["artist"][$n]["name"];
                        $sim.= " ";
                    }
                    echo "<li> Les artistes similaires : ".$sim."</li> \n";
                }

                if(!empty($details["tags"])) {
                    for( $n = 0 ; $n < count($details["tags"]["tag"]); $n++) {
                        $tags.= $details["tags"]["tag"][$n]["name"];
                        $tags.= " ";
                        }
                    echo "<li> Tags : ".$tags."</li> \n";
                }
               
                echo "</ol> \n";   
            }


        ?>
        </section>
    </main>

<?php
   require "./include/footer.inc.php";
?>
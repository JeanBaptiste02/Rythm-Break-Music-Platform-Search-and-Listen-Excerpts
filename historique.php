<?php
    $titre = "Rythm Break";
    $h1 = "Rythm Break";
    $link = "./css/styles-standards.css";
    $descrip = "Projet de Développement Web";
    require "./include/header.inc.php";
?> 

    <main>
        <section class="boxtrysection">
            <h2>Liste des musiques consultés</h2>
            <div class="bowItems">
        <?php
            $list = readCSV('songdata.csv');
            for ($i=1; $i<sizeof($list); $i++) {
                echo '<article>';
                $songName = $list[$i][0];
                $songName = str_replace("&", "&amp;", $songName);
                $artistName = $list[$i][1];
                $artistName = str_replace("&", "&amp;", $artistName);
                echo "<p class='w1'> Nom : ".$songName."</p>";
                echo "<p class='w1'> Artiste : ".$artistName."</p>";
                echo "<p style='color:#7FFF00;'> Vue : ".$list[$i][2]."</p>";
                echo '<form action="informations.php" method="get">
                            <input type="hidden" name="songs" value=urlencode($songName) />
                            <input type="hidden" name="id" value='.urlencode($list[$i][3]).' />
                            <input type="submit" value="Details" />
                            </form>';
                echo "</article>";
            }
        ?>  
        </div>
        </section>
        <section class="boxtrysection">
            <h2>Liste des albums consultés</h2>
            <div class="bowItems">
        <?php
            $list = readCSV('albumdata.csv');
            for ($i=1; $i<sizeof($list); $i++) {
                $albumName = $list[$i][0];
                $albumName = str_replace("&", "&amp;", $albumName);
                $artistOfAlbum = $list[$i][1];
                $artistOfAlbum = str_replace("&", "&amp;", $artistOfAlbum);
                echo '<article>';
                echo "<p class='w1'> Nom : ".$artistName."</p>";
                echo "<p class='w1'> Artiste : ".$artistOfAlbum."</p>";
                echo "<p style='color:#7FFF00;'> Vue : ".$list[$i][2]."</p>";
                echo '<form action="informations.php" method="get">
                            <input type="hidden" name="album" value='.urlencode($albumName).' />
                            <input type="hidden" name="id" value='.urlencode($list[$i][3]).' />
                            <input type="submit" value="Details" />
                            </form>';
                echo "</article>";
            }
        ?>  
        </div>
        </section>
        <section class="boxtrysection">
            <h2>Liste des artistes consultés</h2>
            <div class="bowItems">
        <?php
            $list = readCSV('artistdata.csv');
            for ($i=1; $i<sizeof($list); $i++) {
                $artistNom = $list[$i][0];
                $albumNom = str_replace("&", "&amp;", $albumNom);
                echo '<article>';
                echo "<p class='w1'> Nom : ".$artistNom."</p>";
                echo "<p style='color:#7FFF00;'> Vue : ".$list[$i][1]."</p>";
                echo '<form action="informations.php" method="get">
                            <input type="hidden" name="artist" value='.urlencode($artistNom).' />
                            <input type="hidden" name="id" value='.urlencode($list[$i][2]).' />
                            <input type="submit" value="Details" />
                            </form>';
                echo "</article>";
            }
        ?>  
        </div>
        </section>

    </main>

<?php
   require "./include/footer.inc.php";
?>
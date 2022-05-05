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
                echo "<p style='black'> Nom : ".$list[$i][0]."</p>";
                echo "<p style='black'> Artiste : ".$list[$i][1]."</p>";
                echo "<p style='color:#7FFF00';> Vue : ".$list[$i][2]."</p>";
                echo '<p>  <form action="informations.php" method="get">
                            <input type="hidden" name="songs" value='.urlencode($list[$i][0]).' />
                            <input type="hidden" name="id" value='.urlencode($list[$i][3]).' />
                            <input type="submit" value="Details" />
                            </form>
                </p>';
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
                echo '<article>';
                echo "<p style='black'> Nom : ".$list[$i][0]."</p>";
                echo "<p style='black'> Artiste : ".$list[$i][1]."</p>";
                echo "<p style='color:#7FFF00';> Vue : ".$list[$i][2]."</p>";
                echo '<p>  <form action="informations.php" method="get">
                            <input type="hidden" name="album" value='.urlencode($list[$i][0]).' />
                            <input type="hidden" name="id" value='.urlencode($list[$i][3]).' />
                            <input type="submit" value="Details" />
                            </form>
                </p>';
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
                echo '<article>';
                echo "<p style='black'> Nom : ".$list[$i][0]."</p>";
                echo "<p style='color:#7FFF00';> Vue : ".$list[$i][1]."</p>";
                echo '<p>  <form action="informations.php" method="get">
                            <input type="hidden" name="artist" value='.urlencode($list[$i][0]).' />
                            <input type="hidden" name="id" value='.urlencode($list[$i][2]).' />
                            <input type="submit" value="Details" />
                            </form>
                </p>';
                echo "</article>";
            }
        ?>  
        </div>
        </section>

    </main>

<?php
   require "./include/footer.inc.php";
?>
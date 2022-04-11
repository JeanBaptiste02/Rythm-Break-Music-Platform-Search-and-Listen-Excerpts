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
        <?php
            $list = readCSV('data.csv');
            for ($i=1; $i<sizeof($list); $i++) {
                echo '<article class="boxtry">';
                echo "<p> Artiste : ".$list[$i][1]."</p>";
                echo "<p style='color:#7FFF00';> Vue : ".$list[$i][2]."</p>";
                echo '<p>  <form action="informations.php" method="get">
                            <input type="hidden" name="songs" value='.urlencode($list[$i][0]).' />
                            <input type="hidden" name="artiste" value='.urlencode($list[$i][1]).' />
                            <input type="submit" value="Details" />
                            </form>
                </p>';
                echo "</article>";
            }
            
        ?>  
        </section>

    </main>

<?php
   require "./include/footer.inc.php";
?>
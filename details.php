<?php
    $titre = "Rythm Break";
    $h1 = "Rythm Break";
    $link = "./css/styles-standards.css";
    $descrip = "Projet de Développement Web";
    require "./include/header.inc.php";
?> 

    <main>
        <?php
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
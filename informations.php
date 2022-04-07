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
                echo "<h2>Détails</h2> \n";
                echo "<ol> \n";
                echo "<li>Durée : ".$details["duration"]."</li> \n";
                echo "<li>Nombres d'écoutes : ".$details["playcount"]."</li> \n";
                echo "<li>Artiste : ".$details["artist"]["name"]."</li> \n";
                echo "<li>Album : ".$details["album"]["title"]." de ".$details["album"]["artist"]."</li> \n";
                echo "<li>Description : ".$details["wiki"]["summary"]."</li> \n";
                $url = $details["album"]["image"]["3"]["#text"];
                echo "<figure> \n";
                echo "<img class='monimage' src='$url' alt='image de l'album' width='250' height='250' /> \n";
                echo "<figcaption class='center'>".$details["album"]["title"]."</figcaption> \n";
                echo "</figure> \n";
                $tags = $details["toptags"]["tag"]["0"] ["name"];
                $tags.= " ,".$details["toptags"]["tag"]["1"]["name"];
                $tags.= " ,".$details["toptags"]["tag"]["2"]["name"];
                $tags.= " ,".$details["toptags"]["tag"]["3"]["name"];
                $tags.= " ,".$details["toptags"]["tag"]["4"]["name"];
                echo "<li>Tags : ".$tags."</li> \n";
                echo "</ol> \n";    
            }
        ?>
        </section>
    </main>

<?php
   require "./include/footer.inc.php";
?>
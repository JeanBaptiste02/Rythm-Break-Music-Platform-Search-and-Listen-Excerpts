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

            echo "<figure> \n";
            echo "<img src='./graphmusic.php' alt='Graphique représentant le nombre de visites par musique' /> \n";
            echo "</figure> \n";

           
        ?>  
        
        </section>
        <section class="boxtrysection">
            <h2>Liste des albums consultés</h2>
        <?php

            echo "<figure> \n";
            echo "<img src='./graphalbum.php' alt='Graphique représentant le nombre de visites par album' /> \n";
            echo "</figure> \n";

           
        ?>  
        </section>
        <section class="boxtrysection">
            <h2>Liste des artistes consultés</h2>
        <?php

            echo "<figure> \n";
            echo "<img src='./graphartist.php' alt='Graphique représentant le nombre de visites par artiste' /> \n";
            echo "</figure> \n";

          
        ?>  
        </section>

    </main>

<?php
   require "./include/footer.inc.php";
?>
<?php
    $titre = "Rythm Break";
    $h1 = "Rythm Break";
    $link = "./css/styles-standards.css";
    $descrip = "Projet de Développement Web";
    require "./include/header.inc.php";
?> 

    <main>
    <section>
        <h2>Plan du site</h2>
        <ul id="plansite">
            <li><a href="./index.php">Page d'accueil</a></li>
            <li><a href="./recherche.php">Page de recherche</a></li>
            <li><a href="./tendance.php">Tendances</a></li>
            <li><a href="./historique.php">Historique</a></li>
            <li><a href="./statistiques.php">Statistiques</a></li>
            <li><a href="./annexe.php">Annexe</a></li>
            <li><a href="./plandusite.php">Plan du site</a></li>
        </ul>
    </section>
        
    </main>

<?php
   require "./include/footer.inc.php";
?>
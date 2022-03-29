<?php
    $titre = "Rythm Break";
    $h1 = "Rythm Break";
    $link = "./css/styles-standards.css";
    $descrip = "Projet de Développement Web";
    require "./include/header.inc.php";
?> 

    <main>
        <section id="rechehceBienvenue">
            <h2> Bienvenue </h2>
            <h3>Rythm Break - Découvrez vos musiques préférées!</h3>
            <form action="recherche.php" method="get">
                <input type="text" name="nom" placeholder="Choisir un nom" />

                <select name="type">
                    <option value="singer"> Artiste </option>
                    <option value="album"> Album </option>
                    <option value="song"> Musique </option>
                    <option value="others"> Autres </option>
                </select>
                <input type="submit" class ="inputSubmitIndex" value="rechercher" />  	
            </form>
       

        </section>

     
        
    </main>

<?php
   require "./include/footer.inc.php";
?>
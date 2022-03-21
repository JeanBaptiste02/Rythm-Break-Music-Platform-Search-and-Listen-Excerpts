<?php
    $titre = "Rythm Break";
    $h1 = "Rythm Break";
    $link = "./css/styles-standards.css";
    $descrip = "Projet de Développement Web";
    require "./include/header.inc.php";
?> 

    <main>
        <section>
            <h2>Bienvenue</h2>
            <article>
                <h3>Musiques</h3>
                <fieldset>
                    <legend style="color:cyan">Rythm Break</legend>
                    <p style="color:white">Les musiques ne sont pas encore disponible mais elles le seront bientôt!</p>  
                </fieldset>
                
            </article>

            <article>
                <h3> Image du jour du service APOD </h3>
                <p> </p>
                <?php 
                    echo getImageNasa();
                ?>

            </article>

            <article>
                <h3> Votre localisation approximative </h3>
                <fieldset>
                    <legend id="legloc">Nous avons trouvé votre localisation approximativement</legend>
                        
                        <?php    
                            echo getLocalisation();                                  
                        ?>
                 </fieldset>
            </article>


        </section>
        
    </main>

<?php
   require "./include/footer.inc.php";
?>
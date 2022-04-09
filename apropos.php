<?php
    $titre = "Rythm Break";
    $h1 = "Rythm Break";
    $link = "./css/styles-standards.css";
    $descrip = "Projet de Développement Web";
    require "./include/header.inc.php";
?> 

    <main>
    <section>
        <h2>Qui sommes-nous ?</h2>
        <figure class="ourimgs">
            <img src="./images/we.png" alt="logo jb" width="150" height="150"/>
            <figcaption>D.JB</figcaption>
        </figure>
        <p class="global" style="color:white">
        Etudiant en formation d'informatique en deuxième de licence à <strong>CY Cergy Paris Université</strong>.
        Passioné dans le domaine de développement/programmation web et de software. 
        </p>

        <figure class="ourimgs" >
            <img src="./images/we.png" alt="logo sri" width="150" height="150"/>
            <figcaption>E.SRI</figcaption>
        </figure>
        <p class="global" style="color:white; margin-bottom:80px;">
            Etudiant en formation en deuxième de licence à <strong>CY Cergy Paris Université</strong>.
            Passioné dans le domaine hard ware et programmation.
        </p>
        </section>
        
    </main>

<?php
   require "./include/footer.inc.php";
?>
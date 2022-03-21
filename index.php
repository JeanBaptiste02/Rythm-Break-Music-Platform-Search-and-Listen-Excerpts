<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="shortcut icon" href="./images/logo.png">
        <title>Rythm Break</title>
        <meta name="author" content="Damodarane Jean-Baptiste" /> 
        <meta name="date" content="2022-03-20" />
        <meta name="keywords" content="Projet de Développement web" />
        <meta name="description" content="projet de développement web" /> 
        <meta charset="UTF-8" />
        <link rel="stylesheet" href = "./css/styles-standards.css" />
    </head>

    <body>

    <header>
        <!--
        <a href="index.php"><img src="./images/logo.png" height="40" width="40" alt="logo de mon site web"/></a>
        -->
        <h1>Rythm Break</h1>
        <form action="https://gaana.com/" method="get">
                    <input type="text" name="q" placeholder="Cherchez une musique" />    
                    <a href="index.php"><img id="searchlogo"type="submit"src="./images/loupe.png" height="20" width="20" alt="rechercher"/></a>
        </form>       
        
        <nav>
		<ul class="menu">
            <li><a href="#exo1"> Tendances </a></li>
            <li><a href="#exo2"> Album </a></li>
            <li><a href="#exo3"> Bollywood </a></li>
            
        </ul>
		</nav>

        
    </header>
    

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
                    $json = file_get_contents('img.json');
                    $json = json_decode($json);
                    foreach($json as $key => $value) {
                        if($key == "url") {
                            $url = $value;
                        }
                        if($key == "title") {
                            $title = $value;
                        }
                        if($key == "copyright") {
                            $copy = $value;
                        }
                        //echo "<li>".$key." : ".$value."</li> \n";
                    }
                    echo "<figure> \n";
                    echo "<img class='monimage' src='$url' alt='image du jour par apod nasa' width='500' height='500' /> \n";
                    echo "<figcaption class='center'>".$title." : Copyright © ".$copy."</figcaption>";
                    echo "</figure> \n";
    ?>

            </article>

            <article>
                <h3> Votre localisation approximative </h3>
                <fieldset>
                    <legend id="legloc">Nous avons trouvé votre localisation approximativement</legend>
                        
                        <?php    

                            function getLocalisation()
                            {
                                $addip = getenv('REMOTE_ADDR');
                                $loc = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$addip"));
                                $ville = $loc["geoplugin_city"];
                                $pays = $loc["geoplugin_countryName"];
                                $regionName = $loc['geoplugin_regionName'];
                                $regionCode = $loc['geoplugin_regionCode'];
                                $region = $loc['geoplugin_region'];


                                echo "<p style='color:white'>Vous vous trouvez aux alentours de : </p>";
                                echo "<p style='color:white'>$ville</p>";
                                echo "<p style='color:white'>$regionName</p>";
                                echo "<p style='color:white'>$regionCode</p>";
                                echo "<p style='color:white'>$region</p>";
                                echo "<p style='color:white'>$pays</p>";                     
                            }


                            echo getLocalisation();          
                        
                        ?>
                 </fieldset>
            </article>


        </section>
        
    </main>

   

    <footer>
        <p style="color:white">
            Copyright © 2022 by DAMODARANE Jean-Baptiste & ELUMALAI Sriguru
        </p>
        <p style="color:white">
            CY Cergy Paris Université
        </p>
        <p style="color:white">
            Licence Informatique 2 Groupe C
        </p>
        <p style="color:white">
            Navigateur de l'internaute : 
            Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36 Edg/99.0.1150.46        
        </p>


</footer>
</body>
</html>
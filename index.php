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
        <a href="index.php"><img src="./images/logo.png" height="40" width="40" alt="logo de mon site web"/></a>
        <h1>Rythm Break</h1>
        <form action="https://gaana.com/" method="get">
                    <input type="text" name="q" placeholder="Cherchez une musique" />    
                    <a href="index.php"><img id="searchlogo"type="submit"src="./images/loupe.png" height="20" width="20" alt="rechercher"/></a>
        </form>       
        
        <nav>
		<ul>
           
		</ul>
		</nav>

        
    </header>
    

    <main>
        <section>
            <h2>Bienvenue</h2>
            <article>
                <h3>Musiques</h3>
                <p style="color:white">Les musiques ne sont pas encore disponible mais elles le seront bientôt!</p>  
                
            </article>

            <article>
                <h3> Image du jour du service APOD </h3>
                <p> </p>  
                <figure>                
                    <img class='monimage' src=https://apod.nasa.gov/apod/image/2203/EquinoxSunset_Christen_1852.jpg alt="image du jour par apod nasa" width='500' height='500'/>
                    <figcaption class="center">A Picturesque Equinox Sunset : Copyright © Roland Christen</figcaption>
                </figure>
            </article>

            <article>
                <h3> Votre localisation approximative </h3>
                <fieldset>
                    <legend id="legloc">Nous avons trouvé localisation approximativement</legend>
                        
                        <?php    

                            function getLocalisation()
                            {
                                $addip = getenv('REMOTE_ADDR');
                                $loc = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$addip"));
                                $vareg = file_get_contents("http://ipinfo.io/$addip/geo");
                                $vareg = json_decode($vareg, true);
                                $ville = $loc["geoplugin_city"];
                                $pays = $loc["geoplugin_countryName"];
                                $region = $vareg['region'];

                                echo "<p style='color:white'>$ville</p>";
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
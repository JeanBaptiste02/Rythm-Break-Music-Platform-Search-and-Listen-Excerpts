<?php
    require "./include/functions.inc.php"

?>

<?php
    session_start();
   
    if(isset($_GET['style'])) {
        $style = htmlspecialchars($_GET['style']);
        setcookie('choix', "$style", time()+3600); //le cookie espire dans 1heure = 3600secondes
        $_COOKIE['choix'] = $style;
    }

   
    $expire = 60 * 60 * 24 * 60 + time(); // date dexpiration du cookie
    setcookie('lastDay', date("d/m/Y"), $expire);
    setcookie('lastHour', date("H:i"), $expire);

    $songName = $_GET["songs"];
    $idSong = $_GET["id"];
    if((isset($songName) && !empty($songName)) && (isset($idSong) && !empty($idSong))) {
        setcookie('songName', $songName, $expire);
        setcookie('idSong', $idSong, $expire);
    }

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="shortcut icon" href="./images/logo.png">
        <title> <?php echo $titre;?> </title>
        <meta name="author" content="Damodarane Jean-Baptiste" /> 
        <meta name="date" content="2022-03-20" />
        <meta name="keywords" content="Projet de Développement web" />
        <meta name="description" content="<?php echo $descrip; ?>" /> 
        <meta charset="UTF-8" />

        <?php
            /*
                manipulations des liens en fonction des styles
            */
            $style = $_COOKIE['choix'];
            if(isset($_COOKIE['choix']) && !empty($_COOKIE['choix'])) {
                echo "<link rel=\"stylesheet\" href=\"./css/$style.css\"/>"; //le style qu'on choisit
            }
            else {
                echo "<link rel=\"stylesheet\" href=\"./css/styles-standards.css\"/>"; //par defaut
            }
        ?>

    </head>

    <body>

    <header>
        
        <a id="mainLogo" href="index.php"><img src="./images/logo.png" height="40" width="40" alt="logo de mon site web"/></a>
        
        <h1>Rythm Break</h1>
        
        <nav>
            <ul class="nav_links">
                <li><a href="recherche.php"> Rechercher </a></li>
                <li><a href="tendance.php"> Tendances </a></li>
                <li><a href="historique.php"> Historique </a></li>
                <li><a href="statistiques.php"> Statistiques </a></li>
                <li><a href="annexe.php"> Annexe </a></li>
                <li>
                <?php
                    $pageactive = basename($_SERVER["PHP_SELF"]); //recupere la page active (ou la page en cours d'utilisation)
                    if(isset($_COOKIE['choix']) && $_COOKIE['choix'] == "style-alternatif") {
                        echo "<li><a href=\"".$pageactive."?style=styles-standards\">";
                        echo '<img src="./images/nightmode.png" alt="theme" class="litnit"/></a></li>';
                    }
                    else {
                        echo "<li><a href=\"".$pageactive."?style=style-alternatif\">";
                        echo '<img src="./images/lightmode.png" alt="theme" class="litnit"/></a></li>';
                    }
                ?>
                </li>
            </ul>  
		</nav>
    </header>
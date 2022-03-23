<?php
    require "./include/functions.inc.php"
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
        <link rel="stylesheet" href = "<?php echo $link ?>" />
    </head>

    <body>

    <header>
        
        <a id="mainLogo" href="index.php"><img src="./images/logo.png" height="40" width="40" alt="logo de mon site web"/></a>
        
        <h1>Rythm Break</h1>
        <!--
        <form action="https://gaana.com/" method="get">
                    <input type="text" name="q" placeholder="Cherchez une musique" />    
                    <a href="index.php"><img id="searchlogo" src="./images/loupe.png" height="20" width="20" alt="rechercher"/></a>
        </form>     
        -->  
        
        <nav>
		<ul class="menu">
            <li><a href="recherche.php"> Rechercher </a></li>
            <li><a href="tendance.php"> Tendances </a></li>
            <li><a href="album.php"> Album </a></li>
            <li><a href="mainsongs.php"> Bollywood </a></li>
            <li><a href="annexe.php"> Annexe </a></li>
        </ul>
		</nav>

        
    </header>
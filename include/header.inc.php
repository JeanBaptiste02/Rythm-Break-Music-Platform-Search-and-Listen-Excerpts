<?php
    require "./include/functions.inc.php"

?>

<?php
    session_start();
    /*
        default theme
    */
    if(empty($_COOKIE["theme"])){ 
        setcookie("theme", "styles-standards", time()+3600);
        $fichiercss = "styles-standards";
    }
    if(isset($_POST["theme"])){
        setcookie("theme", $_POST["theme"], time()+3600);
        $mainpage = basename($_SERVER["REQUEST_URI"]);
        if(strpos($mainpage, "php") == false){
            $mainpage = "index.php";
        }
        header("Location: $mainpage");
        if($_POST["theme"] == "style-alternatif"){
            $fichiercss = "styles-standards";
        }
        else{
            $fichiercss = "style-alternatif";
        }
    }
    if(isset($_COOKIE["theme"])){
        if($_COOKIE["theme"] == "style-alternatif"){
            $fichiercss = "styles-standards";
        }
        else{
            $fichiercss = "style-alternatif";
        }
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
            if(isset($_POST["theme"])){
                echo "<link rel=\"stylesheet\" href=\"./css/" . $_POST["theme"] . ".css\"/>";
            }
            elseif(isset($_COOKIE["theme"])) {
                echo "<link rel=\"stylesheet\" href=\"./css/" . $_COOKIE["theme"] . ".css\"/>";
            }
            else {
                echo "<link rel=\"stylesheet\" href=\"styles-standards.css\"/>";
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
                <li><a href="mainsongs.php"> Bollywood </a></li>
                <li><a href="statistiques.php"> Statistiques </a></li>
                <li><a href="annexe.php"> Annexe </a></li>
                <li>
                <?php
                    echo "<form class=\"theme\" method=\"post\">\n";
                    echo "\t\t\t\t<input type=\"hidden\" name=\"theme\" value=\"$fichiercss\" />\n";
                    echo "\t\t\t\t<input type=\"submit\" value=\" \" style=\"background-image: url(./images/lightmode.png);\" />\n";
                    echo "</form>\n";
                ?>
                </li>
                <li><a href="?lang=eng" id="themehref"><img src="./images/language.png" alt="theme" class="litnit"/></a></li>
            </ul>  
		</nav>
    </header>
<?php

    define('NASA_API_KEY','8voCfhA1Kwo3y4ubOB0p39kFwq8Dlggiq0ofJ5qT');
    define("LASTFM_API_KEY","ee832f2cbf4899e1409329429c40a34f");

    /**
     * permet d'avoir les image du jour de Apod en fonction du jour
     * @author Damodarane&Elumalai
     * @return les valeurs souhaitees
     */
    function getImageNasa() : string {
        $apikey = NASA_API_KEY;
        $s = "";
        $json = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=$apikey");
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
        }
        $s.="<figure> \n";
        $s.="<img class='monimage' src='$url' alt='image du jour par apod nasa' width='500' height='500' /> \n";
        $s.="<figcaption class='center'>".$title." : Copyright © ".$copy."</figcaption> \n";
        $s.="</figure> \n";
        return $s;
    }

    
    /**
     * permet d'avoir la localisation de l'utilisateur avec l'adresse ip
     * @author Damodarane&Elumalai
     */
    function getLocalisation()
    {
        $finaloc = "";
        $addip = getenv('REMOTE_ADDR');//geolocalisation
        $loc = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$addip")); //une liste d'informations
        $ville = $loc["geoplugin_city"];
        $pays = $loc["geoplugin_countryName"];
        $regionName = $loc['geoplugin_regionName'];
        $regionCode = $loc['geoplugin_regionCode'];
        $region = $loc['geoplugin_region'];

        $finaloc.=   "<p style='color:white'>Vous vous trouvez aux alentours de : $ville $regionName $regionCode $region $pays</p>";      
        return $finaloc;         
    }

    /**
     * permet d'avoir les artistes
     * @author Damodarane&Elumalai
     * @param eltrecherche element recherche 
     */

    function getArtists(string $eltrecherche): array{
        $jsonStr = file_get_contents("https://api.deezer.com/search/artist?q=$eltrecherche&limit=24");
        $jsonArr = json_decode($jsonStr, true);
            
        $nameArray = array();
        foreach($jsonArr['data'] as $row) {
            $nameArray[] = $row['name'];
        }
        return $nameArray;
    }

    /**
     * permet d'avoir les albums
     * @author Damodarane&Elumalai
     * @param eltrecherche element recherche 
     */

    function getAlbums(string $eltrecherche): array{
        $apikey = LASTFM_API_KEY;
        //on recupere le contenu
        $json2 = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=album.search&album=".$eltrecherche."&api_key=".$apikey."&format=json");
        //on accede a des valeurs decode
        $json2 = json_decode($json2);
        //on cherche une valeure precise
        $json3 = $json2->results;
        $json4 = $json3->albummatches;
        $json5 = $json4->album;
        //on retourne la valeure
        return $json5;
    }

     /**
     * permet d'avour les musiques
     * @author Damodarane&Elumalai
     * @param eltrecherche element recherche 
     */

    function getTracks(string $eltrecherche): array{
        $apikey = LASTFM_API_KEY;
        //on recupere le contenu
        $json2 = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=track.search&track=".$eltrecherche."&api_key=".$apikey."&format=json");
        //on accede a des valeurs decode
        $json2 = json_decode($json2);
        //on cherche une valeure precise
        $json3 = $json2->results;
        $json4 = $json3->trackmatches;
        $json5 = $json4->track;
        //on retourne la valeure
        return $json5;
    }

    /**
     * permet d'avoir des détailes sur la musique choisie
     * @author Damodarane&Elumalai
     * @param song designe la chanson choisie
     * @param artiste designe l'artiste correspondant a la musique
     * @return json2 retourne la valeure souhaitee
     */
    function getTracksDetails(string $song, string $artiste): array{
        $apikey = LASTFM_API_KEY;
        $json2 = file_get_contents("https://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=".$apikey."&artist=".$artiste."&track=".$song."&format=json");
        $json2 = json_decode($json2, true);
        return $json2["track"];
    }

     /**
     * permet d'avoir des détails sur l'album choisie
     * @author Damodarane&Elumalai
     * @param album designe la chanson choisie
     * @param artiste designe l'artiste correspondant de l'album
     * @return json2 retourne la valeure souhaitee
     */
    function getAlbumsDetails(string $album, string $artiste): array{
        $apikey = LASTFM_API_KEY;
        $json2 = file_get_contents("https://ws.audioscrobbler.com/2.0/?method=album.getInfo&api_key=".$apikey."&artist=".$artiste."&album=".$album."&format=json");
        $json2 = json_decode($json2, true);
        return $json2["album"];
    }

     /**
     * permet d'avoir des détails sur l'artiste choisie
     * @author Damodarane&Elumalai
     * @param name designe le nom de l'artiste
     * @return json2 retourne la valeure souhaitee
     */
    function getArtistsDetails(int $id): array{
        $json2 = file_get_contents("https://api.deezer.com/artist/$id");
        $json2 = json_decode($json2, true);
        return $json2;
    }

     
    function getArtistsSimilar(int $id): array{
        $json2 = file_get_contents("https://api.deezer.com/artist/$id/related");
        $json2 = json_decode($json2, true);
        
        $nameArray = array();
        foreach($json2['data'] as $row) {
            $nameArray[] = $row['name'];
        }
        return $nameArray;
    }

    function getIdArtist2(string $name): int {
        
        $jsonStr = file_get_contents("https://www.theaudiodb.com/api/v1/json/2/search.php?s=$name");
        $jsonArr = json_decode($jsonStr, true);
        
        $nameArtist = urldecode($name);

        $id = 0;

        $cpt=1;
        if($jsonArr['artists'] != null) {
            foreach($jsonArr['artists'] as $row) {
                if($row['strArtist'] == $nameArtist && $cpt > 0) {
                    $id = $row['idArtist'];
                    $cpt--;
                }  
            }
        }
      
        return $id;
    }

    function getArtistDescription(int $id): string{
        $json = file_get_contents("https://theaudiodb.com/api/v1/json/2/artist.php?i=$id");
        $json = json_decode($json, true);
        
        $cpt = 1;
        foreach($json['artists'] as $row) {
             if($row['strBiographyFR'] != null && $cpt > 0) {
                $desc = $row['strBiographyFR'];
                $cpt--;
            } else if($row['strBiographyEN'] != null && $row['strBiographyFR'] == null && $cpt > 0) {
                $desc = $row['strBiographyEN'];
                $cpt--;
            } else if($row['strBiographyEN'] == null && $row['strBiographyFR'] == null && $cpt > 0) {
                $desc = "";
                $cpt--;
            }
        }

        return $desc;
    }

    function getIdArtist(string $name): int {
        $name2 = urlencode($name);
        $jsonStr = file_get_contents("https://api.deezer.com/search/artist?q=$name2");
        $jsonArr = json_decode($jsonStr, true);
        
        $nameArtist = urldecode($name);

        $cpt=1;
        foreach($jsonArr['data'] as $row) {
            if(($row['name'] == $nameArtist) && $cpt > 0) {
                $id = $row['id'];
                $cpt--;
            }  
        }
        return $id;
    }

    function getArtistPicture(int $id): string {
        $jsonStr = file_get_contents("https://api.deezer.com/artist/$id");
        $jsonArr = json_decode($jsonStr, true);

        $url = $jsonArr['picture_medium'];
        return $url;
    }
   
    
    /**
     * permet d'avoir le nombre de visites en fonction du rafraichissement des pages du site
     * @author Damodarane&Elumalai
     */
    function getNbVistors(){
        $fileName = 'vistors.txt'; 
       
        $filerray = file($fileName);
        $counter = $filerray[0] + 1;
        $openFile = fopen($fileName,'w+');
        fwrite($openFile, "$counter \n");
        fclose($openFile);
        if($counter == 1)
        {
        print 'Nombre de Visiteur : 1';
        }
        else
        {
        print 'Nombre de Visites : '.$counter .'';
        }
    }

    function readCSV($filename) {
        $rows = array();
        
        foreach (file($filename) as $line) {
            $rows[] = str_getcsv($line);
        }

        return $rows; 
    }

    function writeCSV($filename, $rows) {
        $file = fopen($filename, 'w');

        foreach($rows as $row) {
            fputcsv($file, $row);
        }

        fclose($file);
    }
    

?>
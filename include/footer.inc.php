<footer>
    <table>
		<thead>
			<tr>
				<th class="foot-titre">Copyright © 2022</th>
				<th class="foot-titre">CY CERGY-PARIS UNIVERSITE</th>
				<th class="foot-titre">Structure</th>	
                <th class="foot-titre">informations</th>									
			</tr>
		</thead>
		<tbody>			
			<tr>
				<td class="foot-lines">DAMODARANE Jean-Baptiste &amp; ELUMALAI Sriguru </td>
				<td><img src="./images/clg.png" height="40" width="150" alt="logo de mon site web"/></td>
				<td class="foot-lines">Plan du site</td>
                <td class="foot-lines">Contacter</td>
			</tr>
			<tr>
			    <td class="foot-lines"></td>
				<td class="foot-lines"></td>
                <td class="foot-lines" style="padding-top:10px;"><a href="recherche.php">Recherche</a></td>
				<td class="foot-lines"><a href="apropos.php">A propos</a></td>
			</tr>
			<tr>
				<td class="foot-lines">CY Cergy Paris Université</td>
				<td class="foot-lines"></td>
				<td class="foot-lines" style="padding-top:10px;"><a href="statistiques.php">Statistiques</a></td>
                <td class="foot-lines"></td>
			</tr>
			<tr>
				<td class="foot-lines"></td>
				<td class="foot-lines"></td>
				<td class="foot-lines" style="padding-top:10px;"><a href="historique.php">Historique</a></td>
                <td class="foot-lines">
					<?php
						if(isset($_COOKIE['lastDay']) && isset($_COOKIE['lastHour'])){
            				$visitDay = $_COOKIE['lastDay'];
            				$visitHour = $_COOKIE['lastHour'];
            				echo "<p>Dernière visite le $visitDay à $visitHour</p>";
        				}
					?>
				</td>
			</tr>
			<tr>
				<td class="foot-lines"></td>
				<td class="foot-lines"></td>
				<td class="foot-lines" style="padding-top:10px;"><a href="tendance.php">Tendances</a></td>
                <td class="foot-lines">
					<?php
						echo getNbVistors();
					?>
				</td>
			</tr>
		</tbody>
	</table>  

</footer>
</body>
</html>
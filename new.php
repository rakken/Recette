<?php 
$reponse = $bdd->query('SELECT * FROM T_Recettes ORDER by Recette_Date DESC LIMIT 0, 5');
?>
<table classe="TableNew">
<h3>Les toute dernières recettes:</h3>
						
						<?php
							// Affichage des données trouvées.
							
while ($donnees = $reponse->fetch())
							{
							?>
							<tr>
							<td>

<h4><a href=recette.php?recette=<?php echo $donnees['ID_Recette'];?>><?php echo $donnees['Recette_Nom'];?></h4> 	
														
							</td>
						</tr>
<tr>
								</td>
	<td ><?php echo $donnees['Recette_Description'];?></td>
							</tr>
			<?php	
			
							}

	
						?>
					</table>
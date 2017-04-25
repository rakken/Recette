<html>
	<!-- l'entête -->
	<?php 
		include("entete.php"); 
	?>
	<body>
		<div class="container site">
			<div class="row banniere">
<div class="col-lg-12">
				
<?php 
						include("banniere.php"); 
					?>
</div>
</div>
<div class="row">
				<div class="col-lg-12">
					<?php 
						include("menu.php"); 
					?>
				</div>
			</div>
			<div class="row contenu">
<?php
						include("connect.php"); 
					?>
				<div class="col-lg-6 bienvenu">
<p>Voici tout les entrées! bonne appétit!</p>
				</div>
<div class="col-lg-6 new">
<?php 
$reponse = $bdd->query('SELECT * FROM T_Recettes as re, T_CategorieRecette as care, T_Categories as ca WHERE re.ID_Recette=care.Recette_ID and care.Categorie_ID=ca.ID_Categorie and ca.Categorie_Nom="Entrée"');
?>
<table class="table">
						<thead class="thead">
							<tr>
								<th>Recette</th> 	
								<th>Description</th>							
							</tr>
						</thead>
						<?php
							// Affichage des données trouvées.
							while ($donnees = $reponse->fetch())
							{
							?>
							<tr>
								<td>
								<a href=recette.php?recette=<?php echo $donnees['Recette_ID'];?>><?php echo $donnees['Recette_Nom'];?></td>
	<td><?php echo $donnees['Recette_Description'];?></td>
							</tr>
			<?php						
							}	
						?>
					</table>

					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 footer">
					<!-- le pied de page -->
					<?php include("pied_de_page.php"); ?>
				</div>
			</div>
		</div>	
		<?php										
			$reponse->closeCursor(); // Termine le traitement de la requête
		?>
	</body>
</html>
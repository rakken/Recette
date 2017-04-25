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
			
<?php
						include("connect.php"); 
$recette = $_GET["recette"] ;
$reponse = $bdd->query('SELECT * FROM T_Recettes as re, T_IngredientsRecettes as inre, T_Ingredients as ing where re.ID_Recette=inre.Recette_ID and inre.Ingredient_ID=ing.ID_Ingredient AND re.ID_Recette="'.$recette.'"');
					?>
<div class="row contenu">
<div class="col-lg-6">
<p>
<?php
							while ($donnees = $reponse->fetch())
							{
$descri = $donnees ['Recette_Description'];

$photo = $donnees['Recette_Photo'];

}
echo $descri;
?>
</p>
</div>
<div class="col-lg-6">
<p>
<img class="img-responsive" src="<?php echo $photo ?>"/>
</p>

</div>
</div>
<div class="row contenu">
				<div class="col-lg-6 ingredient">



<table class="tableau">

						<thead class="thead">
							<tr>
								<th>Liste des ingrédients:</th> 	
							
							</tr>

						</thead>
						<?php
$reponse = $bdd->query('SELECT * FROM T_Recettes as re, T_IngredientsRecettes as inre, T_Ingredients as ing where re.ID_Recette=inre.Recette_ID and inre.Ingredient_ID=ing.ID_Ingredient AND re.ID_Recette="'.$recette.'"');
							// Affichage des données trouvées.
while ($donnees = $reponse ->fetch())
							{
							?>
							<tr>

<td>
<ul>
	<li><?php echo $donnees ['Ingredient_Quantite'];?>&nbsp;<?php echo $donnees ['Ingredient_Nom'];?>
</li>
</ul>
</td>
</tr>
			<?php						
							}	
						?>
					</table>
	</div>
<div class="col-lg-6 recette">
<?php 
$reponse = $bdd->query('SELECT * FROM T_Etapes, T_Recettes WHERE T_Recettes.ID_Recette=T_Etapes.Recette_ID and T_Etapes.Recette_ID="'.$recette.'"');
?>
<table class="tableau">
						<thead class="thead">
							<tr>
								<th>Voici les étapes de préparation:</th> 	
							
							</tr>
						<tr>
						</tr>
						</thead>
						<?php
							// Affichage des données trouvées.
							while ($donnees = $reponse->fetch())
							{
							?>
							<tr><td>
<ul>
	<li><?php echo $donnees['Etape_Description'];?></li>
							</td></tr>
</ul>
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
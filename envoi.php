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
				<div class="col-mg-12 envoi">
<?php 
$id = '';
			
$req = $bdd->prepare("INSERT INTO `T_Recettes`(ID_Recette, Recette_Nom, Recette_Description, Recette_Parts, Recette_Duree, Recette_Source, Recette_Photo) VALUES(:ID_Recette, :Recette_Nom, :Recette_Description, :Recette_Parts, :Recette_Duree, :Recette_Source, :Recette_Photo)");
							$req->execute(array(
							'ID_Recette'=> $id,
							'Recette_Nom' => ucfirst($_POST['Recette_Nom']),
							'Recette_Description' => ucfirst($_POST['Recette_Description']),
							'Recette_Parts' => $_POST['Recette_Parts'],
							'Recette_Duree' => $_POST['Recette_Duree'],
							'Recette_Source' => $_POST['Recette_Source'],
							'Recette_Photo' => $_POST['Recette_Photo']
							));
                                                        $id_nouveauRecette = $bdd->lastInsertId();
							


$id = '';
for ($i=0;$i<count($_POST['ingredient_Nom']);$i++) {

						$req = $bdd->prepare("SELECT Ingredient_Nom FROM `T_Ingredients` where Ingredient_Nom= :Ingredient_Nom");
						$req->execute(array(
						'Ingredient_Nom' => $_POST['ingredient_Nom'][$i]));
						
						$resultat = $req->fetch();
			
						if (!$resultat)
						{

$req = $bdd->prepare("INSERT INTO `T_Ingredients`(ID_Ingredient, Ingredient_Nom) VALUES(:ID_Ingredient, :Ingredient_Nom)");
							$req->execute(array(
							'ID_Ingredient'=> $id,
							'Ingredient_Nom' => ucfirst($_POST['ingredient_Nom'][$i])
							));
$id_nouveauIngredient = $bdd->lastInsertId();

$req = $bdd->prepare("INSERT INTO `T_IngredientsRecettes`(Recette_ID, Ingredient_ID, Ingredient_Quantite) VALUES(:Recette_ID, :Ingredient_ID, :Ingredient_Quantite)");
							$req->execute(array(
							'Recette_ID'=> $id_nouveauRecette,
							'Ingredient_ID' => $id_nouveauIngredient,
							'Ingredient_Quantite' => ucfirst($_POST['ingredient_Quantite'][$i])
							));

}else{
						$req = $bdd->prepare("SELECT ID_Ingredient FROM `T_Ingredients` where Ingredient_Nom= :Ingredient_Nom");
						$req->execute(array(
						'Ingredient_Nom' => $_POST['ingredient_Nom'][$i]));

while ($donnees = $req ->fetch())
{
$resultat= $donnees['ID_Ingredient'];
}

$req = $bdd->prepare("INSERT INTO `T_IngredientsRecettes`(Recette_ID, Ingredient_ID, Ingredient_Quantite) VALUES(:Recette_ID, :Ingredient_ID, :Ingredient_Quantite)");
							$req->execute(array(
							'Recette_ID'=> $id_nouveauRecette,
							'Ingredient_ID' => $resultat,
							'Ingredient_Quantite' => $_POST['ingredient_Quantite'][$i]
							));
}
}
	$req = $bdd->prepare("SELECT ID_Categorie FROM `T_Categories` where Categorie_Nom= :Categorie_Nom");
						$req->execute(array(
						'Categorie_Nom' => $_POST['Categorie_Nom']));
while ($donnees = $req ->fetch())
{
$resultat=$donnees['ID_Categorie'];
}
$req = $bdd->prepare("INSERT INTO `T_CategorieRecette`(Recette_ID, Categorie_ID) VALUES(:Recette_ID, :Categorie_ID)");
							$req->execute(array(
							'Recette_ID'=> $id_nouveauRecette,
							'Categorie_ID' => $resultat
							));

$id = '';
for ($i=0;$i<count($_POST['Etape_Description']);$i++) {
$req = $bdd->prepare("INSERT INTO `T_Etapes`(Recette_ID, Etape_Ordre, Etape_Description) VALUES(:Recette_ID, :Etape_Ordre, :Etape_Description)");
							$req->execute(array(
							'Recette_ID'=> $id_nouveauRecette,
							'Etape_Ordre' => $id,
							'Etape_Description' => ucfirst($_POST['Etape_Description'][$i])
							));
}
					
					?>

					<script type="text/javascript"> 
						<!-- 
						var obj = 'window.location.replace("../fluschti.php");'; 
						setTimeout(obj,2000); 
						// --> 
					</script
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
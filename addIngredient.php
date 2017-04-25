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
<div class="row">
				<div class="col-lg-12">
					<!-- Le menu -->
					<div class="navbar-wrapper">
						<nav class="navbar">
							<div class="container">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a class="navbar-brand" href=".\index.php">Acceuil</a>
									
								</div>
								<div id="navbar" class="navbar-collapse collapse">
									<ul class="nav navbar-nav">
										<li class="active"><a href=".\fluschti.php">Ajouter une recette</a></li>   
<li ><a href=".\ingredient.php">Ajouter un ingrédient</a></li>                               
									</ul>
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>
			<div class="row contenu">
<?php
						include("connect.php"); 
					?>
				<div class="col-mg-12 envoi">
<?php 

$id = '';
for ($i=0;$i<count($_POST['ingredient_Nom']);$i++) {			
$req = $bdd->prepare("INSERT INTO `T_Ingredients`(ID_Ingredient, Ingredient_Nom) VALUES(:ID_Ingredient, :Ingredient_Nom)");
							$req->execute(array(
							'ID_Ingredient'=> $id,
							'Ingredient_Nom' => $_POST['ingredient_Nom'][$i]
							));
}
echo "<p> Les ingrédients ont été ajoutés</p>";
					?>
				<script type="text/javascript"> 
						<!-- 
						var obj = 'window.location.replace("../ingredient.php");'; 
						setTimeout(obj,2000); 
						// --> 
					</script>
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
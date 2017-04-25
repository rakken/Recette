<html>
<script type="text/javascript">
var lines_added = 0; /* Permet de vérifier qu'on ne supprime pas tout */
var lines_added1 = 0; /* Permet de vérifier qu'on ne supprime pas tout */
		
		window.onload = function() {
			document.getElementById('addLine').onclick = function() {
				appendFormLine('inputsNom', 'ingredient_Nom[]');
appendFormLine('inputsQuantite', 'ingredient_Quantite[]');
				lines_added++; /* On signale qu'on a ajouté une ligne */
			};
			document.getElementById('delLine').onclick = function() {
				if(lines_added > 0) {
					removeLastFormLine('inputsNom');
removeLastFormLine('inputsQuantite');
					lines_added--; /* On signale qu'on a retiré une ligne */
				}
			};

			document.getElementById('addEtape').onclick = function() {
				appendFormTextarea ('inputsEtape', 'Etape_Description[]');
				lines_added1++; /* On signale qu'on a ajouté une ligne */
			};
			document.getElementById('delEtape').onclick = function() {
				if(lines_added1 > 0) {
					removeLastFormLine('inputsEtape');
					lines_added1--; /* On signale qu'on a retiré une ligne */
				}
			};
		};
		

</script>
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
				<div class="col-lg-12 ajout">					
					
					<p>Merci de remplir ces champs pour ajouter une recette :</p>
					<form action=".\envoi.php" method="post" onsubmit="return verifForm(this)">
						<table class="table gauche">
							
							<tr>
								<td>Nom de la recette: (Obligatoire)</td> 
								<td>
									<input type="text" name="Recette_Nom" onblur="verifVide(this)" />
								</td>
								<td class="Tdlarge"></td>
							</tr>
							<tr>
								<td>Description :</td> 
								<td>
									<textarea type="text" name="Recette_Description" onblur="verifGrand(this)" rows="5" cols="22">
									</textarea>
								</td>
								<td class="Tdlarge"></td>
							</tr>
							<tr>
								<td>Pour combien de personne est cette recette?</td> 
								<td>
									<input type="text" class="tdIngredient" name="Recette_Parts"/>
								</td>
								<td class="Tdlarge"></td>
							</tr>
							<tr>
								<td>Quel est le temps de préparation? (En minutes)</td> 
								<td>
									<input type="text" class="tdIngredient" name="Recette_Duree" onblur="verifVide(this)" />
								</td>
								<td class="Tdlarge"></td>
							</tr>
							<tr>
								<td>Cette recette à elle une source? (Lien html)</td> 
								<td>
									<input type="text" class="tdIngredient" name="Recette_Source" onblur="verifVide(this)" />
								</td>
								<td class="Tdlarge"></td>
							</tr>
							<tr>
								<td>Une petite photo?(lien html)</td> 
								<td>
									<input type="text" class="tdIngredient" name="Recette_Photo" onblur="verifVide(this)" />
								</td>
								<td class="Tdlarge"></td>
							</tr>
							<tr>

								<td>Ingrédients:<br />
<input type="button" id="addLine" class="btn btn-primary" value="Ajouter un ingrédient" /><br /><input type="button" id="delLine" class="btn btn-primary" value="Supprimer le dernier ingrédient" />
</td> <td>
	<table>
<tr>
							<td id="inputsQuantite" >Quantité: (par ex 2 Dl)<br />
			<input type="text" class="tdIngredient" name="ingredient_Quantite[]" />&nbsp&nbsp&nbsp<br /></td><td id="inputsNom" class="tdIngredient">Ingrédient:<br /><input type="text" class="tdIngredient" name="ingredient_Nom[]" />
						<br />
</td>
</tr>
</table>
</td>								<td class="Tdlarge"></td>
							</tr>
								<tr>

								<td>Coché les bonne cathégories:</td> 
								
<td><select name="Categorie_Nom">									
<?php
$reponse = $bdd->query('SELECT * FROM `T_Categories`');
while ($donnees = $reponse->fetch())
{
?>
<option value="<?php echo $donnees['Categorie_Nom'] ?>"><?php echo $donnees['Categorie_Nom'] ?></option>
   <?php
   }
   ?>
</select></td>
								
								<td class="Tdlarge"></td>
							</tr>
						<tr>

								<td>Etapes:<br />
<input type="button" id="addEtape" class="btn btn-primary" value="Ajouter une étape" /><br /><input type="button" id="delEtape" class="btn btn-primary" value="Supprimer la dernière étape" /><br />
</td> 
								<td id="inputsEtape" >
<textarea type="text" name="Etape_Description[]" onblur="verifGrand(this)" rows="4" cols="22">
									</textarea>
							<br /></td>
						<br />
</td>
								<td class="Tdlarge"></td>
							</tr>
								<tr>
									<td colspan="2" class="tdValide"><input class="btn btn-primary" type="submit" name="envoyer" id="button" value="Envoyer la recette!"/> 
									</td>
									<td class="Tdlarge"></td>
								</tr>
							</table>
							</form>
							</div>
							</div>
							<div class="row">
								<div class="col-lg-12 footer">
									
									<!-- le pied de page -->
									<?php include("pied_de_page.php"); ?>
								</div>
							</div>
							</div>
						</body>
					</html>
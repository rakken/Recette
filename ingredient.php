<html>
<script type="text/javascript">
var lines_added = 0; /* Permet de vérifier qu'on ne supprime pas tout */
		
		window.onload = function() {
			document.getElementById('addLine').onclick = function() {
				appendFormLine('inputsNom', 'ingredient_Nom[]');
				lines_added++; /* On signale qu'on a ajouté une ligne */
			};
			document.getElementById('delLine').onclick = function() {
				if(lines_added > 0) {
					removeLastFormLine('inputsNom');
					lines_added--; /* On signale qu'on a retiré une ligne */
				}
}
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
										<li ><a href=".\fluschti.php">Ajouter une recette</a></li>   
<li class="active"><a href=".\ingredient.php">Ajouter un ingrédient</a></li>                               
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
					
					<p>Quel ingrédiant voulez vous rajouter? :</p>
					<form action=".\addIngredient.php" method="post" onsubmit="return verifForm(this)">
						<table class="table gauche">
						
							<tr>

								<td>Ingrédients a ajouter:
<input type="button" id="addLine" class="btn btn-primary" value="Ajouter un ingrédient" /><input type="button" id="delLine" class="btn btn-primary" value="Supprimer le dernier ingrédient" />
</td> 
								<td id="inputsNom" >
							<input type="text" class="tdIngredient" name="ingredient_Nom[]" /><br /></td>&nbsp
							<td class="Tdlarge"></td>
							</tr>
														<tr>
									<td colspan="2" class="tdValide"><input class="btn btn-primary" type="submit" name="envoyer" id="button" value="Envoyer la liste!"/> 
									</td>
									<td class="Tdlarge"></td>
								</tr>
							</table>
							</form>
							The fields marked with a * are mandatory!
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
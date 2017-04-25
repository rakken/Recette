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
<p>Bonjour,</p>
<p>Bienvenu sur mon site de recette! Vous y trouverez toute les recettes que j'ai testé!</p>
				</div>
<div class="col-lg-6 new">
<?php 
	include("new.php"); 
					?>
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
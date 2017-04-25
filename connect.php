
<!-- connection a la base de donnée -->
<?php
						//Connexion a la base de donnees
						try
						{
							//données de connexion
							$bdd = new PDO('mysql:host=localhost;dbname=id456866_recette;charset=utf8','xxxxx', 'xxxxx');
						}
						// test d'erreur
						catch (Exception $e)
						{
							die('Erreur : ' . $e->getMessage());
						}
						?>

function appendFormLine(idCible, name) {
			var cible = document.getElementById(idCible);
			var br = document.createElement('br');
			var input_text = document.createElement('input');
			input_text.setAttribute('type', 'text');
			input_text.setAttribute('name', name);
			input_text.setAttribute('style', 'width: 200px;');
			cible.appendChild(input_text);
			cible.appendChild(br);
		}

function appendFormTextarea (idCible, name) {
			var cible = document.getElementById(idCible);
			var br = document.createElement('br');
			var input_text = document.createElement('textarea');
			input_text.setAttribute('type', 'text');
			input_text.setAttribute('name', name);
			input_text.setAttribute('style', 'width: 200px;');
			cible.appendChild(input_text);
			cible.appendChild(br);
		}

		function removeLastFormLine(idCible) {
			var cible = document.getElementById(idCible);
			cible.removeChild(cible.lastChild); /* Suppression du <br /> */
			cible.removeChild(cible.lastChild); /* Suppression du <input /> */
		}

function verifVide(champ)
{
	if(champ.value.length < 1)
	{
		surligne(champ, true);
		return false;
	}
	else
	{
		surligne(champ, false);
		return true;
	}
}
function verifGrand(champ)
{
	if(champ.value.length > 250)
	{
		surligne(champ, true);
		return false;
	}
	else
	{
		surligne(champ, false);
		return true;
	}
}
function surligne(champ, erreur)
{
	if(erreur)
	champ.style.backgroundColor = "#FBD177";
	else
	champ.style.backgroundColor = "";
}

function verifForm(f)
{
	var videOk = verifVide(f.Recette_Nom);
	var grandOk = verifGrand(f.Recette_Description);

	
	
	if(videOk && grandOk){
		return true;
		}else if(!videOk){
		alert("Hey! Une recette doit avoir un nom!");
		return false;
		}else if (!grandOk){
		alert("The description ne doit pas dépasser 250 caractères.");
		return false;
	}
}
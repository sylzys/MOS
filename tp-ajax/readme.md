# Ajax

Ajax est un "protocole" qui vous permet de récupérer des données en Javascript / JQuery
Il peut être utilisé pour lire des fichiers locaux, interroger un serveur Web ...

Il est très complet, et vous pouvez trouver les principales options ici :

* [Documentation officielle - EN]
* [Documentation traduite - FR]

   [Documentation officielle - EN]: <http://api.jquery.com/jquery.ajax/>
   [Documentation traduite - FR]: <http://www.jquery-fr.com/manuel/Les-fonctions-AJAX/ajax/>
   
Prenez le temps de parcourir l'ensemble des options.

Exemple de fichier Javascript utilisant Ajax:

```
jQuery(document).ready(function($) {
	$.ajax({
		url: 'js/test-json.js' ,
		method: 'GET',
		success: function(data){
			console.log ("donnée recue:", data);
                //Faire quelque chose avec les données
            },
            error: function(error){
            	alert(error.statusText);
            	console.log(error);
            }
        });
});
```
-> Que fait ce morceau de code ?

### Parser un fichier JSON

"Parser" signifie que l'on extrait des données au sein d'en ensemble de données.
Ici, parser le fichier JSON signifie récupérer les données dont on a besoin parmi l'ensemble des données reçues.

# TP

Téléchargez le fichier [user.json](json/user.json) sur votre serveur.
En utilisant Ajax, complèter l'application Happiness Tracker en ajoutant un message de bienvenue sur la page d'accueil, du type :

`Bonjour nom prénom`

Il n'est pas nécessaire d'ajouter du style pour le moment.
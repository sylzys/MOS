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

```javascript
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
**Question: Que fait ce morceau de code ?**

### Parser un fichier JSON

"Parser" signifie que l'on extrait des données au sein d'en ensemble de données.

Ici, parser le fichier JSON signifie récupérer les données dont on a besoin parmi l'ensemble des données reçues.

On travaille principalement avec des objets. Par exemple:

```javascript
{
    "id": 0,
    "school": "MOS",
    "town": "Granville",
    "country": "france",
}
```

Il est obligatoire de séparer toutes les lignes par une virgule, **sauf après la dernière**

Ici, l'objet a plusieurs propriétés: `id`, `school`, `town` et `country`.

Pour acceder à la valeur d'une propriété d'un objet, on utilise le `.`

Si, par exemple, nous reçevons les données de ce fichier dans une variable `data`, on accèdera à "school" grâce à `data.school`, qui renverra "MOS".

Il est également possible d'utiliser des tableaux au sein d'un fichier JSON:

```javascript
{
    "id": 0,
    "school": "MOS",
    "town": "Granville",
    "country": "france",
    "pupils": [
        "Jean",
        "Louise",
        "Mehdi",
        "Alex",
        "Julie"
    ]
}
```

Si l'on souhaite parcourir le tableau des élèves, on utilisera data.pupils.
`data.pupils[0]` renverra "Jean".

Utiliser un tableau "clé->valeur" est aussi possible:

```javascript
{
    "id": 0,
    "school": "MOS",
    "town": "Granville",
    "country": "france",
    "teachers": [
        {"name":"FX","location":"Granville","topic":"Système"},
        {"name":"Willy","location":"Caen","topic":"Design"},
        {"name":"Sylvain","location":"Caen","topic":"Dev"}
    ]
}
```

La matière enseignée par FX sera récupérée grâce à `data.teachers[0].topic`

# TP

Téléchargez le fichier [user.json](json/user.json) sur votre serveur.
En utilisant Ajax, complèter l'application Happiness Tracker en ajoutant un message de bienvenue sur la page d'accueil, du type :

`Bonjour nom prénom`

Il n'est pas nécessaire d'ajouter du style pour le moment.
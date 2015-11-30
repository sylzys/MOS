# PHP

PHP est un langage dit "back-end". Il intervient côté serveur.
Dans nos TP, il sera utilisé pour faire l'interface entre l'application et la base de données.

Pourquoi PHP ?

PHP est un langage assez facile à prendre en main, avec une courbe d'apprentissage assez lisse. Il est extrêment souvent utilisé avec mySQL, et figure par défaut dans les paquets de type MAMP, WAMP, LAMP...

# Ressources

[Code Academy]: <https://www.codecademy.com/fr/learn/php>
[Open Classrooms]: <https://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql>

### Renvoyer des données

Une fois les données récupérées par le `SELECT`et traitées par le PHP, on peut les renvoyer à l'AJAX. Elles seront reçues et stockées dans le paramètres de la fonction 'success'. Exemple ici, dans `data` :

`success: function (data)...`

On traite du JSON, on demande donc à PHP de renvoyer du JSON

```
Pour cela, on utilise la fonction `json_encode`

#TP

En utilisant les exemples contenus dans les fichiers PHP de ce dépôt, modifier l'application Happiness Tracker:

On veut afficher le nom, le login et l'email de l'utilisateur dans un onglet "Profil"

###Etapes

- Créer un onglet "Profil" sur l'appli HP
- Créer un lien "Modifier" ( avec un href="#" pour l'instant)
- Modifier le ficher select.php pour renvoyer l'ensemble des résultats récupérés via mySQL à l'AJAX. Utiliser json_encode.

###Option supplémentaire

Supprimer les `die`, et réflechir à un sytème pour informer l'AJAX si les requêtes ont échoué ou pas.

###Option supplémentaire 2

- Sur l'appli, créer un lien "Inscription". Ce lien affiche un formulaire avec 3 inputs: login, password et email, ainsi qu'un bouton pour valider.
- Utiliser AJAX et le fichier insert.php pour créer le nouvel utilisateur
- Créer une vérification pour savoir si l'adresse email n'est pas déjà utilisée
- Créer un 2e champ text pour la vérification du mot de passe.
- Vérifier en Front (Jquery) ET en back si les mots de passe correspondent
- Ajouter un message d'erreur le cas échéant
- Encrypter les mots de passe en utilisant l'algorithme [`brcrypt`]: <http://php.net/password_hash>
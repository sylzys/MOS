# Interroger une BDD

### SELECT

La requête `SELECT` permet de récupérer des rangs dans une base de données, en spécifiant un ou plusieurs paramètres

La syntaxe est la suivante:
```
SELECT field1, field2,...fieldN from table_name1, table_name2
[WHERE Clause]
[OFFSET M ][LIMIT N]
```

- Il est possible de spécifier plusieurs tables, séparées par des virgules, et plusieurs conditions grâce à `WHERE` (paramètre optionnel)
- Il est possible de récupérer tous les attributs grâce à `*`, ou de spécifier le nom des colonnes souhaitées
- On peut récupérer un ou plusieurs rangs avec une seule requête `SELECT`
- On peut spécifier n'importe quelle condition avec `WHERE`
- Il est possible de spécifier un `OFFSET`, à partir duquel MYSQL va commencer à chercher les résultats (défaut: 0)
- Il est possible de limiter le nombre de résultats retournés avec `LIMIT`

### Exemple

```
SELECT * FROM profil
SELECT nom, prenom FROM profil OFFSET 2 LIMIT 5
SELECT * FROM profil WHERE id > 5 LIMIT 10
```

### WHERE
- Une clause `WHERE`peut être utilisée avec une requête de type `SELECT`, `UPDATE`, `DELETE`
- Obligatoire si on utilise une jointure (`JOIN`)
- On peut grouper des clauses WHERE grâce à `AND` et `OR`
- Plusieurs opérateurs sont disponibles
  - `=`
  - `!=`
  - `>`
  - `<`
  - `<=`
  - `>=`
  - `LIKE`
  
### LIKE
Permet de rechercher une occurence (possibilité d'utiliser les expressions régulières)
- Commence par "lol" -> `LIKE 'lol%'`
- Termine par "lol" -> `LIKE '%lol'`
- Contient "lol" -> `LIKE '%lol%'`
- Vaut exactement lol -> `= 'lol'` ou `LIKE 'lol'`
### TP

Considérant la table `utilisateur` suivante

| id | prenom | nom     | email                 | age |
|----|--------|---------|-----------------------|-----|
| 1  | Jean   | Valjean | j.valjean@gmail.com   | 42  |
| 2  | Harry  | Cover   | haricot@geant-vert.fr | 19  |
| 3  | Mehdi  | Passa   | medhi.passa@gmail.fr  | 32  |
| 4  | Sarah  | Croche  | sarahcroche@yahoo.fr  | 34  |
| 5  | Jean   | Naimar  | jnaimar@foot.es       | 28  |
| 6  | Mélusine | Enfaillitte   | mel@enfaillite.com | 45  |
| 7  | Marie  | Jeanne   | medhi.passa@gmail.fr  | 19  |
| 8  | Jean  | Bonneau   | jambonneau@lol.tv  | 24  |
| 9  | Annie  | Versaire | annie.versaire@gmail.fr  | 52  |
| 10 | Hassan  | Cehef   | hassan@ratp.fr  | 23  |

1. Que retourne la requête suivante :
```SELECT * FROM utilisateur```?
2. Que retourne la requête suivante :
```SELECT nom, prenom FROM utilisateur WHERE id= 3```?
3. Que retourne la requête suivante :
```SELECT * FROM utilisateur WHERE age > 25 AND id < 4 LIMIT 2 OFFSET```?
4. Que retourne la requête suivante :
```SELECT nom FROM utilisateur WHERE email LIKE '%.fr'```?
5. Que retourne la requête suivante :
```SELECT * FROM utilisateur WHERE email LIKE %.com```?
6. Comment obtenir tous les utilisateurs dont l'id est supérieur à 5 et dont l'âge est compris entre 18 et 25 ans ?
7. Comment obtenir 2 utilisateurs dont l'email termine par gmail.fr ?
8. Comment obtenir tous les utilisateurs dont le nom ou le prenom contient 'jean' ?
9. Comment obtenir tous les utilisateurs qui ont pour prénom "Jean" ?
10. Comment obtenir l'âge des 5 derniers utilisateurs ? (2 méthodes possibles)
# RELATION BDD

# One to One

**Table user**

| id | prenom | nom     | email                 | age |
|----|--------|---------|-----------------------|-----|
| 1  | Jean   | Valjean | j.valjean@gmail.com   | 42  |
| 2  | Harry  | Cover   | haricot@geant-vert.fr | 19  |
| 3  | Mehdi  | Passa   | medhi.passa@gmail.fr  | 32  |

**Table address**

| id | address | user_id
|----|--------|-------
| 1  | rue du port Granville   | 1 |
| 2  | avenue du parc Saint Lo  | 2 |
| 3  | place du marché Caen  | 3 |

Un utilisateur a une seule adresse. Une addresse a un seul utilisateur.

Cette relation est unique.
![One to One](http://jingleweb.fr/MOS/onetoone.jpg)

### One to Many - Many to One

C'est les types de relation le plus utilisé.
A noter que ces relations peuvent valoir `null`, la valeur est facultative.

Un élément peut être lié à 0, 1 ou plusieurs éléments.
Par exemple, sur du e-commerce:

Un client peut avoir 0, 1 ou plusieurs commandes.
Une commande peut contenir plusieurs items

**Table customer**

| id | prenom | nom     | email                 | age |
|----|--------|---------|-----------------------|-----|
| 1  | Jean   | Valjean | j.valjean@gmail.com   | 42  |
| 2  | Harry  | Cover   | haricot@geant-vert.fr | 19  |
| 3  | Mehdi  | Passa   | medhi.passa@gmail.fr  | 32  |

**Table Order**

| id | amount | date| customer_id |
|----|--------| --------- | -------|
| 1  | 30,3   | 2010-10-10 | 1 |
| 2  | 55  | 2015-01-15 | 2 |
| 3  | 100  | 2014-12-25 | 1 |

![One to Many](http://jingleweb.fr/MOS/onetomany.jpg)

### Many to Many

Dans certains cas, on peut avoir besoin de plusieurs instances des 2 côtés de la relation. Dans ce cas, on doit créer un table supplémentaire:

**Table Order**

| id | amount | date| customer_id |
|----|--------| --------- | -------|
| 1  | 30,3   | 2010-10-10 | 1 |
| 2  | 55  | 2015-01-15 | 2 |
| 3  | 100  | 2014-12-25 | 1 |

**Table Item**

| id | price | description| 
|----|--------| --------- |
| 1  | 5, 5   | DVD Basket 2014 | 
| 2  | 30  | Lot cartouches couleurs | 
| 3  | 70  | Imprimante All in One |

**Table item_order**

| item_id | order_id |
|----|--------|
| 1  | 5   | 
| 2  | 3  | 
| 2  | 3  |
| 3  | 3  |
| 1  |  2 |

![Many to Many](http://jingleweb.fr/MOS/manytomany.jpg)

Ce qui donne donc:

![All](http://jingleweb.fr/MOS/all.jpg)

### Clés étrangères (Foreign Keys)

Dans les tables précédentes, on a utilisé plusieurs fois une colonne du type "order_id".
C'est en fait une clé étrangère. Cette clé référence un autre champ; le champ référencé et la clé doivent avoir **exactement le même type** (ex: INT(11) )

Dans le cas d'une relation One To Many, il faut définir l'entité propriétaire. Dans l'exemple Customer / Order, on sait qu'1 client peut avoir plusieurs commandes. Customer est donc l'entité propriétaire. On créera la clé étrangère sur l'entité Order.

#### Options

`ON DELETE` comportement de MySQL en cas de suppression d'une référence

`ON UPDATE`comportement de MySQL en cas de modification d'une référence.

- `RESTRICT` ou `NO_ACTION` : on refuse la suppression / l'update. mySQL renvoie une erreur.
- `SET_NULL`: on remplace (dans le cas d'un DELETE) la valeur supprimée par `null`. Par exemple avec user/adresse, si on supprime user ayant l'id 1, alors tous les user_id de la table adresse qui valent 1 vaudront null.
- `CASCADE`: on supprime/update directement l'entité liée. Avec l'exmpla User/Adresse, si on supprime l'utilisateur ayant l'id 1, alors toutes les addresses ayant pour user_id = 1 seront automatiquement supprimées.

### Jointure

Les jointures permettent de récupérer des données dans plusieurs tables.
Concrétement, mySQL joint les informations de plusieurs tables et les joint en une table commune que vous pouvez utiliser.

On peut utiliser les jointures dans un `SELECT`, un `UPDATE` et un `DELETE`

###JOIN

Récupère les données des tables demandées. Toutes les colonnes vont les unes à la suite des autres.

```
SELECT * FROM customers JOIN order`;
```

Tel quel, c'est en fait équivalent à

```
SELECT * FROM customer, order;
``

###INNER JOIN

Si on souhaite spécifier une confition à la jointure, on peut utiliser `INNER JOIN`
Ici, on souhaite par exemple que l'id de la table customer soit égal au customer_id de la table orders.

```
SELECT * FROM customers INNER JOIN order on customer.id = order.customer_id
```

On peut également ajouter un `WHERE`

```
SELECT * FROM customer
INNER JOIN order
ON customer.id = order.customer_id
WHERE customer_id = 2
```
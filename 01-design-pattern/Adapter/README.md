Adapter.
========
 
Objectif :
----------
Je souhaite faire fonctionner ensemble deux classes dont l'une appelle une méthode de l'autre.
Je peux pas ou je ne souhaite pas modifier l'appel et la signature de l'appelée. Soit le code n'est pas le mien, soit la méthode est déà utilisée ailleurs.

Par exemple :
 * je possède une méthode déjà utilisée et je dois la faire exécuter avec un appel différent (classe tiers)
 * la méthode déclarée de m'appartient pas et je ne peux pas la modifier non plus

Méthode :
---------
Je crée une classe intermédiaire qui respecte l'interface demandée par la classe appelante. Elle possédera une méthode qui fera l'appel à la méthode que e souhaite exécuter.

Complément d'info :
-------------------
Très utile par exemple pour combiner des fonctionnalités de deux bibliothèques de classes.
On souhaite brancher deux fonctionnalités qui sont cohérentes, mais don les interfaces ne sont pas compatibles.
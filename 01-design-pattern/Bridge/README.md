Bridge.
========
 
Objectif :
----------
Je souhaite faire collaborer deux implémentations de la même fonctionnalité.
J'ai donc besoin de convertir une objet lié à la première implémentation en objet compatible avec la seconde.

Par exemple :
 * je possède une bibliothèque de Routing avec sa propre impémentation d'objet HttpRequest et la faire collaborer avec une bibliotèque de gestion de session qui a une autre implémentation de HttpRequest

Méthode :
---------
Je crée une classe qui sera capable de transformer une instance de la première implémentation en la seconde, et réciproquement.

Atelier :
---------
Créer une suite d'instructions avec à partir d'une instance d'une première classe Lib1\HttpRequest, nous permet d'obtenir un équivalent au format d'une instance de la seconde classe Lib2\HttpRequest.

Factory.
========
 
Objectif :
----------
Je souhaite obtenir une instance. Je veux la créer moi-même. Mais le paramétrage est abusivement trop long ou compliqué.


Méthode :
---------
Déléguer à une classe Batisseur, qui va nous proposer de batir progressivement l'instance en question.
 * mise en place d'une ou plusieurs méthodes pour avancer dans la construction
 * une ultime méthode pour obtenir le résultat une fois terminé
 
Complément d'info :
-------------------
Exemple :
 * construire la représentation PHP d'un menu de navigation
 * construire un formulaire
 * construire une requête SQL

En général, on constuit une structure, en ajoutant les différents éléments.

Atelier pratique :
------------------
Implémenter un FormBuilder.
On devra pouvoir y ajouter progressivement des champs (instance de Field), qui auront un "name" en paramètre.

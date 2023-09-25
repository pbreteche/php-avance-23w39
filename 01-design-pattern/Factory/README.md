Factory.
========
 
Objectif :
----------
Je souhaite obtenir une instance, mais je n'ai vraiment pas
besoin de savoir comment l'instancier.
Exemple:
 * L'instanciation est très complexe, pas besoin que chaque usager partage cette complexité
 * L'instanciation n'est pas définit par la même unité de code (paquet, composant, module, bundle), et il est amené à pouvoir changer

Méthode :
---------
 * Définir une classe intermédiaire à qui déléguer l'instantiation
 * Cette classe aura la liberté de fournir ses propres options
 * Elle sera en charge de sélection les bons paramètres à passer au constructeur
 * Elle pourra également choisir la classe a instancier
 
Complément d'info :
-------------------
L'un des patrons les plus utilisés.
Élément central de l'injection de dépendances.

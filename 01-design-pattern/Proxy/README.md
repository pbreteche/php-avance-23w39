Proxy.
========
 
Objectif :
----------
Je souhaite utiliser une fonctionnalité (méthode de classe), en ajoutant des comportements supplémentaires entre l'utilisateur et la fonctionnalité.
Par exemple :
 * mise en cache de résultat
 * délais cumulatifs en cas de tentative échouée
 * contrôle d'accès
 * abstraction / simplification d'une interface très détaillée
 * etc.

Méthode :
---------
La classe "première-utilisatrice" va utiliser le proxy plutôt que le service en direct.
Le proxy se chargera de piloter le service.

Complément d'info :
-------------------
Très utile si la classe derrière le proxy est une classe tiers et qu'on ne peut pas la modifier.
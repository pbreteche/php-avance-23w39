<?php

/**
 * Singleton.
 * 
 * Objectif : Une classe ne pourra être instanciée plus d'une fois.
 * 
 * Méthode :
 *   - retirer le libre accès au constructeur
 *   - créer sa propre méthode pour accéder à l'instance
 *   - conserver une référence privée de l'instance afin de la fournir à nouveau au besoin
 * 
 * Mise en garde, ne pas utiliser de façon abusive.
 * Les éléments statics ne sont pas testable unitairement.
 */

class Singleton
{
    private static ?self $instance = null;

    /**
     * Privé, personne à l'extérieur ne pourra instancier
     */
    private function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

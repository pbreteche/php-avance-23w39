<?php

class DartGameFactory
{
    public function createRandomly(): DartGameInterface
    {
        // La fabrique peut choisir l'implémentation
        // La fabrique peut choisir quoi passer au constructeur
        $r = random_int(0, 1);
        return match($r) {
            0 => new Dart501Game(),
            default => new DartCricketGame(),
        };
    }
}

<?php

/**************************************
 * Classe abstraite (héritage uniquement) 
 * 
 * connexion BDD,
 * design pattern SINGLETON
 *************************************/
abstract class ConnexionPDO
{
    // Membre static encapsulé
    private static $pdo;

    private static function setBdd()
    {
        // Mot clé self:: 
        // pour faire référence aux membres statiques
        self::$pdo = new PDO("mysql:host=localhost;dbname=biblio;charset=utf8", "root", "");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // Méthode uniquement accessible aux classes filles
    protected function getBdd()
    {
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}

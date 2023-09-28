<?php
// https://www.doctrine-project.org/projects/doctrine-orm/en/2.16/tutorials/getting-started.html
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Tools\DsnParser;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: array(__DIR__.'/Entity'),
    isDevMode: true,
);

$dsnParser = new DsnParser(['mysql' => 'pdo_mysql']);
$connectionParams = $dsnParser
    ->parse(trim(file_get_contents(__DIR__.'/../config/doctrine-dsn')));

// configuring the database connection
$connection = DriverManager::getConnection($connectionParams, $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);

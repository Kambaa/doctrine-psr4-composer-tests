<?php
/**
 * User: Kambaa
 * Date: 19.07.2016
 * Time: 21:46
 */


use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "src/main/php/bootstrap.php";

$paths = array(PHARDIR . "php/Entity");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver' => 'pdo_mysql',
    'user' => 'doctrine_test',
    'password' => 'doctrine_test',
    'dbname' => 'doctrine_test',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

$tool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
$classes = array(
    $entityManager->getClassMetadata('AppSkeleton\Entity\User')
);
$tool->createSchema($classes);
<?php
/**
 * User: Kambaa
 * Date: 19.07.2016
 * Time: 21:46
 */


use Doctrine\ORM\Tools\SchemaValidator;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "src/main/php/bootstrap.php";

$paths = array(PHARDIR . "php/Entity");
$isDevMode = false;

// the connection configuration
//$dbParams = array(
//    'driver' => 'pdo_mysql',
//    'host'=>'127.0.0.1',
//    'user' => 'root',
//    'password' => '1234565',
//    'dbname' => 'doctrine_test',
//);
$dbParams = array(
    'driver' => 'pdo_mysql',
    'host'=>'127.0.0.1',
    'user' => 'doctrine_test',
    'password' => 'doctrine_test',
    'dbname' => 'doctrine_test',
);



$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
// USAGE : http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/tools.html
$tool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
$classes = array(
    $entityManager->getClassMetadata('AppSkeleton\Entity\User')
);
//$tool->createSchema($classes);
$tool->updateSchema($classes);
//var_dump($tool->getDropDatabaseSQL());
var_dump($tool->getCreateSchemaSql($classes));


# For import sql statements: http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/native-sql.html#native-sql
//$dbh = $entityManager->getConnection();
//$dbh->executeUpdate(...);
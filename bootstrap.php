<?php 
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$configs = parse_ini_file('backend/src/configs.ini', true);

if((bool)$configs['isdev']) {
	echo "<h6 style='margin:0'><i>Ambiente de Desenvolvimento</i></h6><hr style='margin:0'>";
	ini_set('display_errors', 1);
	error_reporting(E_ALL | E_STRICT);
}

define('APP_PATH', __DIR__ . '/backend');

// Diretorio para chamar o layout base de render:renderHtml(...);
define('PATH_VIEWS', __DIR__ . '/frontend');

require_once APP_PATH . "/vendor/autoload.php";

$config = Setup::createAnnotationMetadataConfiguration(array(APP_PATH . "/src"), $configs['isdev']);
// or if you prefer yaml or XML
// = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), );
// = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), );

// database configuration parameters
$conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'artdna',
    'dbname'   => 'r2app_programadorautodidata',
);

// obtaining the entity manager
$em = EntityManager::create($conn, $config);
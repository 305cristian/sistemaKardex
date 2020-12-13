<?php

defined('BASEPATH') OR exit('No direct script access allowed');



$url = dirname(__FILE__);//Obtengo la ruta del archivo
require('/../third_party/vendor/autoload.php');//Cargo el autoload del composer el cual esta en la carpeta vendor
$dotenv = Dotenv\Dotenv::createImmutable($url);//cargo el archivo .env donde estan las variables
$dotenv->load();//Ejecuto el archivo .env

$active_group = 'default';
$query_builder = TRUE;
$db['default'] = array('database' => getenv("DB_NAME"),//Obtengo la variabla "DB_NAME" la cual contiene el nombre de la base de datos
    'username' => getenv("DB_USER"),
    'password' => getenv("DB_PASS"),
    'hostname' => getenv("DB_HOST"),
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE);




//default
//$active_group = 'default';
//$query_builder = TRUE;

//$db['default'] = array(
//	'dsn'	=> '',
//	'hostname' => 'localhost',
//	'username' => 'root',
//	'password' => 'root',
//	'database' => 'sistema_kardex',
//	'dbdriver' => 'mysqli',
//	'dbprefix' => '',
//	'pconnect' => FALSE,
//	'db_debug' => (ENVIRONMENT !== 'production'),
//	'cache_on' => FALSE,
//	'cachedir' => '',
//	'char_set' => 'utf8',
//	'dbcollat' => 'utf8_general_ci',
//	'swap_pre' => '',
//	'encrypt' => FALSE,
//	'compress' => FALSE,
//	'stricton' => FALSE,
//	'failover' => array(),
//	'save_queries' => TRUE
//);

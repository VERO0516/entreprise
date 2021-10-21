<?php

session_start();

define("SQL_HOST","localhost"); 
define("SQL_USER","root"); 
define("SQL_PASS",""); // ou 'root' pour mac 
define("SQL_DBNAME","b3d"); 

try{
	$db = new PDO("mysql:dbname=".SQL_DBNAME.";charset=utf8;host=".SQL_HOST,SQL_USER,SQL_PASS);

} catch(Exception $e){
	die('Erreur : ' . $e->getMessage());
}
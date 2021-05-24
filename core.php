<?php
$path = dirname(__FILE__) ;
$path = str_replace("includes","",$path);

/*+===================================+
|   Importation des librarys          |
+===================================+*/
require_once $path.'includes/settings.inc.php';

require_once $path.'includes/class/class.pdo.php';

/*+===================================+
|   Connexion à la base de données    |
+===================================+*/
try {
	$bdd = new MyPDO(HOST, PORT, DATABASE, USERNAME, PASSWORD);
		}catch(PDOException $e){
	die('Une erreur est survenue.');
}

/*+===================================+
|    Gestion des erreurs              |
+===================================+*/
if (!isset($_SERVER['REQUEST_URI']) OR empty($_SERVER['REQUEST_URI']))
{
	if (substr($_SERVER['SCRIPT_NAME'], -9) == 'index.php' && empty($_SERVER['QUERY_STRING']))
		$_SERVER['REQUEST_URI'] = dirname($_SERVER['SCRIPT_NAME']).'/';
	else
	{
		$_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'];
		if (isset($_SERVER['QUERY_STRING']) AND !empty($_SERVER['QUERY_STRING']))
			$_SERVER['REQUEST_URI'] .= '?'.$_SERVER['QUERY_STRING'];
	}
}

if (!isset($_SERVER['HTTP_HOST']) OR empty($_SERVER['HTTP_HOST']))
	$_SERVER['HTTP_HOST'] = @getenv('HTTP_HOST');
?>

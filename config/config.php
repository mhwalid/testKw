<?php
	// Definition BDD PhpMyAdmin
    if (!defined('PMA_SERVER')) define('PMA_SERVER', 'web');
    if (!defined('PMA_USER')) define('PMA_USER','root');
    if (!defined('PMA_PWD'))define('PMA_PWD','pass');
    if (!defined('PMA_DB')) define('PMA_DB', 'kw004');

	// Definition BDD EBP
	// define('EBP_USER','PRESTA');
	// define('EBP_PASSWORD','AZ14qs25');
	// define('EBP_DOSSIER','KWDISTRIBUTION_GESTION.ebp');

	// Definition BDD PrestaShop
    if (!defined('_DB_SERVER_')) define('_DB_SERVER_', 'www.kw-distribution.com');
    if (!defined('_DB_USER_')) define('_DB_USER_','kwd002');
    if (!defined('_DB_PASSWD_'))define('_DB_PASSWD_','fr156221');
    if (!defined('_DB_NAME_')) define('_DB_NAME_', 'kwd002');

	// define('_DB_SERVER_', 'www.kw-distribution.com');
	// define('_DB_USER_', 'kwd002');
	// define('_DB_PASSWD_', 'fr156221');
	// define('_DB_NAME_', 'kwd002');

	// define('_DB_PREFIX_', 'ps_');
	// define('_DB_ENCODING_','utf8');
	// define('_MYSQL_ENGINE_', 'InnoDB');
	// define('_PS_CACHING_SYSTEM_', 'CacheMemcache');
	// define('_PS_CACHE_ENABLED_', '0');
    if (!defined('_COOKIE_KEY_')) define('_COOKIE_KEY_', 'www.kw-xa75yyukopngh4zeyYfwxwJv9teW47YFvLRV07m10JY9RBDhuL2cmxkr.com');
    if (!defined('_COOKIE_IV_')) define('_COOKIE_IV_','YFNeOwby');
	// define('_COOKIE_KEY_', 'xa75yyukopngh4zeyYfwxwJv9teW47YFvLRV07m10JY9RBDhuL2cmxkr');
	// define('_COOKIE_IV_', 'YFNeOwby');
    if (!defined('_PS_CREATION_DATE_')) define('_PS_CREATION_DATE_','2015-10-07');
	// define('_PS_CREATION_DATE_', '2015-10-07');
	if (!defined('_PS_VERSION_'))
		define('_PS_VERSION_', '1.6.1.1');

     if (!defined('_RIJNDAEL_KEY_')) define('_RIJNDAEL_KEY_','v7qINAM6AarnFTMb1bqLxpKKo4DT0vA3');
     if (!defined('_RIJNDAEL_IV_')) define('_RIJNDAEL_IV_','aJ7Z/LOQuWDAgQ7pLAXOTw==');
	// define('_RIJNDAEL_KEY_', 'v7qINAM6AarnFTMb1bqLxpKKo4DT0vA3');
	// define('_RIJNDAEL_IV_', 'aJ7Z/LOQuWDAgQ7pLAXOTw==');

	// Connexions
	$serverName = "svr-ebp\\ebp"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"KW DISTRIBUTION_GESTION_0895452f-b7c1-4c00-a316-c6a6d0ea4bf4", "UID"=>"kwd002", "PWD"=>"fr156221FR", "CharacterSet" => "UTF-8");
	$connexion_ebp = sqlsrv_connect($serverName,$connectionInfo);
	$connexion_prestashop = mysqli_connect(_DB_SERVER_,_DB_USER_,_DB_PASSWD_,_DB_NAME_);
	$connexion_pma = mysqli_connect(PMA_SERVER, PMA_USER, PMA_PWD,PMA_DB);
	mysqli_set_charset( $connexion_pma, "utf8" );
	//mysqli_set_charset($connexion_prestashop,"utf8");

	$connexionInfos = array( "Database"=>"KW DISTRIBUTION_INTRANET", "UID"=>"kwd002", "PWD"=>"fr156221FR", "CharacterSet" => "UTF-8");
	$connexion_intranet = sqlsrv_connect($serverName, $connexionInfos);

	$connexionInfosraic = array( "Database"=>"RHONE ALPES INFORMATIQUE CONSEIL_GESTION", "UID"=>"sa", "PWD"=>"@ebp78EBP");
	$connexion_ebpraic = sqlsrv_connect($serverName, $connexionInfosraic);

	$connexionInfoskosmos = array( "Database"=>"KOSMOS_GESTION", "UID"=>"sa", "PWD"=>"@ebp78EBP");
	$connexion_ebpkosmos = sqlsrv_connect($serverName, $connexionInfoskosmos);

	$connectionInfotest = array( "Database"=>"TEST_GESTION", "UID"=>"sa", "PWD"=>"@ebp78EBP", "CharacterSet" => "UTF-8");
    $connexion_ebptest = sqlsrv_connect($serverName,$connectionInfotest);


// CONSTANTES expediteur
	// define("EXPEDITEUR_EMAIL", "vente@kw-distribution.com");
	// define("EXPEDITEUR_NOM", "KW DISTRIBUTION");
	// define("EXPEDITEUR_BCC", "direction@kw-distribution.com");
	// define("EXPEDITEUR_BCI", "compta@kw-distribution.com");
	// define("EXPEDITEUR_BCD", "direction@kw-distribution.com");

	// // CONSTANTES rapport envois & bugs
	// define("ADMINISTRATEUR_EMAIL", "direction@kw-distribution.com");
	// define("ADMINISTRATEUR_NOM", "SIMON");
	// define("ADMINISTRATEUR_PRENOM", "William");
	// define("LOG_FILE", "C:\\xampp\\htdocs\\log\\errors.log");
	// define("LOG_FILE_ADMIN", "C:\\xampp\\htdocs\\log\\errors_admin.log");

	// // CONSTANTES autres
	// define("EMAIL_DEFAUT_TITRE","Factures KW Distribution");
	// define('EMAIL_DEFAUT_CONTENT',"");

	// Connexion FTP (pour envoi des factures à PrestaShop)
	// $connexion_ftp = ftp_connect('www.kw-distribution.com');
	// $login_result = ftp_login($connexion_ftp, 'kwd001', 'kdqSLG@8');
	// ftp_pasv($connexion_ftp, true);

	// // Le site
	// define('_SITE_','http://www.kw-distribution.com');
	// define('_BASE_PATH_GESTION_','/gestion/');

	// // Definition des chemins CSS
	// define('__BASE_PATH_TPL__','templates/');
	// // define('__BASE_TPL_DEFAULT__','standard/');
	// define('__BASE_PATH_TPL_DEFAULT__',__BASE_PATH_TPL__);
	// define('__BASE_TPL_CSS__',__BASE_PATH_TPL_DEFAULT__.'css/');
	// define('__BASE_TPL_JS__',__BASE_PATH_TPL_DEFAULT__.'js/');
	// define('__BASE_TPL_IMG__',__BASE_PATH_TPL_DEFAULT__.'images/');

	// // // Définition des chemin operation
	// // define('__BASE_PATH_OPERATION__','operation/');

	// // // Définition chemin de base des modules
	// define('__BASE_PATH_MODULE__','modules/');
	// // define('__BASE_MODULE_CATALOGUE__',__BASE_PATH_MODULE__.'catalogue/');
	// define('__BASE_MODULE_CLIENT__',__BASE_PATH_MODULE__.'client/');
	// // define('__BASE_MODULE_RMA__',__BASE_PATH_MODULE__.'rma/');
	// // define('__BASE_MODULE_SYNCHRO__',__BASE_PATH_MODULE__.'synchro/');
	// // define('__BASE_MODULE_CONFIG__',__BASE_PATH_MODULE__.'configuration/');
	// // define('__BASE_MODULE_COMMANDE__',__BASE_PATH_MODULE__.'commande/');
	// define('__BASE_MODULE_CB__',__BASE_PATH_MODULE__.'cb/');
	// // define('__BASE_MODULE_SERIE__',__BASE_PATH_MODULE__.'serialisation/');

	// // Chemin de liens
	// define('__BASE_LINK_MOD__','home.php?mod=');
	// define('__BASE_LINK_CATALOGUE__', __BASE_LINK_MOD__.'catalogue');
	// define('__BASE_LINK_CLIENT__', __BASE_LINK_MOD__.'client');
	// define('__BASE_LINK_RMA__', __BASE_LINK_MOD__.'rma');
	// define('__BASE_LINK_SYNCHRO__', __BASE_LINK_MOD__.'synchro');
	// define('__BASE_LINK_CONFIG__', __BASE_LINK_MOD__.'configuration');
	// define('__BASE_LINK_COMMANDE__', __BASE_LINK_MOD__.'commande');
	// define('__BASE_LINK_CB__', __BASE_LINK_MOD__.'cb');
	// define('__BASE_LINK_SERIE__', __BASE_LINK_MOD__.'serialisation');

	// // CONSTANTES dossiers
	// define("DOSSIER", "C:\\xampp\\htdocs\\");
	// define("DOSSIER_ENVOI", "temp");
	// define("DOSSIER_ANNULATION", "annulation");
	// define("DOSSIER_FINAL", "documentclient");
?>

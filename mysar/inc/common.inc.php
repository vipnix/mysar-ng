<?php

if(file_exists($basePath.'/etc/config.ini')) {
	$iniConfig=parse_ini_file($basePath.'/etc/config.ini');
} else {
	$iniConfig=parse_ini_file($basePath.'/etc/config.ini.example');
}

if(isset($iniConfig['debugLevel']) && $iniConfig['debugLevel']!='') {
	$DEBUG_LEVEL=$iniConfig['debugLevel'];
}

require($basePath.'/inc/functions.inc.php');

debug("Disabling PHP's execution time limit...",50,__FILE__,__LINE__);
if($DEBUG_MODE=='cmd') {
	debug('Yes',50);
	set_time_limit(0);
} else {
	debug('No',50);
}

debug('Initializing database connection...',40,__FILE__,__LINE__);
debug('dbHost='.$iniConfig['dbHost'].',dbUser='.$iniConfig['dbUser'].',dbPass='.$iniConfig['dbPass'],40,__FILE__,__LINE__);
$link=mysqli_connect($iniConfig['dbHost'],$iniConfig['dbUser'],$iniConfig['dbPass']);
if (!$link) {
    die('Erreur de connexion (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
debug('Done.',40,__FILE__,__LINE__);
debug('Selecting database...',40,__FILE__,__LINE__);
debug('dbName='.$iniConfig['dbName'],40,__FILE__,__LINE__);
$result=mysqli_select_db($link, $iniConfig['dbName']);
if(!$result) {
	debug('Could not select database!',40,__FILE__,__LINE__);
	db_error($link);
	debug('FATAL. Exiting...',20,__FILE__,__LINE__);
	die(1);
}
debug('Done.',40,__FILE__,__LINE__);

define('PROGRAM_NAME_SHORT','mysar');
define('PROGRAM_NAME_LONG','MySQL Squid Access Report');
define('PROGRAM_VERSION','');


if($DEBUG_MODE=='web') {
	require($basePath.'/inc/smarty/Smarty.class.php');
	$smarty = new Smarty();
	$smarty->template_dir=$basePath.'/www-templates.pt_BR';
	$smarty->compile_dir=$basePath.'/smarty-tmp';
	$smarty->debugging = false;
}

$today=date('Y-m-d');


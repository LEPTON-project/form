<?php

/**
 *  @module         form
 *  @version        see info.php of this module
 *  @authors        Ryan Djurovich, Rudolph Lartey, John Maats, Dietrich Roland Pehlke, LEPTON project
 *  @copyright      2004-2010 Ryan Djurovich, Rudolph Lartey, John Maats, Dietrich Roland Pehlke 
 *  @copyright      2010-2014 LEPTON project  
 *  @license        see info.php of this module
 *  @license terms  see info.php of this module
 */

// include class.secure.php to protect this file and the whole CMS!
if (defined('LEPTON_PATH')) {	
	include(LEPTON_PATH.'/framework/class.secure.php'); 
} else {
	$oneback = "../";
	$root = $oneback;
	$level = 1;
	while (($level < 10) && (!file_exists($root.'/framework/class.secure.php'))) {
		$root .= $oneback;
		$level += 1;
	}
	if (file_exists($root.'/framework/class.secure.php')) { 
		include($root.'/framework/class.secure.php'); 
	} else {
		trigger_error(sprintf("[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER['SCRIPT_NAME']), E_USER_ERROR);
	}
}
// end include class.secure.php



$database->query("DELETE FROM ".TABLE_PREFIX."search WHERE name = 'module' AND value = 'form'");
$database->query("DELETE FROM ".TABLE_PREFIX."search WHERE extra = 'form'");

$database->query("DROP TABLE IF EXISTS `".TABLE_PREFIX."mod_form_fields`");
$database->query("DROP TABLE IF EXISTS `".TABLE_PREFIX."mod_form_settings`");
$database->query("DROP TABLE IF EXISTS `".TABLE_PREFIX."mod_form_submissions`");

?>
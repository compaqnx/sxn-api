<?php
/**
 * Template CMS
 * Author: SXN
 * Version: 1.0
 * API version: 1.0
 */
  
// Version
define('VERSION', '1.0');

// Configuration
if (file_exists('_core/init.php')) {
	require_once('_core/init.php');
}

// Install
//~ if (!defined('DIR_APPLICATION')) {
	//~ header('Location: install/index.php');
	//~ exit;
//~ }

//echo DIR_CORE;

@header('Location: catalog/home')

?>

<?php
/* File: configure.php */

$_rootDir = getcwd();

define('BASE_URL', 'http://localhost/ftw/');
define('BASE_URL_SECURE', 'https://localhost/ftw/');

// DIR
define('DIR_CATALOG', '/var/www/ftw/catalog/');
define('DIR_CLIENT', '/var/www/ftw/client/');
define('DIR_CSS', 'grafic/default/css/');
define('DIR_CORE', '/var/www/ftw/_core/');
define('DIR_DB', '/var/www/ftw/_core/db/');
define('DIR_LANG', '/var/www/ftw/lang/');
define('DIR_TEMPLATE', '/var/www/ftw/grafic/');
define('DIR_IMG', '/var/www/ftw/img/');
define('DIR_CACHE', '/var/www/ftw/_core/cache/');
define('DIR_DOWNLOAD', '/var/www/auto/download/');
define('DIR_LOGS', '/var/www/auto/system/logs/');

// DB
define('DB_DRIVER', 'mysql');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'auto');
define('DB_PREFIX', '');
?>

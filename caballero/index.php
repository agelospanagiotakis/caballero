<?php
/*
	index.php
	Caballero Website Manager
	Jason M. Knight
	Last Modified: 07 Feb 2023 07:44 UTC
*/

include 'config/site.config.php';

header('Content-Type:text/html;charset=' . HTML_CHARSET);
header('X-Frame-Options:DENY'); // prevent clickjacking

define('FILE_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('HTTP_ROOT', pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME));
define('HTTP_BASE',  pathinfo(
	substr($_SERVER['REQUEST_URI'], strlen(HTTP_ROOT) ),
	PATHINFO_FILENAME
) ?: 'index');


function define_error($name) {
	define('PAGE_BASE', 'errors-' . $name);
	define('PAGE_PATH', 'errors/' . $name);
	define('PAGE_TYPE', 'content');
} // define_error

function define_request($base, $type) {
	$prefix = 'pages/' . $base;
	if (file_exists($prefix . '.' . $type . '.php')) {
		define('PAGE_BASE', $base);
		define('PAGE_PATH', $prefix);
		define('PAGE_TYPE', $type);
	} else define_error('404');
} // Index::define_request

if (
	// whitespace and unreserved characters only
	preg_match('/[^\w\-\+\~\.]/', HTTP_BASE) ||
	// as hyphens are our slashes for pathing,
	// leading/trailing not allowed
	(HTTP_BASE !== trim(HTTP_BASE, '-')) ||
	// if using the handler delimiter, it's only allowed once
	(count($split = explode("~", HTTP_BASE)) > 2)
) {

	define_error('invalidURI');
	
} else if (count($split) > 1) {

	define('PAGE_REQUEST', $split);
	define_request($split[0], 'handler');
	
} else {

	define_request(str_replace('-', '/', HTTP_BASE), 'content');
	
}

/*
	when user database is implemented, setup user data here
	so you can figure out what template is being used.
*/
define('TEMPLATE_NAME', 'default');
define('TEMPLATE_DIR', 'templates/' . TEMPLATE_NAME . '/');
define('PAGE_CONFIG', PAGE_PATH . '.config.php');
define('PAGE_CONTENT', PAGE_PATH . '.' . PAGE_TYPE . '.php');
define('CACHE_RAW', 'cache/' . TEMPLATE_NAME . '_' . PAGE_BASE . '.raw');
define('CACHE_GZ', 'cache/' . TEMPLATE_NAME . '_' . PAGE_BASE . '.gz');

foreach (['gzip', 'x-gzip', 'x-compress'] as $type) {
	if (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], $type) !== false) {
		define('HTTP_GZIPTYPE', $type);
		header('Content-Encoding:' . $type);
		break;
	}
}

if (
	!defined('HTML_NOCACHE') &&
	file_exists(CACHE_RAW)
) include 'includes/checkCache.inc.php';

include 'libs/outputBuffer.lib.php';
include 'includes/buildPage.inc.php';
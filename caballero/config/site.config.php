<?php
/*
	config/site.config.php
	Caballero Website Manager
	Jason M. Knight
	Last Modified: 10 Feb 2023 19:47 UTC
*/

define('HTML_NOCACHE', true); // uncomment for debugging
define('HTML_NOMINIFY', true); // uncomment for debugging

define('HTML_CHARSET', 'utf-8');

define('SITE_TITLE', "Caballero Website Builder");
define('SITE_MAINMENU', [
	'./' => 'Home',
	'docs' => 'Documentation',
	'#demo' => [
		'text' => 'Demo Modal',
		'classes' => [ 'featured' ]
	]
]);
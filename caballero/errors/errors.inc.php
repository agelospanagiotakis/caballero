<?php
/*
	errors/errors.inc.php
	Caballero Website Manager
	Jason M. Knight
	Last Modified: 10 Feb 2023 00:19 UTC
*/

if (!defined('HTML_NOCACHE')) define('HTML_NOCACHE', true);
define('ERROR_STRING', $_SERVER['SERVER_PROTOCOL'] . ' ' . ERROR_TITLE);
define('PAGE_TITLE', ERROR_STRING);
header(ERROR_STRING);
Document::addMeta('robots', 'noindex,nofollow');
Document::loadTemplate('error');

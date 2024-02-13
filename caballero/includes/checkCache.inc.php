<?php
/*
	includes/checkCache.inc.php
	Caballero Website Manager
	Jason M. Knight
	Last Modified: 07 Feb 2023 07:59 UTC
*/

$srcTime = filemtime(PAGE_CONTENT);
if (file_exists(PAGE_CONFIG)) {
	$srcTime = max($srcTime, filemtime(PAGE_CONFIG));
}
if (filemtime(CACHE_RAW) > $srcTime) {
	readfile(defined('HTTP_GZIPTYPE') ? CACHE_GZ : CACHE_RAW);
	die();
}
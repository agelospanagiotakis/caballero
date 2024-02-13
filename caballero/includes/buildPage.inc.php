<?php
/*
	includes/buildPage.inc.php
	Caballero Website Manager
	Jason M. Knight
	Last Modified: 10 Feb 2023 09:41 UTC
*/

include 'libs/document.lib.php';

Document::addMeta([ 'charset' => HTML_CHARSET ]);
Document::addMeta('viewport', 'width=device-width,initial-scale=1');

Document::addFavicon('favicon.ico', 'shortcut icon');
Document::addFavicon('favicon.svg', 'icon', [
	'type' => 'image/svg+xml'
] );
Document::addFavicon('apple-touch-icon.png', 'apple-touch-icon');
Document::addFavicon('favicon.mask.svg', 'mask-icon', [
	'color' => defined('ICONS_MASKCOLOR') ? ICONS_MASKCOLOR : '#777'
] );

$templateConfig = TEMPLATE_DIR . 'config.template.php';
if (file_exists($templateConfig)) include $templateConfig;
include 'config/scripts.config.php';
Document::addStylesheet(TEMPLATE_DIR . TEMPLATE_NAME . '.screen.css', 'screen', true);
if (file_exists(PAGE_CONFIG)) include PAGE_CONFIG;

Document::output();

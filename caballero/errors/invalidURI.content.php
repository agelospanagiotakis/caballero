<?php
/*
	errors/invalidURI.content.php
	Caballero Website Manager
	Jason M. Knight
	Last Modified: 07 Feb 2023 07:59 UTC
*/

template_error(
	ERROR_TITLE,
	'The request "%s" contains invalid characters. Must be a-z, A-Z, underscore or hyphen.',
	HTTP_BASE
);

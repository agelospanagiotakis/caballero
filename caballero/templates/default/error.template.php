<?php
/*
	templates/default/error.template.php
	Caballero Website Manager
	Jason M. Knight
	Last Modified: 07 Feb 2023 08:01 UTC
*/

function template_error($title, $format, ...$values) {

	foreach ($values as &$value) $value = htmlspecialchars($value);
	
	echo '
		<section class="httpError">
			<h2>',$title, '</h2>
			<p>
				', sprintf($format, ...$values), '
			</p>
		<!-- .httpError --></section>', "\r\n";
		
} // template_error
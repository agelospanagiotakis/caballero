<?php
/*
	templates/default/modals.template.php
	Caballero Website Manager
	Jason M. Knight
	Last Modified: 10 Feb 2023 20:08 UTC
*/

function template_modal($id, $title, $tagName) {

	echo '
	<', $tagName, ' id="', $id, '" class="modal">
		<a href="#" class="modalClose_outer" hidden><span>Close ', $title, '</span></a>
		<div>
			<header>
				<h2>', $title, '</h2>
				<a href="#" class="modalClose_inner" hidden><span>Close ', $title, '</span></a>
			</header>

';

	 include 'modals/' . $id . '.modal.content.php';

	echo '

		</div>
	<!-- #', $id, '.modal --></', $tagName, ">\r\n";

} // template_modal
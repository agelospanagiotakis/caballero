<?php
// %info$

function template_menuLink($href, $text, $icon = false, $classes = []) {

	if (
		defined('PAGE_CURRENTMENUITEM') &&
		PAGE_CURRENTMENUITEM === $text
	) $classes[] = 'current';
	
	$class = empty($classes) ? '' : ' class="' . implode(' ', $classes) . '"';

	echo '
							<li', $class, '><a href="', $href, '"', (
								$icon ? ' class="icon_' . $icon . '"' : ''
							), '>',(
								$icon ?
								'<span>' . $text . '</span>' :
								$text
							), '</a></li>';
							
} // template_menuLink

echo '
						<ul data-modalTitle="Main Menu">';
						
foreach (SITE_MAINMENU as $href => $data) {
	if (is_array($data)) {
		template_menuLink(
			$href, 
			$data['text'],
			$data['icon'] ?? false,
			$data['classes'] ?? []
		);
	} else template_menuLink($href, $data);
}
	
echo '
						</ul>
';
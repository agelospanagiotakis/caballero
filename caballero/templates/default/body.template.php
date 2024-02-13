	<div id="scrollFix"><div id="fauxBody">
	
		<a name="top"></a>
	
		<header>
		
			<div>
		
				<h1><a href="./"><?= SITE_TITLE ?></a></h1>
				
				<nav id="mainMenu">
					<a href="#" class="modalClose" hidden></a>
<?php Document::loadTemplate('mainMenu'); ?>
				</nav>
				
			</div>
			
		</header>

		<main>

<?php include PAGE_CONTENT; ?>

		</main>

		<a href="#top" id="backToTop"><span>Back To Top</span></a>
		
		<footer>
			<div>
				<?= SITE_TITLE ?><br>
				Jason M. Knight
			</div>
		</footer>
		
	<!-- #fauxBody, #scrollFix --></div></div>
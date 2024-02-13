<section class="hero">
	<h2>What is a "Poor Man's" CMS?</h2>
	<p>
		Simply put it's a system that uses static files instead of database to store the content. You basically use PHP or some other server-side language to glue together your markup and apply templates to it. 
	</p>
<!-- .hero --></section>

<section>
	<h2>About</h2>
	<p>
		I wrote this to challenge a number of my own "good practices" as well as many conventions people parrot online. From "Globals are evil" to "files should output nothing" to "Don't let logic output markup" I've begun to question if any of that are legitimate concerns. 
	</p><p>
		This system Features multiple template support, markup minification, and caching. Stuff that should be the same on every template - <em>like the contents of <code>&lt;head&gtl;</code></em> -- are separated out into the parent system instead of fixed in the header. Values you would add to the header are added through a host of static object methods instead of playing with the markup.
	</p>
	<li><a href="newpage">new page</a></li>
</section>
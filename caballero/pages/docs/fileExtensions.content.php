<section id="fileExtensions" class="docs">

	<header>
	
		<div>
			<h2>File Extensions</h2>
			<p>
				Caballero uses a "double extension" naming structure for its primary files.
			</p>
		</div>
		
		<table class="key">
			<caption>Key</caption>
			<tbody>
				<tr>
					<th scope="row">[ ]</th>
					<td>optional</td>
				</tr><tr>
					<th scope="row">...</th>
					<td>zero or more</td>
				</tr>
			</tbody>
		</table>
		
	</header>

	<article>
		<h3>*.config.php</h3>
		<p>
			A configuration file creating/loading data and setting DEFINE
		</p>
		<h4>General Locations</h4>
		<ul>
			<li>/config</li>
			<li>/errors</li>
			<li>/pages</li>
			<li>/pages[.../<var>subSection</var>]</li>
			<li>/template/<var>templateName</var>
		</ul>
	</article>

	<article>
		<h3>*.content.php</h3>
		<p>
			the information of a page to be plugged into the template as the page content. PHP allowed.
		</p>
		<h4>General Locations</h4>
		<ul>
			<li>/errors</li>
			<li>/pages</li>
			<li>/pages/<var>subSection</var></li>
		</ul>
	</article>

	<article>
		<h3>*.doc.txt</h3>
		<p>
			A text file containing documentation of this system.
		</p>
		<h4>General Locations</h4>
		<ul>
			<li>/docs</li>
		</ul>
	</article>

	<article>
		<h3>*.inc.php</h3>
		<p>
			A file that is blindly included. Typically contains no functions or objects.
		</p>
		<h4>General Locations</h4>
		<ul>
			<li>/errors</li>
			<li>/includes</li>
		</ul>
	</article>

	<article>
		<h3>*.lib.php</h3>
		<p>
			Library file, holds functions and/or classes.
		</p>
		<h4>General Locations</h4>
		<ul>
			<li>/libs</li>
		</ul>
	</article>

	<article>
		<h3>*.print.css</h3>
		<p>
			stylesheets for print media
		</p>
		<h4>General Locations</h4>
		<ul>
			<li>/template/<var>templateName</var></li>
		</ul>
	</article>

	<article>
		<h3>*.screen.css</h3>
		<p>
			stylesheets specific to screen media
		</p>
		<h4>General Locations</h4>
		<ul>
			<li>/template/<var>templateName</var></li>
		</ul>
	</article>

	<article>
		<h3>*.template.php</h3>
		<p>
			A template file. The "body.template.php" is a static file where markup is allowed directly. Any other template files should wrap their templates in functions.
		</p>
		<h4>General Locations</h4>
		<ul>
			<li>/template/<var>templateName</var></li>
		</ul>
	</article>

	<ul class="actions">
		<li><a href="docs-directories">Prev Page: Directories</a></li>
		<li><a href="docs">Back To Index</a></li>
	</ul>

</section>

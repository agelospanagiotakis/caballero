<section id="defines" class="docs">

	<header>

		<div>
			<h2>Defines</h2>
			<p>
				The following defunes are created and used by Caballero
			</p><p>
				When used inside a function instead of normal script, that function is listed under its host file name.
			</p>
		</div>
		
		<table class="key">
			<caption>Key</caption>
			<tbody>
				<tr>
					<th scope="row"><var>[ DEFINE ]</var></th>
					<td>File pointed to by the define</td>
				</tr><tr>
					<th scope="row">;</th>
					<td>Comment at the end of a line</td>
				</tr>
			</tbody>
		</table>
		
	</header>

	<article>
		<h3><var>CACHE_RAW</var></h3>
		<p>
			The path to where an optional non gzipped copy of the current page should reside.
		</p>
		<h4>Created</h4>
		<ul>
			<li>index.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>includes/checkCache.inc.php</li>
			<li>libs/outputBuffer.lib.php</li>
		</ul>
	</article>

	<article>
		<h3><var>CACHE_GZ</var></h3>
		<p>
			Path to the gzipped cache of the current page, if any.
		</p>
		<h4>Created</h4>
		<ul>
			<li>index.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>includes/checkCache.inc.php</li>
			<li>libs/outputBuffer.lib.php</li>
		</ul>
	</article>

	<article>
		<h3><var>ERROR_STRING</var></h3>
		<p>
			The string sent as a HTTP header() on error.
		</p>
		<h4>Created</h4>
		<ul>
			<li>errors/error.inc.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>errors/error.inc.php</li>
			<li>TEMPLATE_DIR/error.template.php</li>
		</ul>
	</article>

	<article>
		<h3><var>ERROR_TITLE</var></h3>
		<p>
			The title of an HTTP error code, basically the part of the
	HTTP header after the protocol declaration
		</p>
		<h4>Examples:</h4>
		<ul>
			<li>"404 Not Found"</li>
			<li>"400 Bad Request"</li>
		</ul>
		<h4>Created</h4>
		<ul>
			<li>errors/[name].config.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>errors/error.inc.php</li>
			<li>TEMPLATE_DIR/error.template.php</li>
		</ul>
		<h4>Indirectly Used</h4>
		<ul>
			<li><code><var>PAGE_TITLE</var> == <var>ERROR_TITLE</var></code></li>
		</ul>
	</article>

	<article>
		<h3><var>FILE_ROOT</var></h3>
		<p>
			The directory our index.php is in, derived from __FILE__ at startup.
		</p>
		<h4>Created</h4>
		<ul>
			<li>index.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>includes/buildPage.inc.php</li>
		</ul>
	</article>

	<article>
		<h3><var>HTML_CHARSET</var></h3>
		<p>
			The character encoding of the site
		</p>
		<h4>Created</h4>
		<ul>
			<li>config/site.config.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>index.php</li>
			<li>includes/buildPage.inc.php</li>
		</ul>
	</article>

	<article>
		<h3><var>HTML_NOCACHE</var></h3>
		<p>
			Disables caching site-wide or for specific pages
		</p>
		<h4>Created</h4>
		<ul>
			<li>site.config.php <span class="comment">; for site-wide disabling</span></li>
			<li>[ PAGE_CONFIG ] <span class="comment">; for specific page</span></li>
			<li>/errors/errors.inc.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>
				libs/outputBuffer.lib.php<br>
				<em>in anonymous shutdown function</em>
			</li>
		</ul>
	</article>

	<article>
		<h3><var>HTML_NOMINIFY</var></h3>
		<p>
			Disables minification
		</p>
		<h4>Created</h4>
		<ul>
			<li>site.config.php <span class="comment">; for site-wide disabling</span></li>
			<li>[ PAGE_CONFIG ] <span class="comment">; for specific page</span></li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>
				libs/outputBuffer.lib.php<br>
				<code>Outputbuffer::add</code>
			</li>
		</ul>
	</article>

	<article>
		<h3><var>HTTP_BASE</var></h3>
		<p>
			The basename of REQUEST_URI. If none is provided this will default to "index"
		</p>
		<h4>Created</h4>
		<ul>
			<li>index.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>index.php</li>
		</ul>
	</article>

	<article>
		<h3><var>HTTP_ROOT</var></h3>
		<p>
			The directory of our index.php as accessed from the web.
		</p>
		<h4>Created</h4>
		<ul>
			<li>index.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>index.php</li>
		</ul>
	</article>

	<article>
		<h3><var>HTTP_GZIPTYPE</var></h3>
		<p>
			The string extracted from ACCEPT_ENCODING used in the HTTP header to designate a gzip compressed format.
		</p>
		<h4>Values</h4>
		<ul>
			<li>gzip</li>
			<li>x-gzip</li>
			<li>x-compress</li>
		</ul>
		<h4>Created</h4>
		<ul>
			<li>index.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>
				libs/outputBuffer.lib.php<br>
				<em>in anonymous shutdown function</em>
			</li>
			<li>includes/cacheCheck.inc.php</li>
		</ul>
	</article>

	<article>
		<h3><var>ICON_MASKCOLOR</var></h3>
		<p>
			The color to be used for Apple "mask" SVG Icons
		</p>
		<h4>Values</h4>
		<ul>
			<li>Any valid CSS color</li>
		</ul>
		<h4>Default if not declared</h4>
		<ul>
			<li>#777</li>
		</ul>
		<h4>Created</h4>
		<ul>
			<li>Optional, but typically config/site.config.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>includes/buildPage.inc.php</li>
		</ul>
	</article>

	<article>
		<h3><var>PAGE_BASE</var></h3>
		<p>
			The basename used to build caching files
		</p>
		<h4>Created</h4>
		<ul>
			<li>index.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>index.php</li>
		</ul>
	</article>

	<article>
		<h3><var>PAGE_CONFIG</var></h3>
		<p>
			Path to the current page configuration file. Typically set to
	<code>PAGE_PATH . '.config.php'</code>
		</p>
		<h4>Created</h4>
		<ul>
			<li>index.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>index.php</li>
			<li>includes/checkCache.inc.php</li>
			<li>includes/buildPage.inc.php</li>
		</ul>
	</article>

	<article>
		<h3><var>PAGE_CONTENT</var></h3>
		<p>
			Path to the current page content file. Could be one of either
		</p>
		<h4>Known/valid values</h4>
		<ul>
			<li><code><var>PAGE_PATH</var> . '.content.php'</code></li>
			<li><code><var>PAGE_PATH</var> . '.handler.php'</code></li>
		</ul>
		<h4>Created</h4>
		<ul>
			<li>index.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>index.php</li>
			<li>includes/checkCache.inc.php</li>
			<li><var>TEMPLATE_DIR</var>/body.template.php</li>
		</ul>
	</article>

	<article>
		<h3><var>PAGE_LANG (optional)</var></h3>
		<p>
			The HTML language encoding of the current page
		</p>
		<h4>Created <em>(remember, this is optional)</em></h4>
		<ul>
			<li>[ <var>PAGE_CONFIG</var> ]</li>
		</ul>
		<h4>Default</h4>
		<ul>
			<li><code><var>SITE_TITLE</var> ?? "en"</code></li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>
				libs/htmlHeaderFooter.lib.php
				<code>HTMLHead::output()</code>
			</li>
		</ul>
	</article>

	<article>
		<h3><var>PAGE_PATH</var></h3>
		<p>
			Path to the configuration and content files
		</p>
		<h4>Created</h4>
		<ul>
			<li>index.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>index.php</li>
		</ul>
	</article>

	<article>
		<h3><var>PAGE_REQUEST</var></h3>
		<p>
			Either "content" or "handler", see PAGE_TYPE for more information
		</p>
		<h4>Created</h4>
		<ul>
			<li>index.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>index.php</li>
			<li>".handler.php" files in the /pages directory.</li>
		</ul>
	</article>

	<article>
		<h3><var>PAGE_TITLE <em>(optional)</em></var></h3>
		<p>
			Used to generate H1, body > footer, and TITLE content. Should be left undefined for the home page (index) and defined for all other subpages.
		</p>
		<h4>Created</h4>
		<ul>
			<li>[ <var>PAGE_CONFIG</var> ]</li>
			<li>errors/error.inc.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>
				libs/htmlHeaderFooter.lib.php<br>
				<code>HTMLHead::output()</code>
			</li>
			<li><var>TEMPLATE_DIR</var>/body.template.php</li>
		</ul>
	</article>

	<article>
		<h3><var>PAGE_TYPE</var></h3>
		<p>
			The type of file used, either "content" or "handler". If "content" a static include will be used using the full path, hypens will be changed into slashes. If "handler" the file will be called direct from the /pages directory with anything after the first hyphen turned into the array PAGE_REQUEST
		</p>
		<h4>Created</h4>
		<ul>
			<li>index.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>index.php</li>
		</ul>
	</article>

	<article>
		<h3><var>SITE_LANG <em>(optional)</em></var></h3>
		<p>
			The HTML language encoding of the site
		</p>
		<h4>Created <em>(remember, this is optional)</em></h4>
		<ul>
			<li>config/site.config.php</li>
		</ul>
		<h4>Default</h4>
		<ul>
			<li>"en"</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>
				libs/htmlHeaderFooter.lib.php<br>
				<code>HTMLHead::output()</code>
			</li>
		</ul>
	</article>

	<article>
		<h3><var>SITE_TITLE</var></h3>
		<p>
			The name of the website. Used to generate TITLE tag
		</p>
		<h4>Created</h4>
		<ul>
			<li>site.config.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>
				libs/htmlHeaderFooter.lib.php<br>
				<code>HTMLHead::output()</code>
			</li>
		</ul>
	</article>

	<article>
		<h3><var>TEMPLATE_DIR</var></h3>
		<p>
			Path to the current template directory
		</p>
		<h4>Created</h4>
		<ul>
			<li>index.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>includes/buildPage.inc.php</li>
			<li>
				libs/common.lib.php<br>
				<code>load_template()</code>
			</li>
		</ul>
	</article>

	<article>
		<h3><var>TEMPLATE_NAME</var></h3>
		<p>
			name of the current template, used to build TEMPLATE_DIR and for naming cached pages
		</p>
		<h4>Created</h4>
		<ul>
			<li>index.php</li>
		</ul>
		<h4>Used</h4>
		<ul>
			<li>index.php</li>
			<li>includes/checkCache.inc.php</li>
			<li>includes/buildPage.inc.php</li>
		</ul>
	</article>

	<ul class="actions">
		<li><a href="docs-definePrefixes">Prev Page: Define Prefixes</a></li>
		<li><a href="docs">Back To Index</a></li>
		<li><a href="docs-directories">Next Page: Directories</a></li>
	</ul>

</section>

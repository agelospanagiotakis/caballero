<?php
/*
	libs/outputBuffer.lib.php
	Caballero Website Manager
	Jason M. Knight
	Last Modified: 10 Feb 2023 21:50 UTC
*/

ob_start(); // output buffer for compress or caching.
ob_implicit_flush(0); // no flushing on content output

final class Outputbuffer {

	private static $buffer = '';
	
	private static function add($markup, $noMinify = false) {
		self::$buffer .= (
			$noMinify || defined('HTML_NOMINIFY')
		) ? $markup : self::minify($markup);
	}
	
	public static function minify($markup) {
		return preg_replace(
			[
				'/[^\S ]+\</s',     // whitespace before closing tags
				'/\>[^\S ]+/s',     // whitespace after ending tags
				'/(\s)+/s',         // long whitespace sequences
				'/<!--(.|\s)*?-->/' // comments
			], [
				'<', '>', '\\1', ''
			],
			$markup
		);
	} // Outputbuffer::minify
	
	public static function end($noMinify = false) {
		self::add(ob_get_clean(), $noMinify);
		return self::$buffer;
	} // Outputbuffer::end
	
	public static function push($noMinify = false) {
		self::add(ob_get_contents(), $noMinify);
		ob_clean();
	} // Outputbuffer::push
	
	
} // Outputbuffer

register_shutdown_function(function() {

	$contents = Outputbuffer::end();
	$compressed = "\x1f\x8b\x08\x00\x00\x00\x00\x00" .
		substr(gzcompress($contents, 6), 0, -4);
	
	if (
		!defined('HTML_NOCACHE') &&
		(error_get_last() == null)
	) {
		file_put_contents(FILE_ROOT . CACHE_RAW, $contents);
		file_put_contents(FILE_ROOT . CACHE_GZ, $compressed);
	}
	
	echo defined('HTTP_GZIPTYPE') ? $compressed : $contents;

} );
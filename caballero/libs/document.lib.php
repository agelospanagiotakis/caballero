<?php
/*
	libs/document.lib.php
	Caballero Website Manager
	Jason M. Knight
	Last Modified: 10 Feb 2023 20:07 UTC
*/

final class Document {
  
  private static
    $headTags = [
      'meta' => [],
      'preloads' => [],
      'stylesheets' => [],
      'favicons' => []
    ],
    $maxPreload = 8,
    $modals = [],
    $templatesLoaded = [],
    $scripts = [];
    
  public static function addFavicon($href, $rel, $attr = []) {
    self::$headTags['favicons'][] = [
      'attr' => array_merge([
        'href' => $href,
        'rel' => $rel
      ], $attr)
    ];
  } // Document::addFavicon
    
  public static function addMeta($attr, $content = '') {
    if (!is_array($attr)) $attr = [ 'name' => $attr ];
    if (
      empty($attr['content']) &&
      !empty($content)
    ) $attr['content'] = $content;
    self::$headTags['meta'][] = [
      'tagName' => 'meta',
      'attr' => $attr
    ];
  } // Document::addMeta
  
  public static function addModal($id) {
    $file = 'modals/' . $id . '.modal.config.php';
    if (!file_exists($file)) die('Modal "' . $id . '" Not Found!');
    include $file;
    self::$modals[$id] = [
      'title' => $title ?? $id,
      'tagName' => $tagName ?? 'section'
    ];
  } // Document::addModal
  
  public static function addPreload(...$hrefs) {
    foreach ($hrefs as $href) {
      if (self::$maxPreload < 0) return false;
      self::$maxPreload--;
      if ($as = self::as($href)) {
        self::$headTags['preloads'][] = [
          'attr' => [
            'href' => $href,
            'rel' => 'preload',
            'as' => $as
          ]
        ];
      } else die(
        'Unrecognized file extension ' .
        pathinfo($href, PATHINFO_EXTENSION) .
        ' for preload'
      );
    }
  } // Document::addPreload
  
  public static function addStylesheet($href, $media = '', $preload = false) {
    if (empty($media) || $media == "all") {
      die('Invalid media target, empty or "all" not permited!');
    }
    self::$headTags['stylesheets'][] = [
      'attr' => [
        'rel' => 'stylesheet',
        'href' => $href,
        'media' => $media,
      ]
    ];
    if ($preload) self::addPreload($href);
  } // Document::addStylesheet
  
  public static function addScriptFile($href, $attr = [], $preload = false) {
    if ($preload) Document::addPreload($href);
    self::$scripts[$href] = $attr;
  } // addScriptFile
  
  public static function addScriptText($text) {
    self::$scripts[] = $text;
  } // addScriptText
    
  private static function as($href) {
    switch (pathinfo($href, PATHINFO_EXTENSION)) {
      case 'css':
        return 'style';
      case 'js':
      case 'jsm':
        return 'script';
      case 'woff2':
      case 'woff':
      case 'ttf':
      case 'eot':
        return 'font';
      case 'jsw':
        return 'worker';
      case 'webp':
      case 'png':
      case 'jpg':
      case 'jpeg':
      case 'bmp':
      case 'rle':
      case 'avif':
        return 'image';
      case 'pdf':
        return 'object';
      case 'html':
      case 'htm':
      case 'php':
      case 'txt':
        return 'document';
      case 'mov':
      case 'jar':
        return 'embed';
      case 'mp3':
      case 'wma':
      case 'wav':
      case 'ogg':
        return 'audio';
      case 'avi':
      case 'mkv':
      case 'mp4':
      case 'webm':
      case 'ogv':
        return 'video';
      case 'vtt':
        return track;
    }
    return false;
  } // Document::as
  
  public static function loadTemplate($name) {
    if (array_key_exists($name, self::$templatesLoaded)) return;
    $file = TEMPLATE_DIR . $name . '.template.php';
    if (
      (TEMPLATE_NAME !== 'default') &&
      !file_exists($file)
    ) $file = 'templates/default/' . $name . '.template.php';
    try {
      require $file;
      self::$templatesLoaded[$name] = true;
    } catch (Exception $e) {
      die('Error Loading Template File "' . $name . '" ' . $e->getMessage());
    }
  } // Document::loadTemplate
  
  public static function outputAttr($attr) {
    foreach ($attr as $key => $value) {
      echo ' ', $key, '="', htmlspecialchars($value), '"';
    }
  } // Document::outputAttr
  
  public static function output() {
  
    echo '<!DOCTYPE html><html lang="', (
      defined('PAGE_LANG') ? PAGE_LANG : (
        defined('SITE_LANG') ? SITE_LANG : 'en'
      )
    ), '"><head>', "\r\n\r\n";
    
    foreach (self::$headTags as $name => $section) {
      foreach ($section as $tag) {
        echo "\t<", $tag['tagName'] ?? 'link';
        self::outputAttr($tag['attr']);
        echo ">\r\n";
      }
      echo "\r\n";
    }
    echo "\t<title>";
      
    if (defined('PAGE_TITLE')) echo PAGE_TITLE . ' - ';

    echo SITE_TITLE, "</title>\r\n\r\n</head><body>\r\n\r\n";
    
    self::loadTemplate('body');
    
    echo "\r\n\r\n";
    if (!empty(self::$modals)) {
      self::loadTemplate('modals');
      foreach (self::$modals as $id => $data) {
        template_modal($id, $data['title'], $data['tagName']);
      }
      echo "\r\n";
    }
    foreach (self::$scripts as $href => $content) {
      if (is_array($content)) {
        echo "\t", '<script src="', $href, '"';
        Self::outputAttr($content);
        echo "></script>\r\n";
      } else echo "\t<script>", $content, "</script>\r\n";
    }
    echo "\r\n</body></html>";
    
  } // Document::output
  
} // Document


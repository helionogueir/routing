<?php

namespace helionogueir\routing\server;

use Exception;
use helionogueir\languagepack\Lang;
use helionogueir\routing\autoload\LanguagePack;

/**
 * Autoload:
 * - Autoload class pattern
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Autoload {

  /**
   * Register root:
   * - Register $pathRoot in spl_autoload_register
   *
   * @param string $pathRoot Path root of application
   * @return null
   */
  public function registerRoot(string $pathRoot) {
    if (empty($pathRoot) || !is_dir($pathRoot)) {
      Lang::addRoot(LanguagePack::PACKAGE, LanguagePack::PATH);
      throw new Exception(Lang::get("routing:parameter:notfound", "helionogueir/routing", Array("name" => "pathRoot")));
    } else {
      spl_autoload_register(function($classname) use ($pathRoot) {
        $filename = \helionogueir\foldercreator\tool\Path::replaceOSSeparator("{$pathRoot}/{$classname}.class.php");
        if (file_exists($filename)) {
          require_once($filename);
        } else {
          var_dump($filename);
        }
      });
    }
  }

}

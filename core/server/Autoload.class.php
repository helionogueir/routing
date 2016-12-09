<?php

namespace helionogueir\routing\server;

use Exception;
use helionogueir\languagepack\Lang;
use helionogueir\routing\autoload\Environment;

/**
 * - Register autoload pattern
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Autoload {

  /**
   * - Register root path for autload pattern (spl_autoload_register)
   * @param string $pathRoot Pathname with main folder of application
   * @return null
   */
  public function registerRoot(string $pathRoot) {
    if (empty($pathRoot) || !is_dir($pathRoot)) {
      Lang::addRoot(Environment::PACKAGE, Environment::PATH);
      throw new Exception(Lang::get("routing:parameter:notfound", "helionogueir/routing", Array("name" => "pathRoot")));
    } else {
      spl_autoload_register(function($classname) use ($pathRoot) {
        $pathname = \helionogueir\foldercreator\tool\Path::replaceOSSeparator("{$pathRoot}/{$classname}.class.php");
        if (file_exists($pathname)) {
          require_once($pathname);
        }
      });
    }
    return null;
  }

}

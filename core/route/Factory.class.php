<?php

namespace helionogueir\routing\route;

use Exception;
use SplFileObject;
use helionogueir\routing\Route;
use helionogueir\languagepack\Lang;
use helionogueir\foldercreator\tool\Path;
use helionogueir\routing\autoload\Environment;

/**
 * - Factory route
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
abstract class Factory {

  /**
   * - Factory route by JSON file
   * @param string $namespace Namespace of the route to be load
   * @param string $directory Directory path where route.json to be
   * @return helionogueir\routing\Route Return the route pattern
   */
  public static function byFile(string $namespace, string $directory): Route {
    $route = null;
    if (!empty($namespace) && !empty($directory)) {
      $object = json_decode(file_get_contents((new SplFileObject(Path::replaceOSSeparator($directory) . DIRECTORY_SEPARATOR . "route.json", "r"))->getPathname()));
      if ((JSON_ERROR_NONE == json_last_error())) {
        if (!empty($object->{$namespace})) {
          if (!empty($object->{$namespace}->route) && !empty($object->{$namespace}->name)) {
            $action = $object->{$namespace}->action ?? null;
            $route = new Route($object->{$namespace}->route, $object->{$namespace}->name, $action);
          }
        }
      }
    }
    if (is_null($route)) {
      Lang::addRoot(Environment::PACKAGE, Environment::PATH);
      throw new Exception(Lang::get("routing:route:notexists", "helionogueir/routing", Array("namespace" => $namespace)));
    }
    return $route;
  }

}

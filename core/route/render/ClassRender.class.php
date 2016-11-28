<?php

namespace helionogueir\routing\route\render;

use Exception;
use helionogueir\routing\Route;
use helionogueir\languagepack\Lang;
use helionogueir\routing\route\Render;
use helionogueir\routing\autoload\LanguagePack;

/**
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class ClassRender implements Render {

  private $route = null;

  public function __construct(Route $route) {
    $this->route = $route;
  }

  public function render() {
    $className = $this->route->getName();
    $methodName = $this->route->getAction();
    $class = new $className();
    if (in_array($methodName, get_class_methods($class))) {
      $class->$methodName();
    } else {
      Lang::addRoot(LanguagePack::PACKAGE, LanguagePack::PATH);
      throw new Exception(Lang::get("routing:method:notexists", "helionogueir/routing", Array("name" => $methodName)));
    }
    return null;
  }

}

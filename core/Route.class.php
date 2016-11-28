<?php

namespace helionogueir\routing;

use Exception;
use helionogueir\languagepack\Lang;
use helionogueir\routing\autoload\LanguagePack;

/**
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Route {

  private $route = null;
  private $name = null;
  private $action = null;

  /**
   * Construct
   * @param string $route Route name
   * @param string $className Class name of route
   * @return null
   */
  public function __construct(string $route, string $name, string $action = null) {
    Lang::addRoot(LanguagePack::PACKAGE, LanguagePack::PATH);
    if (empty($route)) {
      throw new Exception(Lang::get("routing:parameter:notfound", "helionogueir/routing", Array("name" => "route")));
    }
    if (empty($name)) {
      throw new Exception(Lang::get("routing:parameter:notfound", "helionogueir/routing", Array("name" => "name")));
    }
    $this->route = $route;
    $this->name = $name;
    $this->action = $action;
  }

  public function getRoute(): string {
    return $this->route;
  }

  public function getName(): string {
    return $this->name;
  }

  public function getAction(): string {
    return $this->action;
  }

  public function setRoute(string $route) {
    $this->route = $route;
    return null;
  }

  public function setName(string $name) {
    $this->name = $name;
    return null;
  }

  public function setAction(string $action) {
    $this->action = $action;
    return null;
  }

}

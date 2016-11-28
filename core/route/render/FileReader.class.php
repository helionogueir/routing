<?php

namespace helionogueir\routing\route\render;

use helionogueir\routing\Route;
use helionogueir\routing\route\Render;
use helionogueir\filecreator\output\ReadFile;

/**
 * File reader:
 * - File reader route
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class FileReader implements Render {

  private $route = null;

  public function __construct(Route $route) {
    $this->route = $route;
  }

  public function render() {
    $download = empty($this->route->getAction()) ? false : true;
    (new ReadFile())->read($this->route->getName(), $download);
  }

}

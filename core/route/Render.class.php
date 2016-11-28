<?php

namespace helionogueir\routing\route;

use helionogueir\routing\Route;

/**
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
interface Render {

  public function __construct(Route $route);

  /**
   * Render route
   * @return null
   */
  public function render();
}

<?php

namespace helionogueir\routing\server;

use Exception;
use helionogueir\typeBoxing\type\Str;

/**
 * Autoload:
 * - Autoload class pattern
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Autoload {

  /**
   * Contruct autoload:
   * - Create autoload class pattern
   *
   * @param helionogueir\typeBoxing\type\String $pathRoot Path root of application
   * @return null
   */
  public function __construct(Str $pathRoot) {
    if($pathRoot->isEmpty()){
      throw new Exception();
    }
  }

}

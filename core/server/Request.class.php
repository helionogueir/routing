<?php

namespace helionogueir\routing\server;

use Exception;
use helionogueir\typeBoxing\type\Str;

/**
 * Request:
 * - Control server request action
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Request {

  /**
   * Contruct basic parameters:
   * - Get basic paramiters of match
   *
   * @param helionogueir\typeBoxing\type\String $action Action of server request
   * @param helionogueir\typeBoxing\type\String $pathRoot Path root of application
   * @return null
   */
  public function __construct(Str $action, Str $pathRoot) {
    var_dump($action);
    var_dump($pathRoot);
    die;
    return null;
  }

}

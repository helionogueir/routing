<?php

namespace helionogueir\routing;

use Exception;
use helionogueir\languagepack\Lang;
use helionogueir\routing\autoload\Environment;

/**
 * - Define routing pattern
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Route {

  private $request = null;
  private $className = null;
  private $method = null;

  /**
   * - Construct route
   * @param string $request Request text
   * @param string $className Class name called for request
   * @param string $method Method name called for resquest
   * @return null
   */
  public function __construct(string $request, string $className, string $method) {
    $this->setRequest($request);
    $this->setClassName($className);
    $this->setMethod($method);
    return null;
  }

  /**
   * - Get resquest value
   * @return string Resquest value
   */
  public function getRequest(): string {
    return $this->request;
  }

  /**
   * - Get class name value
   * @return string class name value
   */
  public function getClassName(): string {
    return $this->className;
  }

  /**
   * - Get method name value
   * @return string Method name value
   */
  public function getMethod(): string {
    return $this->method;
  }

  /**
   * - Set request text
   * @param string $request Request text
   * @return null
   */
  private function setRequest(string $request) {
    if (empty($request)) {
      Lang::addRoot(Environment::PACKAGE, Environment::PATH);
      throw new Exception(Lang::get("routing:parameter:notfound", "helionogueir/routing", Array("name" => "request")));
    } else {
      $this->request = $request;
    }
    return null;
  }

  /**
   * - Set class name
   * @param string $className Class name called for request
   * @return null
   */
  private function setClassName(string $className) {
    if (empty($className) || !class_exists($className)) {
      Lang::addRoot(Environment::PACKAGE, Environment::PATH);
      throw new Exception(Lang::get("routing:parameter:notfound", "helionogueir/routing", Array("name" => "className")));
    } else {
      $this->className = $className;
    }
    return null;
  }

  /**
   * - Set method name
   * @param string $method Method name called for resquest
   * @return null
   */
  private function setMethod(string $method) {
    if (empty($method) || !in_array($method, get_class_methods($this->className))) {
      Lang::addRoot(Environment::PACKAGE, Environment::PATH);
      throw new Exception(Lang::get("routing:parameter:notfound", "helionogueir/routing", Array("name" => "method")));
    } else {
      $this->method = $method;
    }
    return null;
  }

}

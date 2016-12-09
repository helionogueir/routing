<?php

use PHPUnit\Framework\TestCase;
use helionogueir\routing\route\Factory;

class FactoryTest extends TestCase {

  public function testByFile() {
    $namespace = "path/to/request";
    $directory = dirname(dirname(dirname(__FILE__)));
    $route = Factory::byFile($namespace, $directory);
    $this->assertInstanceOf("helionogueir\\routing\\Route", $route);
  }

}

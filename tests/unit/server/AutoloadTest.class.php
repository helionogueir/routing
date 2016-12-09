<?php

use PHPUnit\Framework\TestCase;
use helionogueir\routing\server\Autoload;

class AutoloadTest extends TestCase {

  public function testRegisterRoot() {
    $this->assertNull((new Autoload())->registerRoot(dirname(dirname(__FILE__))));
  }

}

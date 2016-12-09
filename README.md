# [Routing](https://github.com/helionogueir/routing)

A libraty to control route for HTTP request.

## Installation

Composer (https://getcomposer.org/) and (https://packagist.org/)
```sh
composer require helionogueir/routing
```
------
## Usage

### helionogueir\routing\route\Factory

Load route.json file and construct a "helionogueir\routing\Route" object
```php
use helionogueir\routing\route\Factory;
$namespace = "path/to/request";
$directory = "./routing/tests";
$route = Factory::byFile($namespace, $directory);
```
------
### helionogueir\routing\server\Autoload

Define a new role for spl_autoload_register
```php
use helionogueir\routing\server\Autoload;
(new Autoload())->registerRoot("./routing/core");
```
------
### helionogueir\routing\Route

Construct a new "helionogueir\routing\Route" object
```php
use helionogueir\routing\Route;
$request = "route";
$className = "helionogueir\\routing\\server\\Autoload";
$method = "registerRoot";
$route = new Route($request, $className, $method);
$className = $route->getClassName();
(new $className())->{$route->getMethod()}("./routing/core");
```
------
## TDD (Test Driven Development)

PHPUnit (https://phpunit.de/)
```sh
phpunit -c ./routing/tests/unit.xml
```

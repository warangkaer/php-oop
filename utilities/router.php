<?php
namespace Routes;

class Router{
  private $baseRoute;

  function __construct(){
    $this->baseRoute = '/php-OOP';
    // $this->baseRoute = $_SERVER['REQUEST_URI'];
  }

  private function handler($handler){

    if(!isset($handler)){
      echo 'handler is required!';
      return;
    }

    // get controller and method
    $controller = strtok($handler, "@");
    $method = substr($handler, strpos($handler, "@")+1);
    
    // use autoload
    spl_autoload_register(function() use ($controller){
      require_once "../controllers/{$controller}.php";
    });

    // check if controllers and method are exist
    $controllerExists = class_exists("Controllers\\{$controller}");
    $methodExists = method_exists("Controllers\\{$controller}", $method);
    if(!$controllerExists){
      echo "there is no {$controller} controller";
      return;
    }
    if(!$methodExists){
      echo "there is no {$method} method";
      return;
    }

    return [$controller, $method];
  }

  public static function get($uri, $handler){
    // call static method
    $lala = (new Router)->handler($handler);
  }
}

// Router::get('/all', 'UserController@index');

?>
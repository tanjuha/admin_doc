<?php

namespace application\core;

class Router {

  protected $routes = [];
  protected $params = [];

  function __construct() {
    // connect routers
    $arr = require 'application/config/routes.php';

    foreach($arr as $key => $val) {
      $this->add($key, $val);
    }

    // debug($this->routes);
  }

  public function add($route, $params) {

    $route = '#^'.$route.'$#'; 
    $this->routes[$route] = $params;

  }

  public function match() {
    //  check if exist route
    
    //get current url
    //debug($_SERVER);
    $url = trim($_SERVER['REQUEST_URI'], '/');

    foreach($this->routes as $route => $params) {
      if(preg_match($route, $url, $matches)) {
        $this->params = $params;
        return true;
      }
    }

    return false;
  }

  public function run() {
   if( $this->match()) {
    // echo $this->params['controller'];
    // echo $this->params['action'];
    // connect controller
    $path = 'application\controllers\\'. ucfirst($this->params['controller']). 'Controller';
    // echo $controller;

    if(class_exists($path)) {
      $action = $this->params['action']. 'Action';

      // check if exist method
      if(method_exists($path, $action)) {
        $controller = new $path($this->params);
        $controller->$action();
      } else {
        echo "Action " .$action. " not found :(";
      }

    } else {
      echo 'Controller '.$path.' not found :(';

    }
  } else {
    echo 'Route not found :(';
  }

  } 
}
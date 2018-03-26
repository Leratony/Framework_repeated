<?php

namespace Core;

// Base controller
// PHP version 7.0.28

abstract class Controller
{
//Parameters from the matched route
//@var array

    protected $route_params = [];

// Class contructor
//@param array $route_params Parameters from the route
//@return void

    public function __construct($route_params)
    {
        $this -> route_params = $route_params;
    }

//
//
//@return void

    public function __call($name, $args)
    {
        $method = $name . 'Action';

        if (method_exists($this, $method)) {
            if ($this -> before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this -> after();
            }
        } else {
            echo "Method $method not found in controller " .get_class($this);
        }
    }
//Before filter - called before an action method
//@return void

    protected function before()
    {

    }
 //After filter - called afer an action method
 //@return void
    protected function after()
    {

    }  

}

?>
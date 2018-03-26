<?php 

namespace Core;

// View
// PHP version 7.0.28

class View 
{

// Render a view file
// @param string $view the view file
// @return void

    public static function render($view, $args = [])
    {   
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view"; //relative to Core directory

        if (is_readable($file)) {
            require $file;
        } else {
            echo " $file not found";
        }
    }



}

?>
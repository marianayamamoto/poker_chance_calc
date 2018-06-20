<?php

Class Init
{
    public function __construct()
    {
        // Set default controller and action
        $controller = "DeckController";
        $action = "index";

        // Change controller in case is provided
        if (isset($_GET['c']) && !empty($_GET['c'])) {
            $controller = $_GET['c'];
        }

        // Change action in case is provided
        if (isset($_GET['a']) && !empty($_GET['a'])) {
            $action = $_GET['a'];
        }

        $args = array();
        foreach ($_GET as $arg => $value) {
            if ($arg !== 'a' && $arg != 'c') {
                $args[$arg] = $value;
            }
        }

        // Require controller class file and instantiate it
        require_once("controllers/" . $controller . '.php');
        $controllerInstance = new $controller();

        // Treat POST requests as a different action
        if (isset($_POST) && !empty($_POST)) {
            foreach ($_POST as $arg => $value) {
                $args[$arg] = $value;
            }
            $action .= "_post";
            $controllerInstance->{$action}($args);
        } else {
            $controllerInstance->{$action}();
        }
    }
}
new Init();
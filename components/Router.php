<?php

/**
 * Class Router
 */
namespace components;

/**
 * Class Router
 * @package components
 */
class Router
{
    private $routes; // for array routes

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * @return string
     */
    private function getURI()
    {
        $uri = $_SERVER['REQUEST_URI'];
        if ($uri == '/') {
            return $uri;
        }
        if (!empty($uri)) {
            return trim($uri, '/');
        }
    }

    /**
     *
     */
    public function run()
    {
        // get string request
        $uri = $this->getURI();
        $i = 0;
        // check the availability of such a request in routes.php
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri) && $i < 1) {
                $i++;
                //change $uriPattern in $uri on $path
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode('/', $internalRoute);
                if ($segments[0] == $_SERVER['HTTP_HOST']) {
                    array_shift($segments);
                }
                $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                $actionName = 'action' . ucfirst(array_shift($segments));
                $parameters = $segments;
                $parameters = $this->handleSortingDatas($parameters);
                $segments = array_slice($segments, 2);
                $link = implode($segments, '/');
                $parameters['link'] = $link;
                $parameters['page'] = $parameters['page'] == '' ? 1 : $parameters['page'];

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerName = "controllers\\" . $controllerName; // add namespace controllers
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null) {
                    break;
                }
            }
        }
    }

    /**
     * @param $params
     * @return mixed
     */
    public function handleSortingDatas($params)
    {
        $arr = ['page', 'name', 'email', 'sort'];
        foreach ($arr as $arg) {
            if (in_array($arg, $params)) {
                $key = array_search($arg, $params);
                $params[$arg] = $params[$key+1];
                unset($params[$key], $params[$key+1]);
            } else {
                $params[$arg] = '';
            }
        }
        return $params;
    }
}

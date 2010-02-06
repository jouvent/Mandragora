<?php

require_once('includes/base.inc.php');

/* $routes is an array of arrays, each sub array must be 3 long with
 * - string $pattern (any regexp pattern that will be run against the query_string)
 * - string $location ( on the form <file_path>::<function_name>, both have to be valid)
 * - array  $params (any key/value pairs that will be passed to the controler function)
 */
$patterns = array(
        array('^(?<name>\w*)$','test_control::index',array()),
        array('^all$','todo::all',array()),
        array('^admin/$','admin/index.php::index',array()),
        // tache urls
        array('^admin/tache$','todo::index',array()),
        array('^admin/tache/add','todo::add',array()),
        array('^admin/tache/edit/(?<id>\d*)','todo::edit',array()),
        array('^admin/tache/del/(?<id>\d*)','todo::del',array()),
        array('^admin/tache/toggle/(?<id>\d*)','todo::toggle',array()),
        // user urls
        array('^admin/user$','users::index',array()),
        array('^admin/user/add','users::add',array()),
        array('^admin/user/edit/(?<id>\d*)','users::edit',array()),
        array('^admin/user/del/(?<id>\d*)','users::del',array()),
        // page urls
        array('^admin/page$','pages::index',array()),
        array('^admin/page/add','pages::add',array()),
        array('^admin/page/edit/(?<id>\d*)','pages::edit',array()),
        array('^admin/page/del/(?<id>\d*)','pages::del',array()),
        array('^(?<key>\w+)$','pages::show',array()),
    );


/**
 * route 
 * 
 * return the first matching routes with matching additionnal param if any
 * return false if no match
 * 
 * @param mixed $url 
 * @param array $routes 
 * @access public
 * @return void
 */
function route($url, array $routes){
    // enlever le premier / qui est innutile
    $url = substr($url,1);
    foreach($routes as $route){
        if(is_array($options = match($url,$route[0]))){
            $route[2] = array_merge($route[2],$options);
            return $route;
        }
    }
    return false;
}

/**
 * match 
 * 
 * return false on non matching pattern, 
 * return matched param (only associatives ones) if match
 *
 * @param mixed $url 
 * @param mixed $pattern 
 * @access public
 * @return void
 */
function match($url, $pattern){
    //echo "dans match $pattern $url\n";
    $options = array();
    $params = array();

    // antislash les slashes
    $pattern = str_replace('/','\\/',$pattern);

    if(preg_match("/$pattern/",$url,$options)){
        //echo "match !!\n";
        foreach($options as $key => $value){
            //echo "teste $key => $value\n";
            if(is_string($key)){
                //echo "accepte $key => $value\n";
                $params[$key] = $value;
            }
        }
        return $params;
    }
    return false;
}

/**
 * load 
 *
 * include and run given route
 * 
 * @param array $route 
 * @access public
 * @return void
 */
function load(array $route){
    $location = explode('::',$route[1]);

    require_once('control/'.$location[0].'.php');
    $obj = file_to_class($location[0]);
    $function = $location[1];
    $refl = new ReflectionMethod($obj,$function);
    echo $refl->invokeArgs(new $obj(),$route[2]);
    //return $obj->$function();
    //call_user_func_array($location[1],$route[2]);
}


?>

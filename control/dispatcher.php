<?php

require_once('includes/base.inc.php');

/**
 * 
 * @author jouvent, danidou
 *
 */
Class Dispatcher {
		
	private $patterns;
	
	/**
	 * 
	 * @param $patterns	an array of arrays, each sub array must be 3 long with
	 * 	  - string $pattern (any regexp pattern that will be run against the query_string)
	 *    - string $location ( on the form <file_path>::<function_name>, both have to be valid)
	 *    - array  $params (any key/value pairs that will be passed to the controler function)
	 * @return void
	 */	
	function Dispatcher($patterns) {
		$this->patterns = $patterns;
	}
	
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
	function route($url){
	    // enlever le premier / qui est innutile
	    $url = substr($url,1);
	    foreach($this->patterns as $pattern){
	        if(is_array($options = $this->match($url,$pattern[0]))){
	            $pattern[2] = array_merge($pattern[2],$options);
	            return $pattern;
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
	private function match($url, $pattern){
	    //echo "dans match $pattern $url\n";
	    $options = array();
	    $params = array();
	
	    // antislash les slashes
	    $pattern = str_replace('/','\\/',$pattern);
	
	    if(preg_match("/$pattern/",$url, $options)){
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
	


}
?>

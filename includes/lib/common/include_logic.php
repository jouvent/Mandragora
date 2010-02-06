<?php
/**
 * file_to_class convert a file name to the corresponding
 * class name
 *
 * a class name is the camel case representation of the 
 * underscored corresponding file name
 * Example:
 * file:  my_awesome_class
 * class: MyAwesomeClass
 *
 * @param string $file 
 * @access public
 * @return string
 */
function file_to_class( $file){
    $class = str_replace('_',' ',$file);
    $class = ucwords($class);
    return str_replace(' ','',$class);
}

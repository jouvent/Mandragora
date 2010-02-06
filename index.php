<?php
/*
 */

require_once('control/dispatcher.php');

$route = route($_SERVER['REQUEST_URI'],$patterns);
if(is_array($route)){
    echo load($route);
} else {
    echo '404 pas de routes';
}


?>

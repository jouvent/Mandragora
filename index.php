<?php
/*
 */

require_once('control/dispatcher.php');
session_start();

$db = new Datasource(DB_HOST, DB_NAME, DB_USER, DB_PASS);

$dispatcher = new Dispatcher($db, array(
	        array('^login$','authenticate::byForm',array()),
	        array('^openid$','authenticate::byOpenId',array()),
	        array('^logout$','authenticate::revoke',array()),
	        array('^register$','register::byForm',array()),
	        array('^$','main::index',array())
	    )
	);

/*
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
 */	
	
$route = $dispatcher->route($_SERVER['REQUEST_URI']);
if(is_array($route)){
    echo $dispatcher->load($route);
} else {
	$h2o = new h2o('templates/errors/error_page.html');
	$fields = array('version'=>VERSION);
	$fields['errorType'] = '404';
	$fields['errorMessage'] = 'You\'re trying to do something which requires a shovel and fire. And you have neither...';
	echo $h2o->render($fields);
	
}


?>

<?php
/*
 * centralize the project includes
 */

/* Frequently used functions and classes (ex: database layer) */
require_once('includes/lib/common/include_logic.php');
require_once('includes/lib/common/string.php');
require_once('includes/lib/database/datasource.php');
require_once('includes/lib/templating/h2o-php-0.4/h2o.php');

/* Configuration include file */
require_once('includes/config.inc.php');

/* Database models (VOs) */
require_once('includes/lib/model/user.php');

/* Data Access Objects (DAOs) */
require_once('includes/lib/dao/user_dao.php');

/* Business Logic */
require_once('includes/lib/logic/authentication.php');



?>

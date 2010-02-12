<?php
/*
 * centralize the project includes
 */

/* Frequently used functions and classes (ex: database layer) */
require_once('includes/lib/common/include_logic.php');
require_once('includes/lib/common/string.php');
require_once('includes/lib/database/datasource.php');

/* Templating and internationalization */
require_once('includes/lib/templating/h2o-php-0.4/h2o.php');
h2o::load('i18n');
h2o::load('gravatar');

/* Configuration include file */
require_once('includes/config.inc.php');

/* Database models (VOs) */
require_once('includes/lib/model/user.php');

/* Data Access Objects (DAOs) */
require_once('includes/lib/dao/user_dao.php');

/* Business Logic */
require_once('includes/lib/logic/authentication.php');
require_once('includes/lib/logic/registration.php');
require_once('includes/lib/logic/user_info.php');



?>

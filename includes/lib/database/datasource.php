<?php


 /**
  * DaoGen MySQL Datasource-object.
  * This class is an helper class to make sure the generated DaoGen
  * code does not depend on any specific Database-system.
  *
  * NOTE: You will need only one instance of this class to use multiple
  * DaoGen generated objects. This Datasource is a sample implementation
  * providing all needed methods for MySQL. However if you want to use
  * another Database-system, use this as a sample when you implement
  * Datasource for your preferred Database.
  */

 /**
  * This sourcecode has been generated by FREE DaoGen generator version 2.4.1.
  * The usage of generated code is restricted to OpenSource software projects
  * only. DaoGen is available in http://titaniclinux.net/daogen/
  * It has been programmed by Tuomo Lukka, Tuomo.Lukka@iki.fi
  *
  * DaoGen license: The following DaoGen generated source code is licensed
  * under the terms of GNU GPL license. The full text for license is available
  * in GNU project's pages: http://www.gnu.org/copyleft/gpl.html
  *
  * If you wish to use the DaoGen generator to produce code for closed-source
  * commercial applications, you must pay the lisence fee. The price is
  * 5 USD or 5 Eur for each database table, you are generating code for.
  * (That includes unlimited amount of iterations with all supported languages
  * for each database table you are paying for.) Send mail to
  * "Tuomo.Lukka@iki.fi" for more information. Thank you!
  */



class Datasource {

        var $dbLink;

       /**
        * Constructor. Call this once when initializing system core.
        * Then save the instance of this class in $connection variable 
        * and pass it as an argument when using services from core.
        */
       function Datasource($dbHost, $dbName, $dbuser, $dbpasswd) {

                // Change this line to reflect whatever Database system you are using:
                $this->dbLink = mysql_connect ($dbHost, $dbuser, $dbpasswd);

                // Change this line to reflect whatever Database system you are using:
                mysql_select_db ($dbName, $this->dbLink);
	}


        /**
         * Function to execute SQL-commands. Use this thin wrapper to avoid 
         * MySQL dependency in application code.
         */
        function execute($sql) {

                // Change this line to reflect whatever Database system you are using:
                $result = mysql_query($sql, $this->dbLink);
                $this->checkErrors($sql);

                return $result;
        }


        /**
         * Function to "blindly" execute SQL-commands. This will not put up 
         * any notifications if SQL fails, so make sure this is not used for 
         * normal operations.
         */
        function executeBlind($sql) {

                // Change this line to reflect whatever Database system you are using:
                $result = mysql_query($sql, $this->dbLink);

                return $result;
        }


        /**
         * Function to iterate trough the resultset. Use this thin wrapper to 
         * avoid MySQL dependency in application code.
         */
        function nextRow ($result) {

                // Change this line to reflect whatever Database system you are using:
                $row = mysql_fetch_array($result);

                return $row;
        }


        /**
         * Check if sql-queries triggered errors. This will be called after an 
         * execute-command. Function requires attempted SQL string as parameter 
         * since it can be logged to application spesific log if errors occurred.
         * This whole method depends heavily from selected Database-system. Make
         * sure you change this method when using some other than MySQL database.
         */
        function checkErrors($sql) {

                //global $systemLog;

                // Only thing that we need todo is define some variables
                // And ask from RDBMS, if there was some sort of errors.
                $err=mysql_error();
                $errno=mysql_errno();

                if($errno) {
                        // SQL Error occurred. This is FATAL error. Error message and 
                        // SQL command will be logged and aplication will teminate immediately.
                        $message = "The following SQL command ".$sql." caused Database error: ".$err.".";

                        //$message = addslashes("SQL-command: ".$sql." error-message: ".$message);
                        //$systemLog->writeSystemSqlError ("SQL Error occurred", $errno, $message);

                        print "Unrecowerable error has occurred. All data will be logged.";
                        print "Please contact System Administrator for help! \n";
                        print "<!-- ".$message." -->\n";
                        exit;

                } else {
                        // Since there was no error, we can safely return to main program.
                        return;
                }
        }
}

?>


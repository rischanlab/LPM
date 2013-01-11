<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'saintek';
$active_record = TRUE;

$db['kkn']['hostname'] = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=127.0.0.1)(PORT=1521))(CONNECT_DATA=(SID=XE)))";
$db['kkn']['username'] = "KKN";
$db['kkn']['password'] = "kkn";
$db['kkn']['database'] = "";
$db['kkn']['dbdriver'] = "oci8";
$db['kkn']['dbprefix'] = '';
$db['kkn']['pconnect'] = TRUE;
$db['kkn']['db_debug'] = TRUE;
$db['kkn']['cache_on'] = FALSE;
$db['kkn']['cachedir'] = '';
$db['kkn']['char_set'] = 'utf8';
$db['kkn']['dbcollat'] = 'utf8_general_ci';
$db['kkn']['swap_pre'] = '';
$db['kkn']['autoinit'] = TRUE;
$db['kkn']['stricton'] = FALSE;

/**
$db['saintek']['hostname'] = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=172.16.0.30)(PORT=1521))(CONNECT_DATA=(SID=sia)))";
$db['saintek']['username'] = "sia";
$db['saintek']['password'] = "uinsuka";
$db['saintek']['dbdriver'] = "oci8";
$db['saintek']['dbprefix'] = '';
$db['saintek']['pconnect'] = TRUE;
$db['saintek']['db_debug'] = TRUE;
$db['saintek']['cache_on'] = FALSE;
$db['saintek']['cachedir'] = '';
$db['saintek']['char_set'] = 'utf8';
$db['saintek']['dbcollat'] = 'utf8_general_ci';
$db['saintek']['swap_pre'] = '';
$db['saintek']['autoinit'] = TRUE;
$db['saintek']['stricton'] = FALSE;
**/
$db['saintek']['hostname'] = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=127.0.0.1)(PORT=1521))(CONNECT_DATA=(SID=XE)))";
$db['saintek']['username'] = "sia";
$db['saintek']['password'] = "sia";
$db['saintek']['database'] = "";
$db['saintek']['dbdriver'] = "oci8";
$db['saintek']['dbprefix'] = '';
$db['saintek']['pconnect'] = TRUE;
$db['saintek']['db_debug'] = TRUE;
$db['saintek']['cache_on'] = FALSE;
$db['saintek']['cachedir'] = '';
$db['saintek']['char_set'] = 'utf8';
$db['saintek']['dbcollat'] = 'utf8_general_ci';
$db['saintek']['swap_pre'] = '';
$db['saintek']['autoinit'] = TRUE;
$db['saintek']['stricton'] = FALSE;

$db['syariah']['hostname'] = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=172.16.0.31)(PORT=1521))(CONNECT_DATA=(SID=sia)))";
$db['syariah']['username'] = "sia";
$db['syariah']['password'] = "uinsuka";
$db['syariah']['dbdriver'] = "oci8";
$db['syariah']['dbprefix'] = '';
$db['syariah']['pconnect'] = TRUE;
$db['syariah']['db_debug'] = TRUE;
$db['syariah']['cache_on'] = FALSE;
$db['syariah']['cachedir'] = '';
$db['syariah']['char_set'] = 'utf8';
$db['syariah']['dbcollat'] = 'utf8_general_ci';
$db['syariah']['swap_pre'] = '';
$db['syariah']['autoinit'] = TRUE;
$db['syariah']['stricton'] = FALSE;

$db['adab']['hostname'] = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=172.16.0.33)(PORT=1521))(CONNECT_DATA=(SID=sia)))";
$db['adab']['username'] = "sia";
$db['adab']['password'] = "uinsuka";
$db['adab']['dbdriver'] = "oci8";
$db['adab']['dbprefix'] = '';
$db['adab']['pconnect'] = TRUE;
$db['adab']['db_debug'] = TRUE;
$db['adab']['cache_on'] = FALSE;
$db['adab']['cachedir'] = '';
$db['adab']['char_set'] = 'utf8';
$db['adab']['dbcollat'] = 'utf8_general_ci';
$db['adab']['swap_pre'] = '';
$db['adab']['autoinit'] = TRUE;
$db['adab']['stricton'] = FALSE;

$db['dakwah']['hostname'] = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=172.16.0.25)(PORT=1521))(CONNECT_DATA=(SID=sia)))";
$db['dakwah']['username'] = "sia";
$db['dakwah']['password'] = "uinsuka";
$db['dakwah']['dbdriver'] = "oci8";
$db['dakwah']['dbprefix'] = '';
$db['dakwah']['pconnect'] = TRUE;
$db['dakwah']['db_debug'] = TRUE;
$db['dakwah']['cache_on'] = FALSE;
$db['dakwah']['cachedir'] = '';
$db['dakwah']['char_set'] = 'utf8';
$db['dakwah']['dbcollat'] = 'utf8_general_ci';
$db['dakwah']['swap_pre'] = '';
$db['dakwah']['autoinit'] = TRUE;
$db['dakwah']['stricton'] = FALSE;

$db['soshum']['hostname'] = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=172.16.0.24)(PORT=1521))(CONNECT_DATA=(SID=sia)))";
$db['soshum']['username'] = "sia";
$db['soshum']['password'] = "uinsuka";
$db['soshum']['dbdriver'] = "oci8";
$db['soshum']['dbprefix'] = '';
$db['soshum']['pconnect'] = TRUE;
$db['soshum']['db_debug'] = TRUE;
$db['soshum']['cache_on'] = FALSE;
$db['soshum']['cachedir'] = '';
$db['soshum']['char_set'] = 'utf8';
$db['soshum']['dbcollat'] = 'utf8_general_ci';
$db['soshum']['swap_pre'] = '';
$db['soshum']['autoinit'] = TRUE;
$db['soshum']['stricton'] = FALSE;

$db['ushuludin']['hostname'] = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=172.16.0.45)(PORT=1521))(CONNECT_DATA=(SID=sia)))";
$db['ushuludin']['username'] = "sia";
$db['ushuludin']['password'] = "uinsuka";
$db['ushuludin']['dbdriver'] = "oci8";
$db['ushuludin']['dbprefix'] = '';
$db['ushuludin']['pconnect'] = TRUE;
$db['ushuludin']['db_debug'] = TRUE;
$db['ushuludin']['cache_on'] = FALSE;
$db['ushuludin']['cachedir'] = '';
$db['ushuludin']['char_set'] = 'utf8';
$db['ushuludin']['dbcollat'] = 'utf8_general_ci';
$db['ushuludin']['swap_pre'] = '';
$db['ushuludin']['autoinit'] = TRUE;
$db['ushuludin']['stricton'] = FALSE;

$db['tarbiyah']['hostname'] = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=172.16.0.32)(PORT=1521))(CONNECT_DATA=(SID=sia)))";
$db['tarbiyah']['username'] = "sia";
$db['tarbiyah']['password'] = "uinsuka";
$db['tarbiyah']['dbdriver'] = "oci8";
$db['tarbiyah']['dbprefix'] = '';
$db['tarbiyah']['pconnect'] = TRUE;
$db['tarbiyah']['db_debug'] = TRUE;
$db['tarbiyah']['cache_on'] = FALSE;
$db['tarbiyah']['cachedir'] = '';
$db['tarbiyah']['char_set'] = 'utf8';
$db['tarbiyah']['dbcollat'] = 'utf8_general_ci';
$db['tarbiyah']['swap_pre'] = '';
$db['tarbiyah']['autoinit'] = TRUE;
$db['tarbiyah']['stricton'] = FALSE;

$db['febi']['hostname'] = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=172.16.0.55)(PORT=1521))(CONNECT_DATA=(SID=sia)))";
$db['febi']['username'] = "sia";
$db['febi']['password'] = "uinsuka";
$db['febi']['dbdriver'] = "oci8";
$db['febi']['dbprefix'] = '';
$db['febi']['pconnect'] = TRUE;
$db['febi']['db_debug'] = TRUE;
$db['febi']['cache_on'] = FALSE;
$db['febi']['cachedir'] = '';
$db['febi']['char_set'] = 'utf8';
$db['febi']['dbcollat'] = 'utf8_general_ci';
$db['febi']['swap_pre'] = '';
$db['febi']['autoinit'] = TRUE;
$db['febi']['stricton'] = FALSE;

/* End of file database.php */
/* Location: ./application/config/database.php */

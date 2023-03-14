<?php 
// DB credentials.
define('DB_HOST','us-cdbr-east-06.cleardb.net');
define('DB_USER','bf4f43a4b6db3d');
define('DB_PASS','de3b8732');
define('DB_NAME','heroku_3989cf7346b5952');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>

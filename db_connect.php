<?php
header("Access-Control-Allow-Origin: *"); 
class DB_CONNECT {

    
    function __construct() 
    {
        
       $this->connect();  
    }

   
    function __destruct() {
        
        $this->close();
    }

     function connect()
    {
    /
    require_once __DIR__ . '/db_config.php';
    
    
     $con = mysql_connect('localhost', 'root', '') or die(mysql_error());

     $db = mysql_select_db('countries', $con) or die(mysql_error()) or die(mysql_error());

        mysql_query("SET NAMES 'UTF8'");
        mysql_query("SET CHARACTER SET utf8_turkish_ci");  
       
       mysql_query("SET COLLATION_CONNECTION = 'utf8_general_ci'");
 
        return $con;
    }
    
    function close() 
    {
        mysql_close();
    }
}

?>

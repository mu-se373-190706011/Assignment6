<?php
header("Access-Control-Allow-Origin: *"); 

$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';

$db = new DB_CONNECT();

$result = mysql_query("SELECT * FROM products") or die(mysql_error());
            

if (mysql_num_rows($result) > 0) {
    
    $response["products"] = array();
 
    while ($row = mysql_fetch_array($result)) {
       
        $products = array();
        $products["_id"] = $row["id"];
        $products["_title"] = $row["title"];
        $products["_desc"] = $row["desc"];
        $products["_price"] = $row["price"];
        $products["_instock"] = $row["instock"];
 
        
        array_push($response["products"], $products);
    }
   
    $response["success"] = 1;
 
   
    echo json_encode($response);
   
} else {
   
    $response["success"] = 0;
    $response["message"] = "No country found";
 
   
    echo json_encode($response);
    
}
?>

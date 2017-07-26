<?php 

function getdb(){
$servername = "localhost";
$username = "academi1_user";
$password = "010044403";
$db = "academi1_Learn";
 
try {
   
    $conn = new PDO("mysql:host=$servername;dbname=$db","$username","$password");
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}


$con=getdb();
//echo $con;

?>


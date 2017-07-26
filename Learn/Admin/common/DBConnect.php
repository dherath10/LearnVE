<?php 
if(!isset($_SESSION)) session_start();
function getdb(){
$servername = "localhost";
$username = "root";
$password = "";
$db = "Learn";
 
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
$URL=$_SERVER['REQUEST_URI'];

?>


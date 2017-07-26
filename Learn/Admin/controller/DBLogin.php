<?php
session_start();
?>

<?php
include '../common/DBConnect.php';
include '../model/usermodel.php';


$un = $_POST['txtUsername'];
$pw = $_POST['txtPassword'];
 
$obj=new User();
$result=$obj->Login($un, $pw);
$rows=$result->rowCount();


  if ($rows == 1)
    {
		$_SESSION['logged_admin']=$un;
                $row=$result->fetch(PDO::FETCH_BOTH);
                $_SESSION['userInfo']=$row;
                
                
      header('Location: ../view/index.php');
    }
	
	else
	{
		 $msg = "Login Failed, Invalid Username or Password!!!";
           header("Location:../view/login.php?msg=$msg");
    }
?>


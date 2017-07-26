<?php
include '../common/session.php';
include '../Admin/common/DBConnect.php';
include '../Admin/model/learnermodel.php';
?>
<?php

$obj=new Learn();
$obj->insertLogOut($row[12]);
print_r($row);

session_unset($_SESSION['row']);

header('Location:index.php');
?>
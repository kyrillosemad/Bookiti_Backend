<?php
error_reporting(0);
include("../connect.php");

$user_email=$_POST['user_email'];
$user_name=$_POST['user_name'];
$user_password=$_POST['user_password'];
$user_address=$_POST['user_address'];


$sql = "INSERT INTO `users`(`user_email`,`user_name`,`user_password`,`user_address`) VALUES('$user_email','$user_name','$user_password','$user_address')";
$stmt=$con->prepare($sql);
$stmt->execute();



$count =$stmt->rowCount();
if($count>0)
{
    echo json_encode(array("status" => "success"));
}
else
{
    echo json_encode(array("status" => "failed"));
}

?>
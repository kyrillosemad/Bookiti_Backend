<?php

include("../connect.php");


$user_email=$_POST['user_email'];
$user_password=$_POST['user_password'];


$sql="SELECT * FROM `users` WHERE `user_email`='$user_email' AND `user_password`='$user_password'";
$stmt=$con->prepare($sql);
$stmt->execute();
$users =$stmt->fetchAll(PDO::FETCH_ASSOC);



$count =$stmt->rowCount();

if($count>0)
{
    echo json_encode(array("status" => "success","data" => $users));
}
else
{
    echo json_encode(array("status" => "failed"));
}

?>


<?php

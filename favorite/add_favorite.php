<?php
error_reporting(0);
include("../connect.php");

$fav_book_id=$_POST['fav_book_id'];
$fav_owner_id =$_POST['fav_owner_id'];


$sql = "INSERT INTO `favorite`(`fav_book_id`,`fav_owner_id`) VALUES('$fav_book_id','$fav_owner_id')";
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
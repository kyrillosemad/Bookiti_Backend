<?php

include("../connect.php");


$book_id=$_POST['book_id'];
$sql = "DELETE FROM `books` WHERE `book_id` = $book_id";
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
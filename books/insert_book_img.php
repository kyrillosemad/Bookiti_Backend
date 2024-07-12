<?php
error_reporting(0);
include("../connect.php");

$book_img=$_FILES['book_img']['name'];
$book_id=$_POST['book_id'];
$upload="../img/".$book_img;
$tmp_name=$_FILES['book_img']['tmp_name'];
move_uploaded_file($tmp_name,$upload);

$book_name=$_POST['book_name'];
$book_desc=$_POST['book_desc'];
$book_price=$_POST['book_price'];
$book_owner_phone=$_POST['book_owner_phone'];
$book_owner_name=$_POST['book_owner_name'];
$book_author=$_POST['book_author'];
$book_owner_email=$_POST['book_owner_email'];
$owner_id=$_POST['owner_id'];
$book_owner_address=$_POST['book_owner_address'];
$type=$_POST['type'];
$category=$_POST['category'];

$sql = "INSERT INTO `books`(`book_name`,`book_pic`,`book_desc`,`book_price`,`book_owner_phone`,`book_owner_name`,`book_author`,`book_owner_email`,`owner_id`,`book_owner_address`,`type`,`category`) VALUES('$book_name','$book_img', '$book_desc', '$book_price','$book_owner_phone','$book_owner_name','$book_author','$book_owner_email','$owner_id','$book_owner_address','$type','${category}')";

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
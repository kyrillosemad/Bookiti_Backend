<?php
error_reporting(0);
include("../connect.php");

$book_img = $_FILES['book_img']['name'];
$upload = "../img/" . $book_img;
$tmp_name = $_FILES['book_img']['tmp_name'];
move_uploaded_file($tmp_name, $upload);

$book_name = $_POST['book_name'];
$book_desc = $_POST['book_desc'];
$book_price = $_POST['book_price'];
$book_owner_phone = $_POST['book_owner_phone'];
$book_owner_name = $_POST['book_owner_name'];
$book_author = $_POST['book_author'];
$book_owner_email = $_POST['book_owner_email'];
$owner_id = $_POST['owner_id'];
$book_owner_address = $_POST['book_owner_address'];
$type = $_POST['type'];
$category = $_POST['category'];

$sql = "INSERT INTO `books` (`book_name`, `book_pic`, `book_desc`, `book_price`, `book_owner_phone`, `book_owner_name`, `book_author`, `book_owner_email`, `owner_id`, `book_owner_address`, `type`, `category`) 
VALUES (:book_name, :book_img, :book_desc, :book_price, :book_owner_phone, :book_owner_name, :book_author, :book_owner_email, :owner_id, :book_owner_address, :type, :category)";

$stmt = $con->prepare($sql);

$stmt->bindParam(':book_name', $book_name);
$stmt->bindParam(':book_img', $book_img);
$stmt->bindParam(':book_desc', $book_desc);
$stmt->bindParam(':book_price', $book_price);
$stmt->bindParam(':book_owner_phone', $book_owner_phone);
$stmt->bindParam(':book_owner_name', $book_owner_name);
$stmt->bindParam(':book_author', $book_author);
$stmt->bindParam(':book_owner_email', $book_owner_email);
$stmt->bindParam(':owner_id', $owner_id);
$stmt->bindParam(':book_owner_address', $book_owner_address);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':category', $category);

$stmt->execute();

$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failed"));
}
?>








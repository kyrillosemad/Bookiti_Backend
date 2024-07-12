<?php

include("../connect.php");

$owner_id=$_POST['owner_id'];

$sql="SELECT books.*,1 as favorite FROM `books` INNER JOIN favorite  WHERE book_id=fav_book_id AND `fav_owner_id`='$owner_id' AND `category`='crime' UNION  SELECT books.* ,0 as favorite from books WHERE book_id NOT IN (SELECT book_id FROM books INNER JOIN favorite WHERE book_id=fav_book_id AND fav_owner_id=$owner_id) AND `category`='crime'";
$stmt=$con->prepare($sql);
$stmt->execute();
$buy_books =$stmt->fetchAll(PDO::FETCH_ASSOC);



$count =$stmt->rowCount();

if($count>0)
{
    echo json_encode(array("status" => "success","data" => $buy_books));
}
else
{
    echo json_encode(array("status" => "failed"));
}

?>
<?php

include("../connect.php");

$fav_owner_id=$_POST['fav_owner_id'];

$sql="SELECT books.* ,1 as favorite FROM `books` INNER JOIN favorite  WHERE  fav_book_id=book_id  AND `fav_owner_id`='$fav_owner_id'";
$stmt=$con->prepare($sql);
$stmt->execute();
$favorite =$stmt->fetchAll(PDO::FETCH_ASSOC);

$count =$stmt->rowCount();

if($count>0)
{
    echo json_encode(array("status" => "success","data" => $favorite));
}
else
{
    echo json_encode(array("status" => "failed"));
}

?>
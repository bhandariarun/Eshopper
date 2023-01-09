<?php
include "sqlconnect.php";
$name=$_GET['name'];
$name= $conn->real_escape_string($name);
$desc=$_GET['desc'];
$desc = $conn->real_escape_string($desc);
$id=$_GET['id'];
$id = $conn->real_escape_string($id);


$result=$conn->query("SELECT * FROM Products WHERE id=".$id." OR name='".$name."'");
if (!(mysqli_num_rows($result)>0)) {
    $conn->query("INSERT INTO Products (id,name,description) VALUES ('".$id."','".$name."','".$desc."')");
}


$type=$_GET['type'];
$detail=$_GET['detail'];
if ($conn->query("INSERT INTO `Product_Detail` (`p_id`,`type`,`detail`) VALUES ('".$id."','".$type."','".$detail."')")) {
    echo "done";
}
else {
    echo "Error";
}
?>
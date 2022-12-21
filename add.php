<?php
include "sqlconnect.php";
session_start();
$id=$_GET['id'];
if (isset($_GET['qty'])) {
    $qt=intval($_GET['qty']);
}
else {
    $qt=1;
}
if (isset($_GET['up'])) {
    $up=1;
}
else {
    $up=0;
}
if ($_SESSION['login']) {
    $result=$conn->query("SELECT * FROM Cart WHERE u_id='".$_SESSION['u_id']."' AND p_id='".$id."'");
    if (mysqli_num_rows($result)>0) {
        while($row = $result->fetch_assoc()) {
            if ($up==0) {
                $conn->query("UPDATE Cart SET qty=".strval($row['qty']+$qt)." WHERE u_id='".$_SESSION['u_id']."' AND p_id='".$id."'");
            }
            else {
                $conn->query("UPDATE Cart SET qty=".strval($qt)." WHERE u_id='".$_SESSION['u_id']."' AND p_id='".$id."'");
            }
        }
        echo "Success";
    }
    else {
        $conn->query("INSERT INTO Cart (u_id,p_id,qty) VALUES (".$_SESSION['u_id'].",".$id.",".strval($qt).")");
        echo "Success";
    }
}
?>
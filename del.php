<?php
include "sqlconnect.php";
session_start();

$id=$_GET['id'];
if (isset($_SESSION['login'])) {
    $conn->query("DELETE FROM Cart WHERE u_id=".$_SESSION['u_id']." AND p_id=".strval($id)."");
    echo "Deleted";
}
?>
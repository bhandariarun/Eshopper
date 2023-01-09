<?php
include "sqlconnect.php";
session_start();

$id=$_GET['id'];
if (isset($_SESSION['login'])) {
    $conn->query("DELETE FROM Cart WHERE u_id=".$_SESSION['u_id']." AND p_id=".strval($id)."");
    echo "Deleted";
}
elseif (isset($_SESSION['t_id'])) {
    $conn->query("DELETE FROM Tcart WHERE t_id='".$_SESSION['t_id']."' AND p_id=".strval($id)."");
    echo "Deleted";
}
?>
<?php
include "sqlconnect.php";
session_start();
$id=$_GET['id'];
$id1 = $conn->real_escape_string($id);
if (isset($_GET['qty'])) {
    $qt=intval($_GET['qty']);
    $qt = $conn->real_escape_string($qt);
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
if (isset($_SESSION['login'])) {
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
elseif (isset($_SESSION['t_id'])) {
    $result=$conn->query("SELECT * FROM Tcart WHERE t_id='".$_SESSION['t_id']."' AND p_id='".$id."'");
    if (mysqli_num_rows($result)>0) {
        while($row = $result->fetch_assoc()) {
            if ($up==0) {
                $conn->query("UPDATE Tcart SET qty=".strval($row['qty']+$qt)." WHERE t_id='".$_SESSION['t_id']."' AND p_id='".$id."'");
            }
            else {
                $conn->query("UPDATE Tcart SET qty=".strval($qt)." WHERE t_id='".$_SESSION['t_id']."' AND p_id='".$id."'");
            }
        }
        echo "Success";
    }
    else {
        $conn->query("INSERT INTO Tcart (t_id,p_id,qty) VALUES ('".$_SESSION['t_id']."',".$id.",".strval($qt).")");
        echo "Success";
    }
} 
$conn->close();
?>
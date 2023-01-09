<?php 
	include "sqlconnect.php";
	session_start();
	$tot=0;
	if (!(isset($_POST['email']) || isset($_POST['fname']) || isset($_POST['add']) || isset($_POST['cno']))) {
		header("Location: index.php");
	}
	else {
		$temail=$_POST['email'];
		$tfname=$_POST['fname'];
		$tadd=$_POST['add'];
		$tcno=$_POST['cno'];
	}
	$p_ids='';
	if (isset($_POST['esewa'])) {
		$p_method="esewa";
	}
	elseif (isset($_POST['khalti'])) {
		$p_method="khalti";
	}
	elseif (isset($_POST['imepay'])) {
		$p_method="imepay";
	}
	elseif (isset($_POST['fonepay'])) {
		$p_method="fonepay";
	}
	elseif (isset($_POST['cash'])) {
		$p_method="cash on delivery";
	}
	if (isset($_SESSION['login'])) {
		$result=$conn->query("SELECT * FROM Cart WHERE u_id='".$_SESSION['u_id']."'");
		if (mysqli_num_rows($result)>0) {
			while($row = $result->fetch_assoc()) {
				$p_ids=$p_ids.$row['p_id'].',';
				$result2=$conn->query("SELECT * FROM Products WHERE id=".$row['p_id']."");
				while($row2=$result2->fetch_assoc()) {
					$tot=$tot+($row['qty']*$row2['price']);
				}
			}
		}
		else {
			header("Location: index.php");
		}
		$conn->query("DELETE FROM Cart WHERE u_id='".$_SESSION['u_id']."'");
	}
	elseif (isset($_SESSION['t_id'])) {
		$result=$conn->query("SELECT * FROM Tcart WHERE t_id='".$_SESSION['t_id']."'");
		if (mysqli_num_rows($result)>0) {
			while($row = $result->fetch_assoc()) {
				$p_ids=$p_ids.$row['p_id'].',';
				$result2=$conn->query("SELECT * FROM Products WHERE id=".$row['p_id']."");
				while($row2=$result2->fetch_assoc()) {
					$tot=$tot+($row['qty']*$row2['price']);
				}
			}
		}
		else {
			header("Location: index.php");
		}
		$conn->query("DELETE FROM Tcart WHERE t_id='".$_SESSION['t_id']."'");
	}
	else {
		header("Location: index.php");
	}
	$bill_id=1;
	$result=$conn->query("SELECT b_id FROM bill ORDER BY b_id DESC LIMIT 1;");
	if (mysqli_num_rows($result)>0) {
		while($row = $result->fetch_assoc()) {
			$bill_id=$row['b_id']+1;
		}
	}
	$conn->query("INSERT INTO bill (cus_name,cus_address,cus_phone,cus_email,amt_total,ship,gtotal,product_ids,payment_method) VALUES ('".$tfname."','".$tadd."','".$tcno."','".$temail."',".$tot.",150,".($tot+150).",'".$p_ids."','".$p_method."')");
	header("Location: /?message=success");
?>
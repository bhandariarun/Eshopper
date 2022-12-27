<?php
session_start();
include "sqlconnect.php";
$amt=$_GET['amt'];
$tot=0;
if (isset($_SESSION['login'])) {
    $result=$conn->query("SELECT * FROM Cart WHERE u_id='".$_SESSION['u_id']."'");
    if (mysqli_num_rows($result)>0) {
        while($row = $result->fetch_assoc()) {
            $result2=$conn->query("SELECT * FROM Products WHERE id=".$row['p_id']."");
            while($row2=$result2->fetch_assoc()) {
                $tot=$tot+($row['qty']*$row2['price']);
            }
        }
    }
    else {
        header("Location: index.php");
    }
    if ($amt==($tot+150)) {
        $url = "https://uat.esewa.com.np/epay/transrec";
        $data =[
            'amt'=> $tot+150,
            'rid'=> $_GET['refId'],
            'pid'=> $_GET['oid'],
            'scd'=> 'EPAYTEST'
        ];
        echo ($tot+150);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }
}
?>
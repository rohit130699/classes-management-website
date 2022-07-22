<?php
require('connection.php');
//require('/storage/ssd1/504/15179504/public_html/fpdf/fpdf.php');
$str = $_REQUEST['str'];
$mode = $_REQUEST['mode'];
$id = $_REQUEST['id'];
$r=1;
$sql4="select num from receipt where id = ?";
$stmt4=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt4,$sql4)){
     mysqli_stmt_bind_param($stmt4,"d",$r);
     mysqli_stmt_bind_result($stmt4,$num);
     mysqli_stmt_execute($stmt4);
	 mysqli_stmt_store_result($stmt4);
     mysqli_stmt_fetch($stmt4);
    }

$uup = $num + 1;

$sql6="update receipt set num = ? where id = ?";
$stmt6=mysqli_stmt_init($con);
	if(mysqli_stmt_prepare($stmt6,$sql6)){
		mysqli_stmt_bind_param($stmt6,"dd",$uup,$r);
		mysqli_stmt_execute($stmt6);
		if(mysqli_affected_rows($con)>0){}
	}
echo "<script type='text/javascript'> window.location.replace('test1.php?str=".$str."&mode=".$mode."&id=".$id."');</script>";
?>
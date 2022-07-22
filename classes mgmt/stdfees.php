<?php
require('connection.php');

$data = $_GET['data'];
$med = $_GET['med'];

   if(($data !== "") && ($med !== "")){
	   $sql = "select fees,tenure from standard where std=? and medium=?";
	   $stmt=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt,$sql)){
		mysqli_stmt_bind_param($stmt,"ss",$data,$med);
		mysqli_stmt_bind_result($stmt,$fees,$tenure);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_fetch($stmt);
		$fee = $fees.$tenure;
	    echo $fee;
	   }
}
?>

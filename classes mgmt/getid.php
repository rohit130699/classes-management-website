<?php
require('connection.php');

$i=1;
	   $sql = "select stid from stdid where id=?";
	   $stmt=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt,$sql)){
		mysqli_stmt_bind_param($stmt,"d",$i);
		mysqli_stmt_bind_result($stmt,$id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$result=mysqli_stmt_num_rows($stmt);
		if($result >= 1){
		mysqli_stmt_fetch($stmt);
		$sid = $id+1;
		$stid=$sid;
		$sql1="update stdid set stid = ? where id = ?";
		$stmt1=mysqli_stmt_init($con);
		if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"dd",$sid,$i);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
				 echo "$stid";
			}
	    }
		else{
			echo mysqli_error($con);
		}
	   }}
?>

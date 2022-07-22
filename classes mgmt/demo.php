<?php
require('connection.php');
$id = $_GET['sid'];
	   $sql = "select fname,lname,std from student where id=?";
	   $stmt=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt,$sql)){
		mysqli_stmt_bind_param($stmt,"d",$id);
		mysqli_stmt_bind_result($stmt,$fname,$lname,$std);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$result=mysqli_stmt_num_rows($stmt);
		if($result >= 1){
		mysqli_stmt_fetch($stmt);
			@$myObj->std = "$std";
			@$myObj->fname = "$fname";
			@$myObj->lname = "$lname";
			$myJSON = json_encode($myObj);
			echo $myJSON;
	   }}
?>

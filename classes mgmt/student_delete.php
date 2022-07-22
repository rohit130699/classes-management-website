<?php
require('connection.php');
if($con->connect_error) {
	die("Connection Failed: " . $con->connect_error);
}
$id=$_GET["tid"];
$sql="select std from student where id=?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"s",$id);
	mysqli_stmt_bind_result($stmt,$std);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	mysqli_stmt_fetch($stmt);
}
if($std != 10){
$sql2="DELETE FROM student WHERE id=?";
$stmt2=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt2,$sql2)){
	mysqli_stmt_bind_param($stmt2,"s",$id);
	mysqli_stmt_execute($stmt2);
	if(mysqli_affected_rows($con)>0){
		$sql5="DELETE FROM fees WHERE st_id=?";
		$stmt5=mysqli_stmt_init($con);
		if(mysqli_stmt_prepare($stmt5,$sql5)){
			mysqli_stmt_bind_param($stmt5,"s",$id);
			mysqli_stmt_execute($stmt5);
			if(mysqli_affected_rows($con)>0){
				?>
				<script type="text/javascript" language="javascript">
				alert("Deleted Successfully...");
				window.location.replace('student_details.php');
				</script>
	<?php
	}}}}}
else{
$sql12="DELETE FROM student WHERE id=?";
$stmt12=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt12,$sql12)){
	mysqli_stmt_bind_param($stmt12,"s",$id);
	mysqli_stmt_execute($stmt12);
	if(mysqli_affected_rows($con)>0){
		$sql15="DELETE FROM tenthfees WHERE st_id=?";
		$stmt15=mysqli_stmt_init($con);
		if(mysqli_stmt_prepare($stmt15,$sql15)){
			mysqli_stmt_bind_param($stmt15,"s",$id);
			mysqli_stmt_execute($stmt15);
			if(mysqli_affected_rows($con)>0){
				?>
				<script type="text/javascript" language="javascript">
				alert("Deleted Successfully...");
				window.location.replace('student_details.php');
				</script>
	<?php
	}}
	else{
		echo mysqli_error($con);
	}
	}}}
$con->close();
?>


<?php
require('connection.php');

$uname  =$_POST['uname'];
$pass   =$_POST['pass'];
$user 	=$_POST['user'];

if(strcmp($user,'admin') === 0){
	   $sql1="select * from admin where uname=? and upass=?";
	   $stmt1=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt1,$sql1)){
	   mysqli_stmt_bind_param($stmt1,"ss",$uname,$pass);
	   mysqli_stmt_execute($stmt1);
	   mysqli_stmt_store_result($stmt1);
	   $result1=mysqli_stmt_num_rows($stmt1);
	   if($result1>0){
		   session_start();
		   $_SESSION['admin']=$uname;
		   ?>
		   <script language="javascript" type="text/javascript">
           window.location='admin.php';      //HOME PAGE FOR ADMIN
		   </script>
       <?php		   
	   }
       else{	   
	   $sql="select * from admin where uname=?";
	   $stmt=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt,$sql)){
	   mysqli_stmt_bind_param($stmt,"s",$uname);
	   mysqli_stmt_execute($stmt);
	   mysqli_stmt_store_result($stmt);
	   $result=mysqli_stmt_num_rows($stmt);
	   if($result>0){
		   ?>
		   <script language="javascript" type="text/javascript">
           alert("Invalid Password..");
		   window.location='index.html';       //MAIN HOME PAGE
		   </script>
       <?php	
	   }
	   else{
		 ?>
		   <script language="javascript" type="text/javascript">
           alert("Login Unsuccessful..");
		   window.location='index.html';
		   </script>
       <?php  
	   }}}}}
if(strcmp($user,'teacher') === 0){
	   $sql1="select * from teacher where uname=? and upass=?";
	   $stmt1=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt1,$sql1)){
	   mysqli_stmt_bind_param($stmt1,"ss",$uname,$pass);
	   mysqli_stmt_execute($stmt1);
	   mysqli_stmt_store_result($stmt1);
	   $result1=mysqli_stmt_num_rows($stmt1);
	   if($result1>0){
		   session_start();
		   $_SESSION['teacher']=$uname;
		   ?>
		   <script language="javascript" type="text/javascript">
           window.location='teacher.php';         //HOME PAGE FOR TEACHER
		   </script>
       <?php		   
	   }
       else{	   
	   $sql="select * from teacher where uname=?";
	   $stmt=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt,$sql)){
	   mysqli_stmt_bind_param($stmt,"s",$uname);
	   mysqli_stmt_execute($stmt);
	   mysqli_stmt_store_result($stmt);
	   $result=mysqli_stmt_num_rows($stmt);
	   if($result>0){
		   ?>
		   <script language="javascript" type="text/javascript">
           alert("Invalid Password..");
		   window.location='index.html';
		   </script>
       <?php	
	   }
	   else{
		 ?>
		   <script language="javascript" type="text/javascript">
           alert("Login Unsuccessful..");
		   window.location='index.html';
		   </script>
       <?php  
	   }}}}}
?>
<?php
require('connection.php');
session_start();
$name = $_SESSION['admin'];
if(is_null($name)){
	?>
	<script language="javascript" type="text/javascript">
                      alert("Your session has been expired!Please wait for few minutes!!");
                      window.location='index.html';
    </script>
<?php
}
$sql = "select fname,lname from admin where uname=?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"s",$name);
	mysqli_stmt_bind_result($stmt,$fname,$lname);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_fetch($stmt);
	$naam = $fname." ".$lname;
	//echo "$naam";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="adminstyle.css">
	<style>
	h1{
	color:indigo;
	font-size:72px;
	letter-spacing:0.5px;
	}
	h2{
	color:indigo;
	font-size:65px;
	letter-spacing:0.5px;
	}
	
	</style>
</head>
<body>
    <div class="navigation">
        <ul>
            <li>
                <a href="addstudents.html" >
                    <span class="icon"><i class="fa fa-user-plus"></i></span>
                    <span class="title">Add Students</span>
                </a>
            </li>
            <li>
                <a href="student_details.php" >
                    <span class="icon">
                        <i class="fas fa-book-reader"></i>     
                      
                    </span>
                    <span class="title">Students Details</span>
                </a>
            </li>
            <li>
                <a href="addteachers.html" >
                    <span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
                    <span class="title">Add Teachers</span>
                </a>
            </li>
            <li>
                <a href="teacher_details.php" >
                    <span class="icon"><i class="fas fa-id-badge"></i></span>
                    <span class="title">Teachers Details</span>
                </a>
            </li>
            <li>
                <a href="upd_fees.html" >
                    <span class="icon"><i class="fa fa-edit"></i></span>
                    <span class="title">Update Fees Details</span>
                </a>
            </li>
            <li>
                <a href="feesdetails.php" >
                    <span class="icon"><i class="fas fa-file-invoice-dollar"></i></span>
                    <span class="title">View Fees Details</span>
                </a>
            </li>
			<li>
                <a href="#" >
                    <span class="icon"><i class="fas fa-user-edit edit""></i></span>
                    <span class="title">Update Profile</span>
                </a>
            </li>
            <li>
                <a href="logoutadmin.php" >
                    <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="title">Log out</span>
                </a>
            </li>
    </div>
	<center><br/><br/>
	<img src="img/snclass.png" width="300px" height="300px">
	<?php
	echo "<h1>WELCOME</h1> <br/> <h2>$naam</h2>";
	?></center>
    <div class="toggle" onclick="toggleMenu()">
    </div>
    <script type="text/javascript">
    function toggleMenu(){
        let navigation=document.querySelector('.navigation');
        let toggle=document.querySelector('.toggle');
        navigation.classList.toggle('active');
        toggle.classList.toggle('active');
    }
    </script>
</body>
</html>
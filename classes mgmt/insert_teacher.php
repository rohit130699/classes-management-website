<?php
require('connection.php');

$fname = $_POST['tfname'];
$lname = $_POST['tlname'];
$number = $_POST['tnumber'];
$email = $_POST['email'];
$qualification = $_POST['tqualify'];
$exp = $_POST['texp'];
$tunm = $_POST['tunm'];
$tpwd = $_POST['tpwd'];

$chkunm = mysqli_query($con,"select * from teacher WHERE uname='$tunm' ");

$row2 = mysqli_fetch_assoc($chkunm);

$chkmail = mysqli_query($con,"select * from teacher WHERE gmail='$email' ");

$row3 = mysqli_fetch_assoc($chkmail);


if( $row2['uname'] == $tunm )
    {   

?>
	<html>
		<head><script>	alert("USERNAME Already exist !!");	
						location.href = 'addteachers.html';
			  </script>
		</head>
	</html>	
<?php
    }

elseif ( $row3['gmail'] == $email ) 
	{
?>    	
	<html>
		<head><script>	alert("E-mail Already exist !! , Try New ..");	
						location.href = 'addteachers.html';
			  </script>
		</head>
	</html>
<?php
    }    
else
    {

       $query_insert = "insert into teacher values('$fname','$lname','$number','$email','$qualification','$exp','$tunm','$tpwd')";
	   mysqli_query($con,$query_insert);  
?>

	   <html>
		<head><script>	alert("Teacher Data Successfully submitted !!");	
						location.href = 'addteachers.html';
			  </script>
		</head>
		</html>
<?php
    }
?>
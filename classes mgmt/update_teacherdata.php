<?php
require('connection.php');

$req_usnm = $_REQUEST['tid'];

$fname = $_POST['tfname'];
$lname = $_POST['tlname'];
$number = $_POST['tnumber'];
$email = $_POST['email'];
$qualification = $_POST['tqualify'];
$exp = $_POST['texp'];
$tunm = $_POST['tunm'];
$tpwd = $_POST['tpwd'];

$updt_teacher = mysqli_query($con," update teacher set fname='$fname',lname='$lname',c_no='$number',gmail='$email',
	qualification='$qualification',experience='$exp',uname='$tunm',upass='$tpwd' WHERE uname='$req_usnm';  ");
if($updt_teacher)
	{ 
	
	?>
	<script type="text/javascript" language="javascript">
	alert("Updated Successfully...");
	window.location.replace('update_teacher.php?tid=<?php echo $tunm; ?>');
	</script>

	<?php

	}

?>
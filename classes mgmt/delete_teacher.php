<?php

require('connection.php');

$req_usnm = $_REQUEST['tid'];
//echo "$req_usnm";

$del_teacher = mysqli_query($con,"delete from teacher WHERE uname='$req_usnm'; ");
if($del_teacher)
	{ 
	
	?>
	<script type="text/javascript" language="javascript">
	alert("Deleted Successfully...");
	window.location.replace('teacher_details.php');
	</script>

	<?php

	}

?>
<?php
require('connection.php');

session_start();
$name = $_SESSION['admin'];
if(is_null($name)){?>
	<script language="javascript" type="text/javascript">
                      alert("Your session has been expired!Please wait for few minutes!!");
                      window.location='index.html';
    </script>
<?php
}

$id  	=$_POST['stu_id'];
$fname  =$_POST['fname'];
$lname  =$_POST['lname'];
$gender =$_POST['gender'];
$std  	=$_POST['std'];
$med  	=$_POST['med'];
$feemon = $_POST['orgfee'];
$actfee =$_POST['actfee'];
$doj  	=$_POST['doj'];
$add 	=$_POST['add'];
$gmail  =$_POST['gmail'];
$c_no  	=$_POST['c_no'];
$downp  =$_POST['downp'];
$mode  	=$_POST['paymode'];
$dt = strtotime($doj);
$mon = date("F",$dt);
switch($mon){
	case "June":
		$total = $actfee * 12;
		break;
	case "July":
		$total = $actfee * 11;
		break;
	case "August":
		$total = $actfee * 10;
		break;
	case "September":
		$total = $actfee * 9;
		break;
	case "October":
		$total = $actfee * 8;
		break;
	case "November":
		$total = $actfee * 7;
		break;
	case "December":
		$total = $actfee * 6;
		break;
	case "January":
		$total = $actfee * 5;
		break;
	case "February":
		$total = $actfee * 4;
		break;
	case "March":
		$total = $actfee * 3;
		break;
	case "April":
		$total = $actfee * 2;
		break;
	case "May":
		$total = $actfee * 1;
		break;
}
$updt = date("d/m/Y",$dt);
//INSERTING DATA INTO STUDENT TABLE
if($std != 10){
if(($downp % $actfee == 0) && ($downp <= $total) && ($downp > 0)){	
$sql1="insert into student values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt1=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt1,$sql1)){
	 mysqli_stmt_bind_param($stmt1,"sssssssdssssd",$id,$fname,$lname,$gender,$std,$med,$feemon,$actfee,$updt,$add,$gmail,$c_no,$downp);
	 mysqli_stmt_execute($stmt1);
	}
	
	if(mysqli_affected_rows($con)>0){
		$sn = $fname." ".$lname;
		$e = "NULL";
		$sql2="insert into fees values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt2=mysqli_stmt_init($con);
		if(mysqli_stmt_prepare($stmt2,$sql2)){
			mysqli_stmt_bind_param($stmt2,"sssdssssssssssss",$id,$std,$sn,$actfee,$e,$e,$e,$e,$e,$e,$e,$e,$e,$e,$e,$e);
			mysqli_stmt_execute($stmt2);
		}
		if(mysqli_affected_rows($con)>0){	
	   $date = strtotime($doj);
	   $mon = date("F",$date);
	   $up = date("d/m/Y",$date);
	   $upd= $up.", ".$name.", By ".$mode;
	   switch($mon){
		case "June":
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set June = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jun";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set June = ?,July = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jun , Jul";
					?>
					<script language="javascript" type="text/javascript">
                     // alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set June = ?,July = ?,August = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jun , Jul , Aug";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set June = ?,July = ?,August = ?,September = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jun , Jul , Aug , Sep";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jun , Jul , Aug , Sep , Oct";
				?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssss",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jun , Jul , Aug , Sep , Oct , Nov";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 7){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jun , Jul , Aug , Sep , Oct , Nov , Dec";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 8){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jun , Jul , Aug , Sep , Oct , Nov , Dec , Jan";
					?>
					<script language="javascript" type="text/javascript">
                     //alert("Added Successfully...");
                    window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 9){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jun , Jul , Aug , Sep , Oct , Nov , Dec , Jan , Feb";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
	   }}}
			if($n == 10){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jun , Jul , Aug , Sep , Oct , Nov , Dec , Jan , Feb , Mar";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 11){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jun , Jul , Aug , Sep , Oct , Nov , Dec , Jan , Feb , Mar , Apr";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 12){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jun , Jul , Aug , Sep , Oct , Nov , Dec , Jan , Feb , Mar , Apr ,May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			break;
		case "July":
			$p = "Not Joined";		
			$sql1="update fees set June = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ss",$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set July = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jul";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set July = ?,August = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jul , Aug";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set July = ?,August = ?,September = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jul , Aug , Sep";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set July = ?,August = ?,September = ?,October = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jul , Aug , Sep , Oct";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set July = ?,August = ?,September = ?,October = ?,November = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jul , Aug , Sep , Oct , Nov";
				?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set July = ?,August = ?,September = ?,October = ?,November = ?,December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssss",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jul , Aug , Sep , Oct , Nov , Dec";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 7){
				$sql="update fees set July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jul , Aug , Sep , Oct , Nov , Dec , Jan";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 8){
				$sql="update fees set July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jul , Aug , Sep , Oct , Nov , Dec , Jan , Feb";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 9){
				$sql="update fees set July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jul , Aug , Sep , Oct , Nov , Dec , Jan , Feb , Mar";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 10){
				$sql="update fees set July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jul , Aug , Sep , Oct , Nov , Dec , Jan , Feb , Mar , Apr";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 11){
				$sql="update fees set July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jul , Aug , Sep , Oct , Nov , Dec , Jan , Feb , Mar , Apr ,May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}}}
			break;
		case "August":
			$p = "Not Joined";		
			$sql1="update fees set June = ?,July = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sss",$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set August = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Aug";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set August = ?,September = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Aug , Sep";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set August = ?,September = ?,October = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Aug , Sep , Oct";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set August = ?,September = ?,October = ?,November = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Aug , Sep , Oct , Nov";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set August = ?,September = ?,October = ?,November = ?,December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Aug , Sep , Oct , Nov , Dec";
				?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set August = ?,September = ?,October = ?,November = ?,December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssss",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Aug , Sep , Oct , Nov , Dec , Jan";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 7){
				$sql="update fees set August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?  where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Aug , Sep , Oct , Nov , Dec , Jan , Feb";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 8){
				$sql="update fees set August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Aug , Sep , Oct , Nov , Dec , Jan , Feb , Mar";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 9){
				$sql="update fees set August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Aug , Sep , Oct , Nov , Dec , Jan , Feb , Mar , Apr";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 10){
				$sql="update fees set August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Aug , Sep , Oct , Nov , Dec , Jan , Feb , Mar , Apr , May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}}}
			break;
		case "September":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssss",$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set September = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Sep";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set September = ?,October = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Sep , Oct";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set September = ?,October = ?,November = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Sep , Oct , Nov";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set September = ?,October = ?,November = ?,December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Sep , Oct , Nov , Dec";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set September = ?,October = ?,November = ?,December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Sep , Oct , Nov , Dec , Jan";
				?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set September = ?,October = ?,November = ?,December = ?,January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssss",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Sep , Oct , Nov , Dec , Jan , Feb";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 7){
				$sql="update fees set September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?  where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Sep , Oct , Nov , Dec , Jan , Feb , Mar";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 8){
				$sql="update fees set September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Sep , Oct , Nov , Dec , Jan , Feb , Mar , Apr";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 9){
				$sql="update fees set September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Sep , Oct , Nov , Dec , Jan , Feb , Mar , Apr , May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}}}
			break;
		case "October":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ?,September = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sssss",$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set October = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Oct";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set October = ?,November = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Oct , Nov";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set October = ?,November = ?,December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Oct , Nov , Dec";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set October = ?,November = ?,December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Oct , Nov , Dec , Jan";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set October = ?,November = ?,December = ?,January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Oct , Nov , Dec , Jan , Feb";
				?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set October = ?,November = ?,December = ?,January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssss",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Oct , Nov , Dec , Jan , Feb , Mar";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 7){
				$sql="update fees set October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ?  where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Oct , Nov , Dec , Jan , Feb , Mar , Apr";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 8){
				$sql="update fees set October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Oct , Nov , Dec , Jan , Feb , Mar , Apr , May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}}}
			break;
		case "November":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssssss",$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set November = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Nov";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set November = ?,December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Nov , Dec";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set November = ?,December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Nov , Dec , Jan";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set November = ?,December = ?,January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Nov , Dec , Jan , Feb";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set November = ?,December = ?,January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Nov , Dec , Jan , Feb , Mar";
				?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set November = ?,December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssss",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Nov , Dec , Jan , Feb , Mar , Apr";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 7){
				$sql="update fees set November = ?,December = ?,January = ?,February = ?,March = ?,April = ?,May = ?  where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Nov , Dec , Jan , Feb , Mar , Apr ,May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}}}
			break;
		case "December":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sssssss",$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Dec";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Dec , Jan";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set December = ?,January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Dec , Jan , Feb";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set December = ?,January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Dec , Jan , Feb , Mar";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Dec , Jan , Feb , Mar , Apr";
				?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set December = ?,January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssss",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Dec , Jan , Feb , Mar , Apr , May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}}}
			break;
		case "January":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssssssss",$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jan";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jan , Feb";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jan , Feb , Mar";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jan , Feb , Mar , Apr";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Jan , Feb , Mar , Apr , May";
				?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}}}
			break;
		case "February":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sssssssss",$p,$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Feb";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Feb , Mar";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Feb , Mar , Apr";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Feb , Mar , Apr , May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}}}
			break;
		case "March":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssssssssss",$p,$p,$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Mar";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Mar , Apr";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Mar , Apr ,May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}}}
			break;
		case "April":
			$p = "Not Joined";	
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sssssssssss",$p,$p,$p,$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Apr";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Apr , May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                     window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}}}
			break;
		case "May":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssssssssssss",$p,$p,$p,$p,$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter.php?str=<?php echo $str; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}}}
			break;
	   } 
	}
	mysqli_stmt_close($stmt2);}
	mysqli_stmt_close($stmt1);
}
else if($downp == 0){
		$sql11="insert into student values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt11=mysqli_stmt_init($con);
		if(mysqli_stmt_prepare($stmt11,$sql11)){
		mysqli_stmt_bind_param($stmt11,"sssssssdssssd",$id,$fname,$lname,$gender,$std,$med,$feemon,$actfee,$updt,$add,$gmail,$c_no,$downp);
		mysqli_stmt_execute($stmt11);
		}
		else{
			echo mysqli_error($con);
		}
		if(mysqli_affected_rows($con)>0){
		$sn = $fname." ".$lname;
		$e = "NULL";
		$sql2="insert into fees values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt2=mysqli_stmt_init($con);
		if(mysqli_stmt_prepare($stmt2,$sql2)){
			mysqli_stmt_bind_param($stmt2,"sssdssssssssssss",$id,$std,$sn,$actfee,$e,$e,$e,$e,$e,$e,$e,$e,$e,$e,$e,$e);
			mysqli_stmt_execute($stmt2);
		}
		if(mysqli_affected_rows($con)>0){
		$date = strtotime($doj);
	    $mon = date("F",$date);
	    $up = date("d/m/Y",$date);
	    $upd=  $up.", ".$name;
	   switch($mon){
		case "June":
			?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='addstudents.html';
					</script>	
			<?php
			break;
		case "July":
			$p = "Not Joined";		
			$sql1="update fees set June = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ss",$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='addstudents.html';
					</script>	
			<?php
			}}
			break;
		case "August":
			$p = "Not Joined";		
			$sql1="update fees set June = ?,July = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sss",$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='addstudents.html';
					</script>	
			<?php
			}}
			break;
		case "September":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssss",$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='addstudents.html';
					</script>	
			<?php
			}}
			break;
		case "October":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ?,September = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sssss",$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='addstudents.html';
					</script>	
			<?php
			}}
			break;
		case "November":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssssss",$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='addstudents.html';
					</script>	
			<?php
			}}
			break;
		case "December":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sssssss",$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='addstudents.html';
					</script>	
			<?php
			}}
			break;
		case "January":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssssssss",$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='addstudents.html';
					</script>	
			<?php
			}}
			break;
		case "February":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sssssssss",$p,$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='addstudents.html';
					</script>	
			<?php
			}}
			break;
		case "March":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssssssssss",$p,$p,$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='addstudents.html';
					</script>	
			<?php
			}}
			break;
		case "April":
			$p = "Not Joined";	
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sssssssssss",$p,$p,$p,$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='addstudents.html';
					</script>	
			<?php
			}}
			break;
		case "May":
			$p = "Not Joined";			
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssssssssssss",$p,$p,$p,$p,$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='addstudents.html';
					</script>	
			<?php
			}}
			break;
	   }}}}
else{
	?>
		    <script language="javascript" type="text/javascript">
		    alert("Please enter proper amount....");
            window.location='addstudents.html';    //STUDENT PAGE FOR ENTERING DETAILS
		    </script>
			<?php		
}}
if($std == 10){	
	if($downp > 0 && $downp <= $actfee){
	$sql1="insert into student values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt1=mysqli_stmt_init($con);
	if(mysqli_stmt_prepare($stmt1,$sql1)){
	 mysqli_stmt_bind_param($stmt1,"sssssssdssssd",$id,$fname,$lname,$gender,$std,$med,$feemon,$actfee,$updt,$add,$gmail,$c_no,$downp);
	 mysqli_stmt_execute($stmt1);
		}
		if(mysqli_affected_rows($con)>0){
			$sn = $fname." ".$lname;
			$e = "NULL";
			$penf = $actfee - $downp;
			$ent = $downp.", ".$updt.", ".$name.", By ".$mode;
			$sql="insert into tenthfees values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssdddssssssss",$id,$sn,$actfee,$downp,$penf,$ent,$e,$e,$e,$e,$e,$e,$e);
				mysqli_stmt_execute($stmt);
				}
				if(mysqli_affected_rows($con)>0){
					?>
				<script language="javascript" type="text/javascript">
                      //alert("Added Successfully...");
                      window.location.replace("inter4.php?&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
				</script>
				<?php
				}
				mysqli_stmt_close($stmt);
		}
		mysqli_stmt_close($stmt1);
		mysqli_close($con);
	}
	else{
	?>
		    <script language="javascript" type="text/javascript">
		    alert("Please enter proper amount....");
            window.location='addstudents.html';    //STUDENT PAGE FOR ENTERING DETAILS
		    </script>
			<?php		
}}
?>
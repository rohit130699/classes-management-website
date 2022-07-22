<?php
require('connection.php');

session_start();
$naam = $_SESSION['admin'];
if(is_null($naam)){?>
	<script language="javascript" type="text/javascript">
                      alert("Your session has been expired!Please wait for few minutes!!");
                      window.location='index.html';
    </script>
<?php
}
$std   = $_POST['stustd'];
$id    = $_POST['stuid'];
$name  = $_POST['stuname'];
$selct_month = $_POST['month'];
$amount = $_POST['amount'];
$tenure = $_POST['tenure'];
$amount1 = $_POST['amount1'];
$date = $_POST['date'];
$date1 = $_POST['date1'];
$install = $_POST['instal'];
$mod = $_POST['paymode'];
$mode = $_POST['paymod'];

$sql1="select actfees,downp from student where id = ?";
$stmt1=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt1,$sql1))
	{
     mysqli_stmt_bind_param($stmt1,"s",$id);
     mysqli_stmt_bind_result($stmt1,$actfee,$downp);
     mysqli_stmt_execute($stmt1);
	 mysqli_stmt_store_result($stmt1);
     mysqli_stmt_fetch($stmt1);
    }  
switch($selct_month){
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

if ($std != 10) {
	$s=1;
	$dat = strtotime($date);
	$dt = date("d/m/Y",$dat);
	$query_insert = "insert into amt values($s,$amount,'$dt')";
	mysqli_query($con,$query_insert);
	$date = strtotime($date);
	$mon = date("F",$date);
	$up = date("d/m/Y",$date);
	$upd= $up.", ".$naam.", "."By ".$mod;
	switch ($selct_month) 
	{
		case "June":			
			$n = $amount / $actfee;
			if($n == 1)
			{
				$sql="update fees set June = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql))	
				{
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
					if(mysqli_affected_rows($con)>0)	
					{
						$str = " Jun";
						?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	<?php
					} 
				} 
			}
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
					$str = " Jun , Jul , Aug , Sep , Oct , Nov , Dec , Jan , Feb , Mar , Apr , May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			break;
		case "July":
			$n = $amount / $actfee;
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
					$str = " Jul , Aug , Sep , Oct , Nov , Dec , Jan , Feb , Mar , Apr , May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			break;

		case "August":
			$n = $amount / $actfee;
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                     
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			break;

		case "September":
			$n = $amount / $actfee;
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                     
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			break;

		case "October":
			$n = $amount / $actfee;
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                     
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			break;

		case "November":
			$n = $amount / $actfee;
			if($n == 1){
				$sql="update fees set November = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sd",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Nov";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set November = ?,December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssd",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Nov , Dec";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set November = ?,December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssd",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Nov , Dec , Jan";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set November = ?,December = ?,January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssd",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Nov , Dec , Jan , Feb";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set November = ?,December = ?,January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssd",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Nov , Dec , Jan , Feb , Mar";
				?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");'
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set November = ?,December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssd",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Nov , Dec , Jan , Feb , Mar , Apr";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 7){
				$sql="update fees set November = ?,December = ?,January = ?,February = ?,March = ?,April = ?,May = ?  where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssd",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Nov , Dec , Jan , Feb , Mar , Apr , May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			break;

		case "December":
			$n = $amount / $actfee;
			if($n == 1){
				$sql="update fees set December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sd",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Dec";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssd",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Dec , Jan";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set December = ?,January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssd",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Dec , Jan , Feb";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set December = ?,January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssd",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Dec , Jan , Feb , Mar";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssd",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Dec , Jan , Feb , Mar , Apr";
				?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set December = ?,January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssd",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Dec , Jan , Feb , Mar , Apr , May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			break;
			
		case "January":
			$n = $amount / $actfee;
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			break;

		case "February":
			$n = $amount / $actfee;
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                     
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			break;

		case "March":
			$n = $amount / $actfee;
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
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
					$str = " Mar , Apr , May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			break;

		case "April":
			$n = $amount / $actfee;
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			if($n == 2){
				//echo "n=2";
				$sql="update fees set April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					$str = " Apr , May";
					?>
					<script language="javascript" type="text/javascript">
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}
			else{
				echo mysqli_error($con);
			}}
			break;

		case "May":
			$n = $amount / $actfee;
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
                      //alert("Updated Successfully....");                      
					  window.location.replace("inter2.php?str=<?php echo $str; ?>&mode=<?php echo $mod; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}}
			break;			
	}
}
if ($std == 10) {
	$date1 = strtotime($date1);
	$month = date("F",$date1);
	$up_date = date("d/m/Y",$date1);
	$upd= $amount1.", ".$up_date.", ".$naam.", "."By ".$mode;
	$no = $install + 1;
	$s=1;
	$dat = strtotime($date1);
	$dt = date("d/m/Y",$dat);
	$query_insert = "insert into amt1 values($s,$amount1,'$dt')";
	mysqli_query($con,$query_insert);
	$sql11="select totalfees,paidfees,pendingfees from tenthfees where st_id = ?";
	$stmt11=mysqli_stmt_init($con);
	if(mysqli_stmt_prepare($stmt11,$sql11)){
     mysqli_stmt_bind_param($stmt11,"s",$id);
     mysqli_stmt_bind_result($stmt11,$totalf,$paidf,$penf);
     mysqli_stmt_execute($stmt11);
	 mysqli_stmt_store_result($stmt11);
     mysqli_stmt_fetch($stmt11);
    }
	$paidfees = $paidf + $amount1;
	$pendingfees = $totalf - $paidfees;
	if($no == 1){
			$sql1="update tenthfees set paidfees = ?,pendingfees = ?,Installment1 = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ddss",$paidfees,$pendingfees,$upd,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      window.location.replace("inter3.php?no=<?php echo $no; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}
	}
	if($no == 2){
			$sql1="update tenthfees set paidfees = ?,pendingfees = ?,Installment2 = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ddss",$paidfees,$pendingfees,$upd,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      window.location.replace("inter3.php?no=<?php echo $no; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}
	}
	if($no == 3){
			$sql1="update tenthfees set paidfees = ?,pendingfees = ?,Installment3 = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ddss",$paidfees,$pendingfees,$upd,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      window.location.replace("inter3.php?no=<?php echo $no; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}
	}
	if($no == 4){
			$sql1="update tenthfees set paidfees = ?,pendingfees = ?,Installment4 = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ddss",$paidfees,$pendingfees,$upd,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                     window.location.replace("inter3.php?no=<?php echo $no; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}
	}
	if($no == 5){
			$sql1="update tenthfees set paidfees = ?,pendingfees = ?,Installment5 = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ddss",$paidfees,$pendingfees,$upd,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      window.location.replace("inter3.php?no=<?php echo $no; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}
	}
	if($no == 6){
			$sql1="update tenthfees set paidfees = ?,pendingfees = ?,Installment6 = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ddss",$paidfees,$pendingfees,$upd,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      window.location.replace("inter3.php?no=<?php echo $no; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}
	}
	if($no == 7){
			$sql1="update tenthfees set paidfees = ?,pendingfees = ?,Installment7 = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ddss",$paidfees,$pendingfees,$upd,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      window.location.replace("inter3.php?no=<?php echo $no; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}
	}
	if($no == 8){
			$sql1="update tenthfees set paidfees = ?,pendingfees = ?,Installment8 = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ddss",$paidfees,$pendingfees,$upd,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			?>
					<script language="javascript" type="text/javascript">
                      window.location.replace("inter3.php?no=<?php echo $no; ?>&mode=<?php echo $mode; ?>&id=<?php echo $id; ?>");
					</script>	
			<?php
			}}
	}
}

?>
<?php
require('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Fees Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/all.css"> 

  <style type="text/css">
      body{
            margin:0;
            padding: 0;
            background-color: rgb(228, 223, 245);
            width: 100%;
        }
        main{
            display: flex;
            flex-direction: column;
            text-align: center;
            justify-content: center;
            align-items: center;
        }
        .logintext{
            font-size: 1.6rem;
            margin:0;
            font-weight: 900;
            letter-spacing: 0.2rem;
            word-spacing: 0.2rem;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: rgb(34, 25, 12);
            text-shadow: 1px 1px 3px rgb(77, 71, 71);
            padding: 0.3rem;
        } 
        .form{
            padding: 1rem;
            border-radius: 2rem;
            margin:0 1rem;
            /*box-shadow: 3px 3px 6px rgb(34, 33, 33);*/
            background-color: rgb(228, 223, 245);
            width: 80%;
            text-align: center;
        }
        .inputs{
            margin: 0.7rem 0rem;
            padding: 0.5rem;
            width: 90%;
            letter-spacing: 2px;
            border: 1px solid white;
            outline: none;
            border-radius: 0.3rem;
            font-size: 0.8rem;
            background-color: white;
            color: black;
            font-weight: bold;
            font-size: 1rem;
}
        .input_flwd{
            float: left;
            width: 43%;
            margin-left: 2.6rem;
        }

        .loginbtn,.reset{
    padding: 0.5rem 2rem;
    background-color: rgb(10, 204, 70);
    border:0;
    font-weight: 600;
    outline: none;
    color: whitesmoke;
    border-radius: 10px;
    margin: 0.5rem 0 0.5rem 0;
    font-size: 1rem;
    transition: all 1s;
    cursor: pointer;
}
.reset{
    background-color: rgb(255,0,0);
}
    .h1f{    color: white;    }
    ::webkit-input-placeholder{
            color: black;

        }
        :-ms-input-placeholder{
            color: black;
        }

        ::-moz-placeholder{
            color: black;
            opacity: 1;
        }
        ::placeholder{
            color: black;
            /*opacity: 1;*/
        }

*{
    box-sizing: border-box;
}

.table{
    width: 100%;
    border-collapse: collapse;
}

.table td,.table th{
  padding:12px 15px;
  border:1px solid #ddd;
  text-align: center;
  font-size:16px;
}

.table th{
    background-color: rgb(51,51,51);
    color:#ffffff;
}

.table tbody tr:nth-child(even){
    background-color: #f5f5f5;
}

/*responsive*/

@media
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px) {
    .table thead{
        display: none;
    }

    .table, .table tbody, .table tr, .table td{
        display: block;
        width: 100%;
    }
    .table tr{
        margin-bottom:15px;
    }
    .table td{
        text-align: right;
        padding-left: 18%;
        text-align: right;
        position: relative;
    }
    .table td::before{
        content: attr(data-label);
        position: absolute;
        left:0;
        width: 50%;
        padding-left:15px;
        font-size:15px;
        font-weight: bold;
        text-align: left;
    }
}
    input[type=number]::-webkit-inner-spin-button{
            -webkit-appearence: none;
            display: none;
        }
  </style>
</head>
<body>
<form  name = "f1" method="post" class="form formData">
			<div>
					<input type="text" name="search" placeholder="Entee Student Id" class="inputs input_flwd" autocomplete="off"/>
					<input type="submit" class="loginbtn" value="Search"></input>
                    <input type="button" class="reset" onclick="window.location='admin.php'" value="Back"></input><br>
			</div>
			</form>

    <?php
		if(isset($_POST['search']) && !empty($_POST['search'])){
			$id = $_POST['search'];
			$sql="select * from fees where st_id = ?";
			$stmt=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"s",$id);
				mysqli_stmt_bind_result($stmt,$id,$std,$name,$feemon,$june,$july,$aug,$sep,$oct,$nov,$dec,$jan,$feb,$mar,$apr,$may);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$res2=mysqli_stmt_num_rows($stmt);
			}
			if($res2 >= 1){
		?>
		<table class="table">
		<thead>
		 <th>Id</th>
         <th>Name</th>
		 <th>Std</th>
		 <th>Fees</th>
         <th>June</th>
         <th>July</th>
         <th>August</th>
         <th>September</th>
         <th>October</th> 
		 <th>November</th>
		 <th>December</th>
		 <th>January</th>
		 <th>February</th>
		 <th>March</th>
		 <th>April</th>
         <th>May</th>
         </thead>
         <tbody>
		 <?php
				while(mysqli_stmt_fetch($stmt)){
	     ?>
					<tr>
					<td data-label="Id"><?=$id ;?></td>
					<td data-label="Name"><?=$name ;?></td>
					<td data-label="Std"><?=$std ;?></td>
					<td data-label="Fees"><?=$feemon ;?>per/month</td>
					<td data-label="June"><?=$june ;?></td>
					<td data-label="July"><?=$july ;?></td>
					<td data-label="August"><?=$aug ;?></td>
					<td data-label="September"><?=$sep ;?></td>
					<td data-label="October"><?=$oct ;?></td>
					<td data-label="November"><?=$nov ;?></td>
					<td data-label="December"><?=$dec ;?></td>
					<td data-label="January"><?=$jan ;?></td>
					<td data-label="February"><?=$feb ;?></td>
					<td data-label="March"><?=$mar ;?></td>
					<td data-label="April"><?=$apr ;?></td>
					<td data-label="May"><?=$may ;?></td>
					</tr>
	      <?php
				}
		  ?>
		  </tbody></table>
		  <?php
				mysqli_stmt_free_result($stmt);
				mysqli_stmt_next_result($stmt);
			}
			else{
				$sql30="select * from tenthfees where st_id = ?";
				$stmt30=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt30,$sql30)){
				mysqli_stmt_bind_param($stmt30,"s",$id);
				mysqli_stmt_bind_result($stmt30,$id,$name,$totalfees,$paidfees,$pendingfees,$Installment1,$Installment2,$Installment3,$Installment4,$Installment5,$Installment6,$Installment7,$Installment8);
				mysqli_stmt_execute($stmt30);
				mysqli_stmt_store_result($stmt30);
				$res21=mysqli_stmt_num_rows($stmt30);
				}
				if($res21 >= 1){
				?>
				<table class="table">
				<thead>
				<th>Id</th>
				<th>Name</th>
				<th>Std</th>
				<th>Total Fees</th>
				<th>Paid Fees</th>
				<th>Pending Fees</th>
				<th>Installment 1</th>
				<th>Installment 2</th>
				<th>Installment 3</th>
				<th>Installment 4</th>
				<th>Installment 5</th> 
				<th>Installment 6</th>
				<th>Installment 7</th>
				<th>Installment 8</th>
				</thead>
				<tbody>
				<?php
				while(mysqli_stmt_fetch($stmt30)){
				?>
					<td data-label="Id"><?=$id ;?></td>
					<td data-label="Name"><?=$name ;?></td>
					<td data-label="Std">10</td>
					<td data-label="Total Fees"><?=$totalfees ;?>fees/year</td>
					<td data-label="Paid Fees"><?=$paidfees ;?></td>
					<td data-label="Pending Fees"><?=$pendingfees ;?></td>
					<td data-label="Installment 1"><?=$Installment1 ;?></td>
					<td data-label="Installment 2"><?=$Installment2 ;?></td>
					<td data-label="Installment 3"><?=$Installment3 ;?></td>
					<td data-label="Installment 4"><?=$Installment4 ;?></td>
					<td data-label="Installment 5"><?=$Installment5 ;?></td>
					<td data-label="Installment 6"><?=$Installment6 ;?></td>
					<td data-label="Installment 7"><?=$Installment7 ;?></td>
					<td data-label="Installment 8"><?=$Installment8 ;?></td>
					</tr>
				<?php
				}
				?>
				</tbody></table>
				<?php
				mysqli_stmt_free_result($stmt30);
				mysqli_stmt_next_result($stmt30);
				}
				else{
				?>
				<script language="javascript" type="text/javascript">
                     alert("No such student found...");
					 window.location='feesdetails.php';
				</script>
			<?php
			}}
		}
		else{
		?>
		<table class="table">
		<thead>
		 <th>Id</th>
         <th>Name</th>
		 <th>Std</th>
		 <th>Fees</th>
         <th>June</th>
         <th>July</th>
         <th>August</th>
         <th>September</th>
         <th>October</th> 
		 <th>November</th>
		 <th>December</th>
		 <th>January</th>
		 <th>February</th>
		 <th>March</th>
		 <th>April</th>
         <th>May</th>
     </thead>
     <tbody>
		<?php
		 $sql="select * from fees";
         $stmt2=mysqli_stmt_init($con);
		 if(mysqli_stmt_prepare($stmt2,$sql)){
			mysqli_stmt_execute($stmt2);
			$r = mysqli_stmt_get_result($stmt2);
			}
		 if($r){
			while($result1 = mysqli_fetch_assoc($r)){
		?>
					<tr>
					<td data-label="Id"><?=$result1['st_id'] ;?></td>
					<td data-label="Name"><?=$result1['Name'] ;?></td>
					<td data-label="Std"><?=$result1['std'] ;?></td>
					<td data-label="Fees"><?=$result1['feemon'] ;?>fees/month</td>
					<td data-label="June"><?=$result1['June'] ;?></td>
					<td data-label="July"><?=$result1['July'] ;?></td>
					<td data-label="August"><?=$result1['August'] ;?></td>
					<td data-label="September"><?=$result1['September'] ;?></td>
					<td data-label="October"><?=$result1['October'] ;?></td>
					<td data-label="November"><?=$result1['November'] ;?></td>
					<td data-label="December"><?=$result1['December'] ;?></td>
					<td data-label="January"><?=$result1['January'] ;?></td>
					<td data-label="February"><?=$result1['February'] ;?></td>
					<td data-label="March"><?=$result1['March'] ;?></td>
					<td data-label="April"><?=$result1['April'] ;?></td>
					<td data-label="May"><?=$result1['May'] ;?></td>
					</tr>
	<?php
				}}
			mysqli_stmt_free_result($stmt2);
			mysqli_stmt_next_result($stmt2);					 
    ?> 
		</tbody></table>
		<table class="table">
		<thead>
		 <th>Id</th>
         <th>Name</th>
		 <th>Std</th>
		 <th>Total Fees</th>
		 <th>Paid Fees</th>
		 <th>Pending Fees</th>
         <th>Installment 1</th>
         <th>Installment 2</th>
         <th>Installment 3</th>
         <th>Installment 4</th>
         <th>Installment 5</th> 
		 <th>Installment 6</th>
		 <th>Installment 7</th>
		 <th>Installment 8</th>
     </thead>
     <tbody>
	 <?php
		 $sql8="select * from tenthfees";
         $stmt8=mysqli_stmt_init($con);
		 if(mysqli_stmt_prepare($stmt8,$sql8)){
			mysqli_stmt_execute($stmt8);
			$r1 = mysqli_stmt_get_result($stmt8);
			}
		 if($r1){
			while($result11 = mysqli_fetch_assoc($r1)){
		?>
					<tr>
					<td data-label="Id"><?=$result11['st_id'] ;?></td>
					<td data-label="Name"><?=$result11['name'] ;?></td>
					<td data-label="Std">10</td>
					<td data-label="Total Fees"><?=$result11['totalfees'] ;?>fees/year</td>
					<td data-label="Paid Fees"><?=$result11['paidfees'] ;?></td>
					<td data-label="Pending Fees"><?=$result11['pendingfees'] ;?></td>
					<td data-label="Installment 1"><?=$result11['Installment1'] ;?></td>
					<td data-label="Installment 2"><?=$result11['Installment2'] ;?></td>
					<td data-label="Installment 3"><?=$result11['Installment3'] ;?></td>
					<td data-label="Installment 4"><?=$result11['Installment4'] ;?></td>
					<td data-label="Installment 5"><?=$result11['Installment5'] ;?></td>
					<td data-label="Installment 6"><?=$result11['Installment6'] ;?></td>
					<td data-label="Installment 7"><?=$result11['Installment7'] ;?></td>
					<td data-label="Installment 8"><?=$result11['Installment8'] ;?></td>
					</tr>
	<?php
				}}
			mysqli_stmt_free_result($stmt8);
			mysqli_stmt_next_result($stmt8);
	?>
     </tbody>
   </table>
	<?php
		}
	?>
</body>
</html>
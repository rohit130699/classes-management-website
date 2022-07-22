<?php
require('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/all.css"> 
  <link rel="stylesheet" href="style.css"/>

  <style type="text/css">
      body{
    margin:0;
    padding:20px;
    font-family: sans-serif;
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

    .edit{
        color: purple;
        font-size: 1.2rem;
    }
    .delete{
        color: red;
        font-size: 1.2rem;
    }
    .updtbtn,.deletebtn{
        background-color: transparent;
        border: none;
        outline: none;
        font-size: 1.2rem;
        cursor: pointer;
    }

  </style>
</head>
    <h1>Student Details</h1>

     <table class="table">
     <thead>
     <th>ID</th>
     <th>Name</th>
	 <th>Gender</th>
	 <th>Standard</th>
	 <th>Medium</th>
	 <th>Actual Fees</th>
	 <th>Date of joing</th>
	 <th>Address</th>
	 <th>Email</th>
	 <th>Contact Number</th>
	 <th>Downpayment</th>
	 <th colspan="2">Management</th>
             
         
     </thead>
     <tbody>

    <?php

            $sql = "select * from student";
            $query = mysqli_query($con,$sql);
            $num_rows = mysqli_num_rows($query);
            //  echo $num_rows;
            
            if ($num_rows > 0) {
                while (  $result = mysqli_fetch_array($query) ) {
                   $name = $result['fname'].' '.$result['lname'];
                    if($result['std'] == "10"){
						$e="fees/year";
					}
					else{
						$e="fees/month";
					}
                   
    ?>

            <tr>
              	<td data-label="ID"><?=$result['id']; ?></td>
              	<td data-label="Name"> <?=$name ;?> </td>
				<td data-label="Gender"> <?=$result['gender']; ?> </td>
				<td data-label="Standard"> <?=$result['std']; ?> </td>
				<td data-label="Medium"> <?=$result['med']; ?> </td>			
				<td data-label="ActFees"> <?=$result['actfees']; ?><?=$e ;?> </td>
				<td data-label="Date Of Joing"> <?=$result['doj']; ?> </td>
				<td data-label="Address"> <?=$result['addr']; ?> </td>
				<td data-label="Email"> <?=$result['gmail']; ?> </td>
				<td data-label="Contact Number"> <?=$result['c_no']; ?> </td>
				<td data-label="Downpayment">Rs. <?=$result['downp']; ?> </td>
               	<td data-label="Management">
               	 <a href = "update_student.php?tid=<?=$usnm;?>" >
                    <button value="Update" class="updtbtn">
                        <i class="fas fa-user-edit edit"></i>
                    </button>
                </a>
              </td>
              <td data-label="Management">
                <a href = "student_delete.php?tid=<?=$result['id'];?>" 
                    onclick="if(!confirm( 'Are you sure you want to Delete Student Details <?php echo "$name"; ?> ??' )) {return false;}" >
                    <button value="Delete" class="deletebtn">
                        <i class="fas fa-trash-alt delete"></i>
                    </button>
                </a>
              </td>
            </tr>

    <?php
                }
            }
               
    ?>
  
     </tbody>
   </table>

</body>
</html>
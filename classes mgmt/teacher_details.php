<?php
require('connection.php');
?>


<!DOCTYPE html>
<html>
<head>
  <title>Teacher Details</title>
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
    background-color: rgb(228, 223, 245);
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
<body>
    <h1>Teacher Details</h1>

     <table class="table">
     <thead>
         <th>Name</th>
         <th>Contact Number</th>
         <th>Email</th>
         <th>Qualification</th>
         <th>Experience</th>
         <th>Username</th>
         <th>Password</th>
         <th colspan="2">Management</th>    
         
     </thead>
     <tbody>

    <?php

            $sql = "select * from teacher";
            $query = mysqli_query($con,$sql);
            $num_rows = mysqli_num_rows($query);
            //  echo $num_rows;
            
            if ($num_rows > 0) {
                while (  $result = mysqli_fetch_array($query) ) {
                        $name = $result['fname'].' '.$result['lname'];
                        // echo "$name";    
                $usnm = $result['uname'];
                   
    ?>

            <tr>
              <td data-label="Name"><?=$name; ?></td>
              <td data-label="Contact Number"> <?=$result['c_no']; ?> </td>
              <td data-label="Email"> <?=$result['gmail']; ?> </td>
              <td data-label="Qualification"> <?=$result['qualification']; ?> </td>
              <td data-label="Experience"> <?=$result['experience']; ?> </td>
              <td data-label="Username"> <?=$result['uname']; ?> </td>
              <td data-label="Password"> <?=$result['upass']; ?> </td>
              <td data-label="Management">
                <a href = "update_teacher.php?tid=<?=$usnm;?>" >
                    <button value="Update" class="updtbtn">
                        <i class="fas fa-user-edit edit"></i>
                    </button>
                </a>
              </td>
              <td data-label="Management">
                <a href = "delete_teacher.php?tid=<?=$usnm;?>" 
                    onclick="if(!confirm( 'Are you sure you want to Delete Teacher with name <?php echo "$name"; ?> ??' )) {return false;}" >
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
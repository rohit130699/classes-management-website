<?php
require('connection.php');

$id     =$_POST['stu_id'];
$fname  =$_POST['fname'];
$lname  =$_POST['lname'];
$std    =$_POST['std'];

$sql1="select June,July,August,September,October,November,December,January,February,March,April,May,feemon,Name,std from fees where st_id = ?";
$stmt1=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt1,$sql1)){
     mysqli_stmt_bind_param($stmt1,"s",$id);
     mysqli_stmt_bind_result($stmt1,$june,$july,$aug,$sep,$oct,$nov,$dec,$jan,$feb,$mar,$apr,$may,$feemon,$stu_name,$stu_std);
     mysqli_stmt_execute($stmt1);
	 mysqli_stmt_store_result($stmt1);
     mysqli_stmt_fetch($stmt1);
    }   
if($june != "Not Joined" && $june != "NULL"){
    $mon = "June";
}   
if($july != "Not Joined" && $july != "NULL"){
    $mon = "July";
}   
if($aug != "Not Joined" && $aug != "NULL"){
    $mon = "August";
}   
if($sep != "Not Joined" && $sep != "NULL"){
    $mon = "September";
}   
if($oct != "Not Joined" && $oct != "NULL"){
    $mon = "October";
}   
if($nov != "Not Joined" && $nov != "NULL"){
    $mon = "November";
}   
if($dec != "Not Joined" && $dec != "NULL"){
    $mon = "December";
}   
if($jan != "Not Joined" && $jan != "NULL"){
    $mon = "January";
}   
if($feb != "Not Joined" && $feb != "NULL"){
    $mon = "February";
}   
if($mar != "Not Joined" && $mar != "NULL"){
    $mon = "March";
}   
if($apr != "Not Joined" && $apr != "NULL"){
    $mon = "April";
}   
if($may != "Not Joined" && $may != "NULL"){
    $mon = "May";
} 

if($june == "NULL" && $july == "NULL" && $aug == "NULL" && $sep == "NULL" && $oct == "NULL" && $nov == "NULL" && $dec == "NULL" && $jan == "NULL" && $feb == "NULL" && $mar == "NULL" && $apr == "NULL" && $may == "NULL"){
	$mon = "Joined in June";
}
else if($june == "Not Joined" && $july == "NULL" && $aug == "NULL" && $sep == "NULL" && $oct == "NULL" && $nov == "NULL" && $dec == "NULL" && $jan == "NULL" && $feb == "NULL" && $mar == "NULL" && $apr == "NULL" && $may == "NULL"){
	$mon = "Joined in July";
}
else if($june == "Not Joined" && $july == "Not Joined" && $aug == "NULL" && $sep == "NULL" && $oct == "NULL" && $nov == "NULL" && $dec == "NULL" && $jan == "NULL" && $feb == "NULL" && $mar == "NULL" && $apr == "NULL" && $may == "NULL"){
	$mon = "Joined in Aug";
}
else if($june == "Not Joined" && $july == "Not Joined" && $aug == "Not Joined" && $sep == "NULL" && $oct == "NULL" && $nov == "NULL" && $dec == "NULL" && $jan == "NULL" && $feb == "NULL" && $mar == "NULL" && $apr == "NULL" && $may == "NULL"){
	$mon = "Joined in Sept";
} 
else if($june == "Not Joined" && $july == "Not Joined" && $aug == "Not Joined" && $sep == "Not Joined" && $oct == "NULL" && $nov == "NULL" && $dec == "NULL" && $jan == "NULL" && $feb == "NULL" && $mar == "NULL" && $apr == "NULL" && $may == "NULL"){
	$mon = "Joined in Oct";
} 
else if($june == "Not Joined" && $july == "Not Joined" && $aug == "Not Joined" && $sep == "Not Joined" && $oct == "Not Joined" && $nov == "NULL" && $dec == "NULL" && $jan == "NULL" && $feb == "NULL" && $mar == "NULL" && $apr == "NULL" && $may == "NULL"){
	$mon = "Joined in Nov";
} 
else if($june == "Not Joined" && $july == "Not Joined" && $aug == "Not Joined" && $sep == "Not Joined" && $oct == "Not Joined" && $nov == "Not Joined" && $dec == "NULL" && $jan == "NULL" && $feb == "NULL" && $mar == "NULL" && $apr == "NULL" && $may == "NULL"){
	$mon = "Joined in Dec";
} 
else if($june == "Not Joined" && $july == "Not Joined" && $aug == "Not Joined" && $sep == "Not Joined" && $oct == "Not Joined" && $nov == "Not Joined" && $dec == "Not Joined" && $jan == "NULL" && $feb == "NULL" && $mar == "NULL" && $apr == "NULL" && $may == "NULL"){
	$mon = "Joined in Jan";
} 
else if($june == "Not Joined" && $july == "Not Joined" && $aug == "Not Joined" && $sep == "Not Joined" && $oct == "Not Joined" && $nov == "Not Joined" && $dec == "Not Joined" && $jan == "Not Joined" && $feb == "NULL" && $mar == "NULL" && $apr == "NULL" && $may == "NULL"){
	$mon = "Joined in Feb";
} 
else if($june == "Not Joined" && $july == "Not Joined" && $aug == "Not Joined" && $sep == "Not Joined" && $oct == "Not Joined" && $nov == "Not Joined" && $dec == "Not Joined" && $jan == "Not Joined" && $feb == "Not Joined" && $mar == "NULL" && $apr == "NULL" && $may == "NULL"){
	$mon = "Joined in Mar";
} 
else if($june == "Not Joined" && $july == "Not Joined" && $aug == "Not Joined" && $sep == "Not Joined" && $oct == "Not Joined" && $nov == "Not Joined" && $dec == "Not Joined" && $jan == "Not Joined" && $feb == "Not Joined" && $mar == "Not Joined" && $apr == "NULL" && $may == "NULL"){
	$mon = "Joined in Apr";
} 
else if($june == "Not Joined" && $july == "Not Joined" && $aug == "Not Joined" && $sep == "Not Joined" && $oct == "Not Joined" && $nov == "Not Joined" && $dec == "Not Joined" && $jan == "Not Joined" && $feb == "Not Joined" && $mar == "Not Joined" && $apr == "Not Joined" && $may == "NULL"){
	$mon = "Joined in May";
} 
$fee = $feemon." fees/month";
 // echo " <br> $fee <br> $feemon $mon $stu_name";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees Deposits</title>
	<link rel="stylesheet" type="text/css" href="js/jquery-ui.min.css">
    <style>
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
            box-sizing: border-box;
        }
         .logintext{
            color: white;
         }
           .form{
            padding: 1rem;
            border-radius: 1rem;
            margin:0 2rem;
            box-shadow: 3px 3px 6px rgb(34, 33, 33);
            background-color: rgb(69, 76, 110);
        }

        .inputs{
            margin: 1rem 0;
            padding: 0.5rem;
            width: 100%;
            letter-spacing: 2px;
            border: 1px solid white;
            outline: none;
            border-radius: 0.3rem;
            font-size: 1rem;
            background-color: white;
            color: black;
            font-weight: bold;
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
            margin: 0.5rem 0.8rem 0;
            font-size: 1rem;
            transition: all 1s;
            cursor: pointer;
        }
        .reset{
            background-color: rgb(255, 0, 0);
        }

         .toggle-div{
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
            }
            .toggle-div input{
                position: absolute;
                height: 1px;
                width: 1px;
                border: none;
                overflow: hidden;
            }
            .toggle-div label{
                background-color: rgb(226, 209, 209);
                color: black;
                font-size: 1.1rem;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                font-weight: 900;
                text-align: center;
                padding: 5px 10px;
                transition: all 0.2s ease-in-out;
            }
            .toggle-div label:hover{
                cursor: pointer;
            }
            .toggle-div input:checked + label{
                background-color: rgb(51, 51, 51);
                color: cornsilk;
            }
            .toggle-div label:first-of-type{
                border-radius: 6px 0 0 6px;
            }
            .toggle-div label:last-of-type{
                border-radius:0 6px 6px 0;
            }

            .select{
                width: 44%;
            }
            .sel2{
                margin-left: 45px;
            }
            .add{
                width: 90.5%;
                margin-right: 35px;
            }

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

        input[type=number]::-webkit-inner-spin-button{
            -webkit-appearence: none;
            display: none;
        }
        .val{
            color: black;
        }
        .fees{
            width: 40%;
            
        }
        .lbl{
            width: 19%;
        }
        .lbl2{
            width: 21.5%;
            margin-top: 16px;
            margin-left: 15px; 
        }
        .lbl3{
            width: 20.5%;
        }
		.lbl4{
            width: 20.5%;
			margin-left: 43px;
        }
        .lbl32{
            width: 21.5%;
            margin-left: 16.5px;
        }
		.lbl34{
            width: 21.5%;
            margin-left: 15px;
        }
		.lbl35{
            width: 21.5%;
            margin-left: 40px;
        }
		.lbl36{
            width: 20.5%;
            margin-left: 15px;
        }
		.footer{
			align:center;
		}

        @media(max-width:720px){
            .mainName{
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 1px;
            padding: 0.3rem;
            transform: rotate(-5deg);
            }

            .inputs{
            margin: 0.5rem 0rem;
            padding: 0.5rem;
            width: 94%;
            letter-spacing: 0.5px;
            border: 1px solid white;
            outline: none;
            border-radius: 0.3rem;
            font-size: 0.8rem;
            background-color: white;
            color: black;
            font-weight: bold;
            font-size: 1rem;
            }

            .lbl{
            width: 94%;
            }
            .lbl2{
            width: 94%;
            
            }
			.lbl4{
            width: 99.9%;
			}
			.lbl34{
            width: 99.9%;
			}
            .sel2{
                margin-left: 10px;
            }
			.smal{
				letter-spacing:0px;
			}
    }


    </style>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script>
		$(document).ready(function(){
		$("#dat").datepicker({dateFormat:'yy-mm-dd'});
		$("#da").datepicker({dateFormat:'yy-mm-dd'});
		});
</script>
<script>
function mont(data){
   var mon = "<?php echo $mon ;?>";
   var month=document.forms["f1"]["month"];
   var opt = month.options[month.selectedIndex];
   if(mon === "July"){
	   if(opt.text === "June"){
		   alert("Already paid for "+opt.text);
   }}
   if(mon === "August"){
	   if(opt.text === "June" || opt.text === "July"){
		   alert("Already paid for "+opt.text);
	   }}	   
   if(mon === "September"){
	   if(opt.text === "June" || opt.text === "July" || opt.text === "August"){
		   alert("Already paid for "+opt.text);
	   }
   }
   if(mon === "October"){
	   if(opt.text === "June" || opt.text === "July" || opt.text === "August" || opt.text === "September"){
		   alert("Already paid for "+opt.text);
	   }
   }
   if(mon === "November"){
	   if(opt.text === "June" || opt.text === "July" || opt.text === "August" || opt.text === "September" || opt.text === "October"){
		   alert("Already paid for "+opt.text);
	   }
   }
    if(mon === "December"){
	   if(opt.text === "June" || opt.text === "July" || opt.text === "August" || opt.text === "September" || opt.text === "October" || opt.text === "November"){
		   alert("Already paid for "+opt.text);
	   }
   }
   if(mon === "January"){
	   if(opt.text === "June" || opt.text === "July" || opt.text === "August" || opt.text === "September" || opt.text === "October" || opt.text === "November" || opt.text === "December"){
		   alert("Already paid for "+opt.text);
	   }
   }
   if(mon === "February"){
	   if(opt.text === "June" || opt.text === "July" || opt.text === "August" || opt.text === "September" || opt.text === "October" || opt.text === "November" || opt.text === "December" || opt.text === "January"){
		   alert("Already paid for "+opt.text);
	   }
   }
   if(mon === "March"){
	   if(opt.text === "June" || opt.text === "July" || opt.text === "August" || opt.text === "September" || opt.text === "October" || opt.text === "November" || opt.text === "December" || opt.text === "January" || opt.text === "February"){
		   alert("Already paid for "+opt.text);
	   }
   }
   if(mon === "April"){
	   if(opt.text === "June" || opt.text === "July" || opt.text === "August" || opt.text === "September" || opt.text === "October" || opt.text === "November" || opt.text === "December" || opt.text === "January" || opt.text === "February" || opt.text === "March"){
		   alert("Already paid for "+opt.text);
	   }
   }
   if(mon === "May"){
	   if(opt.text === "June" || opt.text === "July" || opt.text === "August" || opt.text === "September" || opt.text === "October" || opt.text === "November" || opt.text === "December" || opt.text === "January" || opt.text === "February" || opt.text === "March" || opt.text === "April"){
		   alert("ghhjhkkh");
	   }
   }
}
</script>
</head>
<body>
<?php
$sql3="select st_id,name,totalfees,paidfees,pendingfees,Installment1,Installment2,Installment3,Installment4,Installment5,Installment6,Installment7,Installment8 from tenthfees where st_id = ?";
$stmt3=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt3,$sql3)){
     mysqli_stmt_bind_param($stmt3,"s",$id);
     mysqli_stmt_bind_result($stmt3,$sid,$name,$totalfees,$paidfees,$pendingfees,$Installment1,$Installment2,$Installment3,$Installment4,$Installment5,$Installment6,$Installment7,$Installment8);
     mysqli_stmt_execute($stmt3);
	 mysqli_stmt_store_result($stmt3);
     mysqli_stmt_fetch($stmt3);
    }
	else{
		echo mysqli_error($con);
	}
$no = 0;
if($Installment1 != "NULL"){
    $install = "Installment1";
	$no = 1;
}   
if($Installment2 != "NULL"){
    $install = "Installment2";
	$no = 2;
}
if($Installment3 != "NULL"){
    $install = "Installment3";
	$no = 3;
}
if($Installment4 != "NULL"){
    $install = "Installment4";
	$no = 4;
}
if($Installment5 != "NULL"){
    $install = "Installment5";
	$no = 5;
}
if($Installment6 != "NULL"){
    $install = "Installment6";
	$no = 6;
}
if($Installment7 != "NULL"){
    $install = "Installment7";
	$no = 7;
}
if($Installment8 != "NULL"){
    $install = "Installment8";
	$no = 8;
}

?>
    <header>  
        <main>
           <br><br>
            <form class="form formData" name="f1" action = "feespayupdate.php" method="post">
                <img src="img/cash-payment.png" alt="" class="us-pic" height="130px" width="135px">
                <h1 class="logintext">Enter Fees Payment Details</h1>
				<input type="hidden" name="stustd" value="<?php echo $std;  ?>" readonly />
                <input type="hidden" name="stuid" value="<?php echo $id;  ?>" readonly />
                <input type="hidden" name="stuname" value="<?php echo $stu_name;  ?>" readonly />
				<input type="hidden" name="instal" value="<?php echo $no;  ?>" readonly />
				<?php
				if($std != 10){
				?>
                <div class="names">
				<input type="text" name="" class="inputs input_flwd" value="Name: <?php echo $stu_name; ?>" required readonly />
				 <input type="text" name="" class="inputs input_flwd smal" value="Id: <?php echo $id; ?> " required readonly />
                                      
                </div>
                <div class="ids">
                   <input type="text" name="" class="inputs input_flwd smal" value="Paid Uptill Month: <?php echo "$mon"; ?> " required readonly />
                   <div>
                        <input type="text" name="" class="inputs input_flwd lbl3" value="Paid Per Month :Rs. <?php echo "$feemon"; ?> " required readonly />
                        
                        <select name="paymode" class="inputs input_flwd se lbl34" onchange=" " required>
                            <option class="val" value="">Select Payment Mode</option>
                            <option class="val" value="Cash">Cash</option>
                            <option class="val" value="Cheque">Cheque</option>
                        </select>
                   </div>

                    <input type="number" min="1" name="amount" pattern="[0-9]+" placeholder="Enter Payment Amount" 
                    class="inputs input_flwd lbl" required/>
                   
                    <input type="number" min="1" name="tenure" pattern="[0-9]+" placeholder="Number of Payment Months" 
                    class="inputs input_flwd lbl2" required/>

                </div>
                <div class="academics">
                    <select name="month" class="inputs input_flwd select lbl4" onchange="mont(this.value)" required>
                    <option class="val" value="">Select Payment Month</option>
					<option class="val" value="June">June</option>
					<option class="val" value="July">July</option>
                    <option class="val" value="August">August</option>
                    <option class="val" value="September">September</option>
                    <option class="val" value="October">October</option>
                    <option class="val" value="November">November</option>
                    <option class="val" value="December">December</option>
                    <option class="val" value="January">January</option>
                    <option class="val" value="February">February</option>
                    <option class="val" value="March">March</option>
                    <option class="val" value="April">April</option>
                    <option class="val" value="May">May</option>
                    </select>
					<input type = "hidden" name = "amount1">
					<input type = "hidden" name = "date1">
					<input type = "hidden" name = "paymod">
					<input type="text" name="date" id="dat" class="inputs input_flwd lbl32" placeholder="Click here to select Date" autocomplete="off" required />
                </div>
				<?php
				}
				else{
				?>
				<div class="names">
				<input type="text" name="" class="inputs input_flwd" value="Name: <?php echo $name; ?>" required readonly />
				 <input type="text" name="" class="inputs input_flwd smal" value="Id: <?php echo $id; ?> " required readonly />
                                      
                </div>
                <div class="ids">
                   <input type="text" name="" class="inputs input_flwd" value="Total Fees: Rs.<?php echo "$totalfees"; ?> " required readonly />
                   <input type="text" name="" class="inputs input_flwd" value="Paid Fees: Rs.<?php echo "$paidfees"; ?> " required readonly />
				   <input type="text" name="" class="inputs input_flwd" value="Pending Fees: Rs.<?php echo "$pendingfees"; ?> " required readonly />
				   <input type="text" name="" class="inputs input_flwd" value="Last Installment: <?php echo "$install"; ?> " required readonly />
                    <input type="number" min="1" name="amount1" pattern="[0-9]+" placeholder="Enter Payment Amount" 
                    class="inputs input_flwd" required/>
					<input type = "hidden" name = "amount">
					<input type = "hidden" name = "tenure">
					<input type = "hidden" name = "date">
					<input type = "hidden" name = "paymode">
					<input type = "hidden" name = "month">
					<select name="paymod" class="inputs input_flwd se lbl35" onchange=" " required>
                            <option class="val" value="">Select Payment Mode</option>
                            <option class="val" value="Cash">Cash</option>
                            <option class="val" value="Cheque">Cheque</option>
                    </select>
					<input type="text" name="date1" id="da" class="inputs input_flwd lbl36" placeholder="Click here to select Date" autocomplete="off" required />
                </div>
                    
				<?php
				}
				?>
				<div class="footer">
                    <button class="loginbtn" onclick="test()">Update Details</button><br>
                    <input class="reset" type="reset" value="Reset"/>
				</div>
            </form>
            <br>
         </main>
    </header>
</body>
</html>
<?php
require('connection.php');
$req_usnm = $_REQUEST['tid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher Details</title>
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
            background-color: rgb(69, 76, 110);
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


    @media(max-width:720px){
            .mainName{
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 1px;
            padding: 0.3rem;
            transform: rotate(-5deg);
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
    }
    input[type=number]::-webkit-inner-spin-button{
            -webkit-appearence: none;
            display: none;
        }
    </style>
</head>
<body>
<?php			 
$sql="select fname,lname,c_no,gmail,qualification,experience,uname,upass from teacher where uname=?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"s",$req_usnm);
	mysqli_stmt_bind_result($stmt,$fname,$lname,$c_no,$gmail,$quali,$exp,$uname,$upass);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_fetch($stmt);
}?>
    <header>
       <!--  <nav><div class="mainName">S.N. Classes</div>
            <div class="statement">Your Way to manage the Classes....</div>
        </nav> -->

        <main>
            <!-- <h2 class="logintext">Add New Teacher Details.</h2> -->
            <br><br>
            <form class="form formData" action="update_teacherdata.php?tid=<?=$req_usnm;?>" method="POST" onsubmit="return update_test()" name="f1">
                <img src="img/teacher.png" alt="" class="us-pic" >
                <h1 class="h1f">Update Teacher Details</h1>
                <div class="credentials">
                    <input type="text" name="tunm" placeholder="Enter Teacher Username" value="<?php echo $uname ; ?>"
                     class="inputs input_flwd" required autocomplete="off"/>
                    <input type="text" name="tpwd" placeholder="Enter Password" value="<?php echo $upass ; ?>" class="inputs input_flwd" required autocomplete="off"/>
                </div>
                <div class="names ">
                    <input type="text" name="tfname" pattern="[A-Za-z]{1,30}" title="Please enter valid name eg(Rahul)" placeholder="Enter Teacher First Name" class="inputs input_flwd" value="<?php echo $fname ; ?>" required autocomplete="off"/>
                    <input type="text" name="tlname" pattern="[A-Za-z]{1,30}" title="Please enter valid name eg(Singh)" placeholder="Enter Teacher Last Name" class="inputs input_flwd" value="<?php echo $lname ; ?>" required autocomplete="off"/>
                </div>
                <div class="contacts">
                    <input type="text" name="tnumber" pattern="[9876][0-9]{9}" title="Enter a valid Number" placeholder="Enter Teacher Phone Number" class="inputs input_flwd" value="<?php echo $c_no ; ?>" required autocomplete="off"/>
                    <input type="email" name="email" placeholder="Enter Teacher Email ID" class="inputs input_flwd" value="<?php echo $gmail ; ?>" required autocomplete="off"/>
                </div>
                <div class="qualifications">
                    <input type="text" name="tqualify" placeholder="Enter Teacher Qualification" class="inputs input_flwd" value="<?php echo $quali ; ?>" required autocomplete="off"/>
                    <input type="text" name="texp" placeholder="Enter Teaching Experience" class="inputs input_flwd" value="<?php echo $exp ; ?>" required autocomplete="off"/>
                </div>
                
                    <button class="loginbtn">Update</button><br>
                    <input class="reset" type="reset" value="Reset"/>
            </form>
				<script type="text/javascript" language = "javascript">
	function update_test(){
		//Checking whether database entries match with form input fields in order to check whether any changes are performed or not.....
        var uname=document.forms["f1"]["tunm"];
        var upass=document.forms["f1"]["tpwd"];
        var fname=document.forms["f1"]["tfname"];
        var lname=document.forms["f1"]["tlname"];
        var c_no=document.forms["f1"]["tnumber"];
		var gmail=document.forms["f1"]["email"];
		var quali=document.forms["f1"]["tqualify"];
		var exp=document.forms["f1"]["texp"];
        if(uname.value === "<?php echo $uname ;?>" && upass.value === "<?php echo $upass ;?>" && fname.value === "<?php echo $fname ;?>" && lname.value === "<?php echo $lname ;?>" && c_no.value === "<?php echo $c_no ;?>" && gmail.value === "<?php echo $gmail ;?>" && quali.value === "<?php echo $quali ;?>" && exp.value === "<?php echo $exp ;?>"){
			alert("No Updation performed yet.......");
            return false;
		}  
		return true;
	}
</script>
            <br>
         </main>
    </header>
  <!--   <script>
        const btn=document.querySelector(".loginbtn");
        btn.addEventListener("click",()=>{
            window.location.href="createStudent.html";
        })
    </script> -->
</body>
</html>
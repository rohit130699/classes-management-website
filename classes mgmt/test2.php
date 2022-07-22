<?php
require('connection.php');

$no = $_REQUEST['no'];
$mode = $_REQUEST['mode'];
$id = $_REQUEST['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
			width:15%;
			height:20%;
        }
        .reset{
            background-color: rgb(255, 0, 0);
        }
		h3{
			color:blue;
			font-size:30px;
		}
        @media(max-width:720px){
            .mainName{
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 1px;
            padding: 0.3rem;
            transform: rotate(-5deg);
            }
		.loginbtn,.reset{
            padding: 0.5rem 1rem;
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
			width:50%;
			height:15%;
        }
		.reset{
            background-color: rgb(255, 0, 0);
        }
		h3{
			color:blue;
			font-size:20px;
		}
    }
	</style>
</head>
<body>
			<form action="pdfinvoice2.php" method="post" name="f1">
           <br><br><center>
		   <h3>Updated Sussessfully.......</h3>
		   <h3>Click on 'DOWNLOAD PDF' to download Receipt PDF...</h3>
		   <input type="hidden" name="no" value="<?php echo $no; ?>">
		   <input type="hidden" name="mode" value="<?php echo $mode; ?>">
		   <input type="hidden" name="sid" value="<?php echo $id; ?>">
                    <input type="submit" class="loginbtn" value="DOWNLOAD PDF"><br><br>
                    <button type="button" class="reset" onclick="window.location='admin.php'">GO BACK</button>
					</center>
			</form>
            
</body>
</html>
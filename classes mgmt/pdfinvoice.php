<?php
require('connection.php');
require('C:/xampp/htdocs/fpdf/fpdf.php');
session_start();
$name = $_SESSION['admin'];
if(is_null($name)){?>
	<script language="javascript" type="text/javascript">
                      alert("Your session has been expired!Please wait for few minutes!!");
                      window.location='index.html';
    </script>
<?php
}

$str = $_POST['str'];
$mode = $_POST['mode'];
$id = $_POST['sid'];
$m = "By ".$mode;


$sql = "select fname,lname from admin where uname=?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"s",$name);
	mysqli_stmt_bind_result($stmt,$fname,$lname);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	mysqli_stmt_fetch($stmt);
	$naam = $fname." ".$lname;
}
	
//echo "$str<br>$mode<br>$id";
$sql1="select id,fname,lname,std,actfees,doj,downp from student where id = ?";
$stmt1=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt1,$sql1)){
     mysqli_stmt_bind_param($stmt1,"s",$id);
     mysqli_stmt_bind_result($stmt1,$sid,$fname,$lname,$std,$actfees,$doj,$downp);
     mysqli_stmt_execute($stmt1);
	 mysqli_stmt_store_result($stmt1);
     mysqli_stmt_fetch($stmt1);
    }
else{
	echo mysqli_error($con);
}
$n = $fname." ".$lname;
$w=1;
$sql4="select num from receipt where id = ?";
$stmt4=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt4,$sql4)){
     mysqli_stmt_bind_param($stmt4,"d",$w);
     mysqli_stmt_bind_result($stmt4,$num);
     mysqli_stmt_execute($stmt4);
	 mysqli_stmt_store_result($stmt4);
     mysqli_stmt_fetch($stmt4);
    }

$recno = "SNC".$num;
	
$npdf = $recno."_".$naam."_of std ".$std.".pdf";
class PDF extends FPDF{
    function header()
    {
        $this -> Cell(190,107,'',1,0);
		$this -> Image('img/watermark.png',70,58,70,50);
       $this-> Image('img/snclass.png',17,12,-365);  
        $this -> SetFont('Times','B','10');  
        
        $this -> Cell(210,1,'',0,1);
        $this -> Cell(41,5,'',0,0);
        $this -> Cell(100,5,' "The Knowledge Hub" ',0,1);  
        $this -> Cell(210,1,'',0,1);

       //$this -> SetDrawColor(58,255,58);
        $this -> SetTextColor(255,0,0);
        $this -> SetFont('Arial','B','25');   
        $this -> Cell(200,5,'S.N. COACHING CLASSES',0,1,'C');
        $this -> SetTextColor(0,0,0);
        $this -> SetFont('Times','I','10');  
        $this -> Cell(210,1,'',0,1);
        $this -> Cell(75,5,'',0,0);
        $this -> Cell(100,5,' "Education - Your Door To The Future" ',0,1,'C');  
        
        
        
        $this -> SetFont('Times','B','11');   
        $this -> Cell(200,5,'Contact No : 8793853204 / 9011660075',0,1,'C');
        $this -> SetFont('Times','BU','11');   
        $this -> Cell(200,5,' Email : nishagupta7028@gmail.com',0,1,'C');

        $this -> Cell(210,2,'',0,1);
        $this -> SetFont('Arial','B','15');  
        $this -> Cell(200,5,'FEES RECEIPT',0,1,'C');
    }
    
    function footer(){
        $this->SetY(-12);
        $this->SetFont('Arial','',8);
        $this->Cell(0,0,'This is Computer Generated Invoice',0,0,'C');
    }
}


$pdf = new PDF('L','mm',array(210,127));

$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

$pdf -> Cell(190,1,'',0,2);
$pdf -> Cell(1,2.8,'',0,1);
$pdf -> SetFont('Times','B','13'); 
$pdf -> Cell(1,7,'',0,0);
$pdf -> Cell(25,7,'Dated On : ',0,0);

$pdf->SetFont('Arial','',12);
$pdf -> Cell(50,7,$doj,0,0);
$pdf -> Cell(60,7,'',0,0);

$pdf -> SetFont('Times','B','13'); 
$pdf -> Cell(26,7,'Receipt No : ',0,0);
$pdf->SetFont('Arial','',12);
$pdf -> Cell(50,7,$recno,0,1);
$pdf -> Cell(1,2,'',0,1);

$pdf -> Cell(1,7,'',0,0);
$pdf -> SetFont('Times','B','13'); 
$pdf -> Cell(25,7,'For STD  : ',0,0);
$pdf->SetFont('Arial','',12);
$pdf -> Cell(50,7,$std,0,0);
$pdf -> Cell(60,7,'',0,0);
$pdf -> SetFont('Times','B','13'); 
$pdf -> Cell(26,7,'Student ID : ',0,0);
$pdf->SetFont('Arial','',12);
$pdf -> Cell(50,7,$sid,0,1);

$pdf -> Cell(1,2.7,'',0,1);

$pdf -> Cell(1,6,'',0,0);
$pdf -> SetFont('Times','B','13');
$pdf -> Cell(35,7,'Student Name : ',0,0);
$pdf->SetFont('Arial','',12);
$pdf -> Cell(97,6,$n,0,0);
$pdf -> Cell(1,6,'',0,0);
$pdf -> SetFont('Times','B','13');
$pdf -> Cell(30,7,'Fees/Month : ',0,0);
$pdf->SetFont('Arial','',12);
$pdf -> Cell(45,6,'Rs. '.$actfees,0,1);

$pdf -> Cell(36,1,'',0,0);
$pdf -> Cell(97,0,'',1,0);
$pdf -> Cell(31,1,'',0,0);
$pdf -> Cell(24,0,'',1,1);

$pdf -> Cell(1,4,'',0,1);
$pdf -> Cell(1,6,'',0,0);
$pdf -> SetFont('Times','B','13');
$pdf -> Cell(42,7,'Total amount paid : ',0,0);
$pdf->SetFont('Arial','',12);
$pdf -> Cell(97,6,'Rs. '.$downp.'/-',0,1);


$pdf -> Cell(44,0,'',0,0);
$pdf -> Cell(144,0,'',1,1);

$pdf -> Cell(36,4,'',0,1);


$pdf -> Cell(1,6,'',0,0);
$pdf -> SetFont('Times','B','13');
$pdf -> Cell(42,7,'Paid for month       : ',0,0);
$pdf->SetFont('Arial','',12);
$pdf -> Cell(144,6,$str,0,1);

$pdf -> Cell(44,0,'',0,0);
$pdf -> Cell(144,0,'',1,1);


$pdf -> Cell(1,4,'',0,1);
$pdf -> Cell(1,6,'',0,0);
$pdf -> SetFont('Times','B','13');
$pdf -> Cell(35,7,'Payment Mode : ',0,0);
$pdf->SetFont('Arial','',12);
$pdf -> Cell(25,6,$m,0,0);
$pdf -> Cell(1,6,'',0,0);
$pdf -> SetFont('Times','B','13');
$pdf -> Cell(30,7,'Received By : ',0,0);
$pdf->SetFont('Arial','',12);
$pdf -> Cell(96,6,$naam,0,1);

$pdf -> Cell(36,1,'',0,0);
$pdf -> Cell(25,0,'',1,0);
$pdf -> Cell(31,1,'',0,0);
$pdf -> Cell(96,0,'',1,1);

$pdf->Output("$npdf",'D');
//echo "<script>window.location='admin.php'</script>";
?>
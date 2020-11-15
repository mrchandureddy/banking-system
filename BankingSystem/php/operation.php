<?php
 require 'connect.php'
?>
<!DOCTYPE HTML>
<head>
	<title>Transaction Success</title>
	<style>
		.center{
			margin-left:auto;
			margin-right:auto;
			top:75%;
			background-color:honeydew;
		}
		body{
			background :url(../success.gif);
                background-repeat:no-repeat;
				background-size: cover;
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
                background-color:transparent;
		}
		img{
			display: block;
			margin-left: auto;
			margin-right: auto;
		}	
	</style>
</head>
<body>
<h1 align="center">TRANSACTION SUCCESSFULL!!!!</h1>
<br><br>
<a href="transfer.php" style="color:black" ><center><button><img src="../back.jpg" width="50px" height="50px"></button></center></a>
<br><br>
<?php
	ini_set('error_reporting',E_ALL & ~E_NOTICE );
		$sel=$_POST['status1'];
		$num=$_POST['amount'];
		$ID = $_POST['from'];
		$result =mysqli_query($con, "SELECT current_balance FROM customer WHERE name='". $sel ."' ");
		$result3 =mysqli_query($con, "SELECT current_balance FROM customer WHERE name='". $ID ."' ");
		$res=mysqli_fetch_array($result3);
		$num=(int)$num;
		if($num <= 0){
			echo "<script>alert(\"INVALID AMOUNT \");window.location.href=\"transfer.php\";</script> ";
					}
		else if($num > $res['current_balance']){
			echo "<script>alert(\"INSUFFICIENT amount!!\");window.location.href=\"transfer.php\";</script>";
				}
		else if(strcmp($sel,$ID)==0){
			echo "<script>alert(\"CANNOT TRANSFER TO SELF \");window.location.href=\"transfer.php\";</script> ";
					}
		if($num <= $res['current_balance'] && $num>0 ){
			$result1=mysqli_query($con, "UPDATE customer SET current_balance= current_balance+$num  WHERE name='".$sel."' ");
			$result2=mysqli_query($con, "UPDATE `customer` SET `current_balance`=current_balance-$num WHERE name= '".$ID."' ");
			$result4 =mysqli_query($con, "SELECT * FROM customer WHERE name='". $ID ."' OR name='". $sel ."' ");
			echo "<table border='1' cellspacing='15' cellpadding='2px' class='center' style='width:50%' class='center'>
			<tr>
			<th><h3>Name</h3></th>
			<th><h3>Current Balance</h3></th>
			</tr>";
			if(mysqli_num_rows($result4) > 0)
			{
			while ($row = mysqli_fetch_array($result4))
			{	
				$name = $row['name'];
				$currentbalance = $row['current_balance'];
				echo "<tr>";
				echo "<td align='center'>" .$name. "</td>";
				echo "<td align='center'>" .$currentbalance. "</td>";
				echo "</tr>";
			}

		}

		}	

?>
</body>
</html>


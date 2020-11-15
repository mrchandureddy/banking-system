<?php 
require 'connect.php'
?>
<!DOCTYPE HTML>
<head>
	<title>Operation</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <style type="text/css">
	body{
		background :url(../transfer1.jpg);
                background-repeat:no-repeat;
                background-size:cover;
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
                background-color:transparent;
 }
 .submitt{
 		background: white;
  		border-radius: 10px;
  		padding: 3px 20px;
  		text-align: center;
 }
 #status{
	 background:white;
 }
 select{
		background: transparent;
  		border-radius: 10px;
  		padding: 7px 25px;
  		text-align: center;
	}
	  	table{
			border-style: solid;
			border-radius: 15%;
	  		font-size:15px;
			background-color:lightgray;
  			background-size:cover 
	  	}
	  	.heading{
	  		position: absolute;
	  		top: 0%;
	  	}
	  	.form{
	  		position: absolute;
	  		top:10%;
	  		left:45%;
			  color:black;
	  	}

	@media screen and (max-width:500px) {
		  body{
			  background-color:white;
			  background-size: cover;
			  background-repeat: no-repeat;
			  min-height: 700px;
			  justify-content: flex-start;
			  align-items: flex-end;

		  }
 .submitt{
 		background: transparent;
  		border-radius: 10px;
  		padding: 3px 20px;
  		text-align: center;
 }
 select{
		background: white;
  		border-radius: 10px;
  		padding: 7px 25px;
  		text-align: center;
	}
	  	table{
	  		font-size:15px;
			  color:black;

	  	}
	  	.heading{
	  		position: absolute;
	  		top: 0%;
	  	}
	  	.form{  
	  		position: absolute;
	  		top:15%;
	  		left:45%;

		  }
		  }
	  </style>
</head>
<body>
			<?php
			ini_set('error_reporting',E_ALL & ~E_NOTICE );
				$ID = $_POST['ID'];
				$result=mysqli_query($con,"SELECT name,account_no,email,current_balance FROM customer WHERE name='". $ID ."' ");
			?>
	<div class="data">
		<table class="table" style="position: absolute;left:5%;width:30%;">
			<thead>
			<tr>
			<th style="text-align: center;font-size: 20px;">YOUR DETAILS</th>	
			</tr>
			</thead>
			<tbody>
				<?php
				while($res = mysqli_fetch_array($result)) {     
    				echo "<tr>";
    				echo "<td style=\"text-align:center;\"><b>CUSTOMER NAME</b><br><br>".$res['name']."</td>";
					echo "<br>";
    				echo "</tr>";
					echo "<tr>";
					echo "<br>";
    				echo "<td style=\"text-align:center;\"><b>TOTAL AMOUNT AVAILABLE</b><br><br>".$res['current_balance']."</td>";
    				echo "<br>";
    				echo "</tr>";
      			}
      			?>
			</tbody>
		</table>
	</div>
	<div class="form">
		<form action="operation.php" method="post">

			<label style="font-size:25px;">From</label>
			<?php
				echo "<input type=\"text\" name=\"from\" placeholder=\"".$ID."\" required size=\"20\"  style=\"border-radius:5px\;padding:4px 15px\;border-width:1px\;border-color:black; width:90%;\">";
				?>
				<br><br><br>
			<label style="font-size:25px;">Select user to transfer amount :</label>
			<br>
			<select name="status1" id="status">

				<option value="Select">-SELECT-</option>
				<?php
					require 'connect.php'
				?>
				<?php
					$result = mysqli_query($con, "SELECT name FROM customer "); 
					while($res = mysqli_fetch_array($result)) { 
						echo "<option value='".$res['name']."' > ".$res['name']." </option>";

					}
  					?>	
  				</select>
  				<br>
				  <br>
				  <br>
				  <br>
				  <?php
				   echo "<input type=\"number\" name=\"amount\" placeholder=\"Enter Amount to be transfered\" required size=\"50\"  style=\"border-radius:5px;padding:4px 15px;border-width:1px;border-color:black; width:90%;\">";
				   ?>
  				<br><br>
  				<input type="submit" name="" value="Transfer" class="submitt">
  				<br><br><br><br>
		</form>
		<a href="transfer.php" style="color:black"><button>!!Back!!</button></a>

	</div>
	</body>
	</html> 
 
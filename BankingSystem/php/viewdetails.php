<?php 
require 'connect.php'
?>
<!DOCTYPE HTML>
<HTML>
<head>
 <style type="text/css">
body{
  background:url(../information.jpg);
  background-repeat:no-repeat;
  background-size:cover;
 }
 .center{
     margin-left:auto;
     margin-right:auto;
 }
 </style>
 </head>
 </html>

<body>
            <h1 align="center">CUSTOMER DETAILS</h1>
			<?php
			ini_set('error_reporting',E_ALL & ~E_NOTICE );
				$ID = $_POST['ID'];
				$result=mysqli_query($con,"SELECT name,account_no,email,phone,bank_name,bank_branch,current_balance,account_type FROM customer WHERE name='". $ID ."' ");
                echo "<table border='1' cellspacing='10' cellpadding='5px' class='center'>
                <tr>
                
                <th><h3>Name</h3></th>
                
                <th><h3>Email</h3></th>
                
                <th><h3>Phone Number</h3></th>
                
                <th><h3>Account Number</h3></th>
                
                <th><h3>Type Of Account</h3></th>
                
                <th><h3>Bank Name</h3></th>
                
                <th><h3>Bank Branch</h3></th>
                
                <th><h3>Current Balance</h3></th>
                
                </tr>";
                while($res = mysqli_fetch_array($result)) { 
                       echo "<tr>";
                       echo "<td>" .$res['name']. "</td>";

                       echo "<td>" .$res['email']. "</td>";

                       echo "<td>" .$res['phone']. "</td>";

                       echo "<td>" .$res['account_no']. "</td>";

                       echo "<td>" .$res['account_type']. "</td>";

                       echo "<td>" .$res['bank_name']. "</td>";

                       echo "<td>" .$res['bank_branch']. "</td>";

                       echo "<td>" .$res['current_balance']. "</td>";

                       echo "</tr>";
                }
	?>
			<a href="customer.php"><center><img src="../back.jpg" width="50px" height="50px"></center></a>

</body> 
<?php 
require 'connect.php'
?>
<HTML>
    <head>
        <title>Transfer</title>
        <!-- <link rel="icon" type="image/png" href="banktransfer.png"> -->
        <style>
            body{
                background :url(../transaction2.gif);
                background-repeat:no-repeat;
                background-size:cover;
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
                background-color:transparent;
            }
            .center{
                margin-right: auto;
                margin-left: auto;
            }
            input[type=submit]{
		background-color: white ;
		border: none;
        border-radius: 15%;
		color: #08cfc8;
		padding: 10px 20px;
		text-decoration: none;
		margin: 2px 1px;
		cursor: pointer; 
        font-style:italic;  
	}
        </style>
    </head>
    <body>
    <?php
        $query="SELECT * from customer";
    $result = mysqli_query($con,$query);
    echo "<table border='0' cellspacing='5' cellpadding='1px' class='center' style='width:100%'>
<tr>
<th><h3>Name</h3></th>
<th><h3>Account Number</h3></th>
<th><h3>Current Balance</h3></th>
</tr>";

    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
       $name = $row['name'];
       $accountno = $row['account_no'];
       $currentbalance = $row['current_balance'];
       echo "<tr>";
       echo "<td align='center'>" .$name. "</td>";

       echo "<td align='center'>" .$accountno. "</td>";

       echo "<td align='center'>" .$currentbalance. "</td>";

       echo '<td><form action="transfering.php" method="post">
	<input type="hidden" name="ID" value="'.$name.'"/><input type="submit" name="" value="TRANSFER"></form></td>';
	echo "</tr>";

       echo "</tr>";
      }  
    }
    else{
        echo "no results";
    }
?>
<a href="../home.html"><center><img src="../back.jpg" width="50px" height="50px"></center></a>

</body>
 
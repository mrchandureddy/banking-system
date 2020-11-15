<?php 
require 'connect.php'
?>
<HTML>
    <head>
        <title>View Customers</title>
        <!-- <link rel="icon" type="image/jpg" href="view.jpg"> -->
        <style>
            body{
                background :url(../customers.jpg);
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
		background-image: white;
		border: none;
        border-radius: 15%;
		color: blue;
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
    echo "<table border='0' cellspacing='6' cellpadding='2px' class='center' style='width:100%'>
<tr>
<th><h3><b>Name<b></h3></th>
<th><h3><b>Account Number<b></h3></th>
<th><h3><b>Current Balance<b></h3></th>
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

       echo '<td><form action="viewdetails.php" method="post">
	<input type="hidden" name="ID" value="'.$name.'"/><input type="submit" name="" value="VIEW"></form></td>';
	echo "</tr>";

       echo "</tr>";
      }  
    }
    else{
        echo "no results";
    }
?>
<br>
<a href="../home.html"><center><img src="../back.jpg" width="50px" height="50px"></center></a>
</body>
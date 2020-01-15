<?php

// This PHP post method is used  for upgrading and displaying the amount of money in their bank account and the in these site

include("./session.php");
include("./db_conn.php");
?>

<a href = "loggedIn.php"> Go back </a>
<?php 
if(isset($_POST['depositAmount']))
{

   
    $addedAmount=$_POST['addedAmount'];
 
 $query = "update  assignment2 set depositAmount = depositAmount + " . $addedAmount." where username= '". $session_user."'";

  $result2=$mysqli->query($query);
    
}
echo"<p> Your current balance:";
    $query = "select depositAmount from assignment2 where username ='".$session_user."'";
    $result = $mysqli->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
        echo $row['depositAmount'];
        echo"<br>";
        
    }
$row = $result->fetch_array(MYSQLI_ASSOC);
 $currentAmount = row['depositAmount'];
    
    
    echo"</p>";

    
?>
   
<!doctype html>
<html> 
    <head> </head>
        <body>
<form action="./increaseBalance.php" method="post">
Amount to deposit(whole number[$]):<input type ="text" name="addedAmount"/>
    <input type="submit" name="depositAmount"/>
</form>
    </body>
</html>

 


    
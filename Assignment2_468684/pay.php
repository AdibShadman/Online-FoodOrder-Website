<!-- This php file update the user's checkout table and commit all the changes , deduct the money from the account
-->

<?php
include ("db_conn.php");
include("session.php");

if($_GET["payNow"] == 'true')
{
  echo "Thank you.<br/>";
  echo "Transaction completed";
  echo"<a href ='./loggedIn.php'> Go to main page</a>";
  global $mysqli;
  $mysqli->query('SET autocommit = OFF;');
  $mysqli->query('START TRANSACTION;');
  $afterBalance = $_GET['afterBalance'];
 
$query = "update `transactionList` set `paid` = 'Y' where  paid = 'N'";

    if(!$result=$mysqli->query($query))
    {
      // if any error, dont commit the changes
      $mysqli->query('ROLLBACK;');
      exit;
    }
    else
    {
      // make the changes permanent
      $mysqli->query("COMMIT;");
    }
    


$query = "update `assignment2` set `depositAmount` = $afterBalance where `username` = '$session_user'";
  $mysqli->query($query);
if(!$result=$mysqli->query($query))
{
  $mysqli->query('ROLLBACK;');
  exit;
}
else
{
  $mysqli->query('COMMIT;');
}
}
?>
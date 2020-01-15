<?php
include("session.php");
include("loggedIn.php");
include("db_conn.php");

/*using get method, the food is inserted  in the transaction list of session user*/
if (isset($_GET['added']))
{
  $orderDetails = $_GET['orderDetails'];
  echo $orderDetails;
  $foodId = $_GET['added'];
  $query = "insert into `transactionList`(`orderedAmount`, `orderedDatetime`,`paid`,`orderDetails`,`foodId` )values(1, NOW(),'N','$orderDetails', '$foodId')";
  $result= $mysqli->query($query);
}

/* Displays all the food displayed by the user*/
if(isset($_POST['checkout']))
{

 echo"<h2>Your checkout table</h2>";
 $displayQuery = "select `transactionId`,`orderedAmount`,`foodId` from `transactionList` where paid = 'N'";
$printKey = false;
  $displayResult = $mysqli->query($displayQuery);
  
  
echo "<form method = 'post'><table border = 1>"; 
  
  while($row = $displayResult->fetch_array(MYSQLI_ASSOC))
  {
    
    $transactionId = $row['transactionId']; 
    $foodId = $row['foodId'];
    $amount = $row['orderedAmount'];
    
    
    $displayQuery2 = "select `foodName`, `price` from `masterFoodList` where `foodId`='$foodId'";
    
    
    $displayResult2 = $mysqli->query($displayQuery2);
    
    
    while($arr = $displayResult2->fetch_array(MYSQLI_ASSOC))
    {
      if(!$printKey)
      {
        print( "<tr>\r\n" );
        foreach($arr as $key=>$value)
        {
          printf( "<td>%s</td>\r\n",$key);
        }
        print( "<td>Amount</td><td>Subtotal</td>" );
        print("<td>Choose delivery time:
        <select name ='deliveryTime'>
        <option >Select time</option>
        <option >9:45</option>
        <option >10:15</option>
        <option >10:30</option>
        <option >10:45</option>
        <option >11:15</option>
        <option >11:45</option>
        <option >12:15</option>
        <option >12:45</option>
        <option >13:15</option>
        <option >13:45</option>
        <option >14:30</option>
        <option >14:45</option>
        <option >15:15</option>
        <option >15:45</option>
        <option >16:30</option>
        </select>
        </td>");
        
        
        print( "</tr>\r\n" );
        $printKey = true;
        
      }
      
      print("<tr>\r\n");
      foreach($arr as $key=>$value)
      {
        printf("<td>%s</td>\r\n",$arr[ $key ]);
      }
      $subtotal = $amount * $arr['price'];
      print( "<td>$amount</td><td>$subtotal</td>" );
      
      
     
      $total = $total + $subtotal; 
      
      }
    }
  //  counting discounts for managers
  if($session_user == 'lazenbyManager' ||$session_user == 'refManager')
  {
    $discountTotal = $total*0.15;
    
  } 
  // counting discounts for student
  elseif($session_user == 'student')
  {
    $discountTotal = $total*0.07;
  }
  // for director
  elseif($session_user == 'director')
  {
   $discountTotal = $total*1;
  }
  //  counting discounts for staff
  else
  {
   $discountTotal = $total*0.1;
  }
  $total1= $total - $discountTotal;
  echo "<tr><td colspan=3 align=right>Total</td><td>$total1</td>";
  
  echo"<td colspan=4 align='middle'><textarea length='40px' height='10px' placeholder=' Order Details Box '></textarea></td></tr>";
  // query for displaying what is the balance after payment
  $amountQuery = "select `depositAmount` from `assignment2` where `username` like '$session_user'";
  $amountResult = $mysqli->query($amountQuery);
  $amountRow = $amountResult->fetch_array(MYSQLI_ASSOC);
  echo "<tr><td colspan =3 align='right'>Your balance</td><td> ".$amountRow['depositAmount']."</td>";
  $afterBalance = $amountRow['depositAmount']- $total1;
  echo"<tr><td colspan = 3>Your balance (after transaction)</td><td>$afterBalance</td>";
  if($afterBalance < 0)
  {
    echo"<tr><td colspan=4 align='right'>You dont have sufficient credit.</td></tr>";
  }
  echo"</table>";
  // if the account balance is more than the amount that is ordered, procedd the payment
  if($afterBalance >= 0)
  {
    echo"<a href = 'pay.php?payNow=true&afterBalance=$afterBalance'>Pay Now</a><br/>";
   }
   
 
}


?>
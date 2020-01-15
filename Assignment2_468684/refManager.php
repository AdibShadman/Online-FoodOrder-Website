<?php
 include ("session.php");
include("db_conn.php");
include("function.php");
// query to display the masterFoodList for the manager
 $query ="select * from masterFoodList";
$result = $mysqli->query($query);

 if($result){
            echo"<table border=1>
            
            <tr>
            <th>id
                <th>foodName
                <th>Price($)
                <th>Date
               
                
            </tr>";
            while($row= $result->fetch_array(MYSQLI_ASSOC)){
                echo 
                "<tr> 
                <td>".$row['foodId'].
                "<td>".$row['foodName'].
                "<td>".$row['price'].
                 "<td>".$row['date'].
                  
                "</tr>";
               
            }
        echo"</br>";
   
 }
     ?>
<html>
<h2> welcome to Manager's page </h2>
<h3> Current available food item in master list</h3>
    <button id="logout" onclick = "location.href = './index.php'" > logout</button><br/>
  <a href ="loggedIn.php"> view as student </a><br/>
  
  <form action="" method="post">
  Add food name: <input type="text" name="addFoodName"/>
  <input type="submit" name="submitAddedFood" value="Add"/>
    </form>
    
</html>
<?php

if(isset($_POST['submitAddedFood']))
{
  // This php file adds food only in the ref Cafe
  $foodAddByManager = $_POST['addFoodName'];
  $query1 = "select `foodId` from `masterFoodList` where `foodName` = '$foodAddByManager'";
  $result2 = $mysqli->query($query1);
  $row1 = $result2->fetch_array(MYSQLI_ASSOC);
  $foodFromMasterList = $row1['foodId'];
  
  
 
  $insertQuery = "insert into `cafeFood` (`cafeId`, `foodId`) values(2 , '".$foodFromMasterList."' )";
  $insertResult = $mysqli->query($insertQuery);
  // display foods which are selected only in the ref cafe
  $displayQuery= "select * from `masterFoodList` where `foodId` in (select `foodId` from `cafeFood` where `cafeId` = 2)";
  $displayResult = $mysqli->query($displayQuery);
 
   
   if($displayResult)
   { echo"<table border=1>
            
            <tr>
            <th>id
                <th>foodName
                <th>Price($)
                <th>Date
               
                
            </tr>";
   
   
   while($row= $displayResult->fetch_array(MYSQLI_ASSOC)){
                echo 
                "<tr> 
                <td>".$row['foodId'].
                "<td>".$row['foodName'].
                "<td>".$row['price'].
                 "<td>".$row['date'].
                  
                "</tr>";
               
            }
   
        echo"</br>";
     echo"<h2>Current food items in Ref</h2>";
    
      $mysqli->query($displayQuery);
  $mysqli->close();
   }
  echo"</br>";
}

?>
<html>
  <!-- form to delete the food from the cafe table (not from masterList) -->
<form action = "" method="post">
  Type food name to delete: <input type="text" name="deleteFoodName"/>
  <input type="submit" name="deleteAddedFood" value="Delete"/><br/>
</form>
  
</html>
<?php

if(isset($_POST["deleteAddedFood"]))
{
 
   $foodDeletedByManager = $_POST["deleteFoodName"];
  
  $query1 = "select `cafeFoodId` from `cafeFood` where `foodId` in (select `foodId` from `masterFoodList` where `foodName` = '$foodDeletedByManager')";
  $result2 = $mysqli->query($query1);

  $row1 = $result2->fetch_array(MYSQLI_ASSOC);
  $cafeIdToDelete = $row1['cafeFoodId'];
  
  
  $deleteQuery = "delete  from `cafeFood` where `cafeFoodId` = '$cafeIdToDelete'";
  
 
  $deletedResult= $mysqli->query($deleteQuery);
  if($deletedResult)
  {
     $displayQuery= "select * from `masterFoodList` where `foodId` in (select `foodId` from `cafeFood` where `cafeId` = 2)";
  $displayResult = $mysqli->query($displayQuery);
 
   
   if($displayResult)
   { echo"<table border=1>
            
            <tr>
            <th>id
                <th>foodName
                <th>Price($)
                <th>Date
               
                
            </tr>";
   
   
   while($row= $displayResult->fetch_array(MYSQLI_ASSOC)){
                echo 
                "<tr> 
                <td>".$row['foodId'].
                "<td>".$row['foodName'].
                "<td>".$row['price'].
                 "<td>".$row['date'].
                  
                "</tr>";
               
            }
    echo "<h2>Current food items in Ref</h2>";
  }

}
}
?>
<?php
// displays the opening and closing time of the ref
$timeQuery = "select openingTime, closingTime from cafe where cafeId = 2";
    $result = $mysqli->query($timeQuery);
 if($result)
   { echo"<table border=1>
            
            <tr>
          
                <th>openingTime
                <th>closingTime
                
               
                
            </tr>";
   
   
   while($row= $result->fetch_array(MYSQLI_ASSOC)){
                echo 
                "<tr> 
                <td>".$row['openingTime'].
                "<td>".$row['closingTime'].
                
                "</tr>";
               
            }
    
  }
if (isset($_POST["updateTime"]))
{
  // updates the time if the cafe has different opening and closing time 
    $openingTime = $_POST["openingTime"];
    $closingTime = $_POST["closingTime"];
    
  
    
    $updateTime = "update cafe set openingTime ='".$openingTime."', closingTime ='".$closingTime."' where cafeName = 'The ref'";
    
  
    $updateResult = $mysqli->query($updateTime);
echo"<hr/>";
   
}

?>
<form action = "" method="post">
opening time: 
    <select name = "openingTime">
  <option >9:00:00</option>
  <option  >10:30:00</option>
  </select><br/>
    
    closing time:
    <select name = "closingTime">
  <option  >16:30:00</option>
  <option  >17:30:00</option>
   </select><br/>
    <input type = "submit" name ="updateTime" value = "Update time" />
</form><br/>



<?php
if (isset($_POST['orderDetails']))
{ 
  // print the order that was made today by the customers (joins table transactionList and table cafe)
  
  $printKey = false;
  $query = "SELECT masterFoodList.foodName, transactionList.orderedDatetime, cafeFood.foodId, cafeFood.cafeId, cafe.cafeName FROM masterFoodList, transactionList, cafeFood, cafe WHERE transactionList.foodId = masterFoodList.foodId and masterFoodList.foodId = cafeFood.foodId and cafeFood.cafeId = 2 and cafe.cafeId = 2 and orderedDatetime = curdate()";
  $result = $mysqli->query($query);
  if($result){
    
            echo"<table border=1>
            
            <tr>
            
                <th>Ordered food(s)
               <th> Ordered Date
               <th>food ID
               <th> cafeId
               <th>cafeName
               
                
            </tr>";
            while($row= $result->fetch_array(MYSQLI_ASSOC)){
                echo 
                "<tr> 
                <td>".$row['foodName'].
                "<td>".$row['orderedDatetime'].
                  "<td>".$row['foodId'].
                  "<td>".$row['cafeId'].
                  "<td>".$row['cafeName'].
                  
                "</tr>";
               
            }
        echo"</br>";
   
 }
  
}
?>
<form action = "" method = "post">
  <input type = "submit" name ="orderDetails" value = "Show Todays Order"/>
</form><br/>


<?php
if(isset($_POST['showAvailableFoodsInCafe']))
{
  // displays the food item that are alraedy available in the ref cafe (if no changing required)
  $displayQuery= "select * from `masterFoodList` where `foodId` in (select `foodId` from `cafeFood` where `cafeId` = 2)";
  $displayResult = $mysqli->query($displayQuery);
 
   
   if($displayResult)
   { echo"<table border=1>
            
            <tr>
            <th>id
                <th>foodName
                <th>Price($)
                <th>Date
               
                
            </tr>";
   
   
   while($row= $displayResult->fetch_array(MYSQLI_ASSOC)){
                echo 
                "<tr> 
                <td>".$row['foodId'].
                "<td>".$row['foodName'].
                "<td>".$row['price'].
                 "<td>".$row['date'].
                  
                "</tr>";
               
            }
    echo"<br/>";
    $mysqli->query($displayQuery);
  $mysqli->close();
   }
  echo "<br/>";
  
}
?>
<form action = "" method = "post">
  <input type = "submit" name ="showAvailableFoodsInCafe" value = "Show Available Foods In Cafe"/>
</form><br/>

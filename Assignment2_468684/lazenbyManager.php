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
<h2> welcome to manager's page </h2>
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
  // take the foodId from masterFoodList.php and insert it in the junction table cafeFood.php
  $foodAddByManager = $_POST['addFoodName'];
  $query1 = "select `foodId` from `masterFoodList` where `foodName` = '$foodAddByManager'";
  $result2 = $mysqli->query($query1);
  $row1 = $result2->fetch_array(MYSQLI_ASSOC);
  $foodFromMasterList = $row1['foodId'];
  
  
 
  $insertQuery = "insert into `cafeFood` (`cafeId`, `foodId`) values(1 , '".$foodFromMasterList."' )";
  $insertResult = $mysqli->query($insertQuery);
  
  $displayQuery= "select * from `masterFoodList` where `foodId` in (select `foodId` from `cafeFood` where `cafeId` = 1)";
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
     echo"<h2>Current food items in lazenby</h2>";
    
      $mysqli->query($displayQuery);
  $mysqli->close();
   }
  echo"</br>";
}

?>
<html>
  
<form action = "" method="post">
  Type food name to delete: <input type="text" name="deleteFoodName"/>
  <input type="submit" name="deleteAddedFood" value="Delete"/><br/>
</form>
  
</html>
<?php

if(isset($_POST["deleteAddedFood"]))
{ // this is used for deleting food from the cafe (not masterFoodList.php)
 
   $foodDeletedByManager = $_POST["deleteFoodName"];
  
  $query1 = "select `cafeFoodId` from `cafeFood` where `foodId` in (select `foodId` from `masterFoodList` where `foodName` = '$foodDeletedByManager')";
  $result2 = $mysqli->query($query1);

  $row1 = $result2->fetch_array(MYSQLI_ASSOC);
  $cafeIdToDelete = $row1['cafeFoodId'];
  
  
  $deleteQuery = "delete  from `cafeFood` where `cafeFoodId` = '$cafeIdToDelete'";
  
 
  $deletedResult= $mysqli->query($deleteQuery);
  if($deletedResult)
  {
     $displayQuery= "select * from `masterFoodList` where `foodId` in (select `foodId` from `cafeFood` where `cafeId` = 1)";
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
    echo "<h2>Current food items in lazenby</h2>";
  }

}
}
?>

<?php
// This peice of php is used for updating the time
$timeQuery = "select openingTime, closingTime from cafe where cafeId = 1";
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
    $openingTime = $_POST["openingTime"];
    $closingTime = $_POST["closingTime"];
    
  
    
    $updateTime = "update cafe set openingTime ='".$openingTime."', closingTime ='".$closingTime."' where cafeName = 'Lazenby'";
    
  
    $updateResult = $mysqli->query($updateTime);
echo"<hr/>";
   
}

?>
<form action = "" method="post">
opening time: 
    <select name = "openingTime">
  <option >9:30:00</option>
  <option  >10:00:00</option>
  </select><br/>
    
    closing time:
    <select name = "closingTime">
  <option  >16:30:00</option>
  <option  >17:00:00</option>
   </select><br/>
    <input type = "submit" name ="updateTime" value = "Update time" />
</form>


<?php
if (isset($_POST['orderDetails']))
{ 
  // This code displays only todays order in a specific cafe using join tables.
  $printKey = false;
  $query = "SELECT masterFoodList.foodName, transactionList.orderedDatetime FROM  masterFoodList, transactionList WHERE transactionList.foodId = masterFoodList.foodId and orderedDatetime = curdate()";
  $result = $mysqli->query($query);
  if($result){
            echo"<table border=1>
            
            <tr>
            
                <th>Ordered food(s)
               <th> Ordered Date
               
                
            </tr>";
            while($row= $result->fetch_array(MYSQLI_ASSOC)){
                echo 
                "<tr> 
                <td>".$row['foodName'].
                "<td>".$row['orderedDatetime'].
                  
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
  // This PHP file displays what foods are already available in the acfe
  $displayQuery= "select * from `masterFoodList` where `foodId` in (select `foodId` from `cafeFood` where `cafeId` = 1)";
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
 
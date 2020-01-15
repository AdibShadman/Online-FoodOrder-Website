<!-- this page is used to update the food in the master
--><!DOCTYPE html>
<html>
<body>

<center>
<h2>update food </h2>
</center>
    <form action ="" method = "post">
    ID: <input type = "text" name= "foodId"/>
     Name: <input type = "text" name= "foodName"/>
     Price: <input type = "text" name= "foodPrice"/>
     Date: <input type = "text" name= "foodDate" placeholder="Y-M-D H:M:S "/>
        <input type= "submit" name="update" value="update">
        <button><a href="masterFoodList.php">Go back to main list</a></button>
    </form>
    
<?php
include('db_conn.php');   //db connection
  //query to display the table
    $query= "SELECT * FROM masterFoodList";
    $result = $mysqli->query($query);
 
      if($result){
            echo"<table>
            
            <tr>
            
                <th>ID
                <th>FoodName
                <th>Price
                <th>Date
            </tr>";
            while($row= $result->fetch_array(MYSQLI_ASSOC)){
                echo 
                "<tr><td>".$row['foodId'].
                "<td>".$row['foodName'].
                 "<td>".$row['price'].
                 "<td>".$row['date'].
                "</tr>";
            }
        echo"</br>";
    }
         if (isset($_POST['update'])){
             $ID=$_POST["foodId"];
             $Name=$_POST["foodName"];
             $Price=$_POST["foodPrice"];
             $Date=$_POST["foodDate"];
             $query = "update masterFoodList set foodId='$ID' ,foodName='$Name' ,price='$Price' ,date='$Date' where foodId='$ID'";
             $mysqli->query($query);
             $mysqli->close();
         }
   
        
    
?>
</body>
</html>

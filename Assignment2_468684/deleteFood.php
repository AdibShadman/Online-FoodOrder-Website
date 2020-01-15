<!DOCTYPE html>
<html>
<body>

<center>
<h2>Delete food </h2>
</center>
    <form action ="" method = "post">
    ID: <input type = "text" name= "foodId"/>
     
        <input type= "submit" name="delete" value="delete">
        <button><a href="masterFoodList.php">Go back to main list</a></button>
    </form>
   <!--  the director can delete a food from master list from this page--> 
<?php
include('db_conn.php');   //db connection
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
         if (isset($_POST['delete'])){
             $ID=$_POST["foodId"];
             
             $query = "delete from masterFoodList where foodId='$ID'";
             $mysqli->query($query);
             $mysqli->close();
         }
   
        
    
?>
</body>
</html>

<!DOCTYPE html>
<html>
<body>

<center>
<h2>Insert food </h2>
</center>
    <form action ="" method = "post">
    ID: <input type = "text" name= "foodId"/>
     Name: <input type = "text" name= "foodName"/>
     Price: <input type = "text" name= "foodPrice"/>
     Date: <input type = "text" name= "foodDate" placeholder="Y-M-D H:M:S "/>
        <input type= "submit" name="insert" value="insert">
        <button><a href="masterFoodList.php">Go back to main list</a></button>
    </form>
    
<?php
  // This php file is used by the directors tp insert food in the masterFoodList
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
         if (isset($_POST['insert'])){
             $ID=$_POST["foodId"];
             $Name=$_POST["foodName"];
             $Price=$_POST["foodPrice"];
             $Date=$_POST["foodDate"];
             $query = "Insert into masterFoodList(`foodId`,`foodName`,`price`,`date`) VALUES('".$ID."', '".$Name."', '".$Price."', '".$Date."');";
             $mysqli->query($query);
             $mysqli->close();
         }
   
        
    
?>
</body>
</html>

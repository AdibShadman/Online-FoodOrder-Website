<?php
 include ("session.php");
include("db_conn.php");
include("function.php");
/* This page is accessed by the director. Here the director can add, delete , update food items from masterFoodList and also add and remove staff
name: Adib Shadman
ID: 468684
*/

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
<h2> welcome to director's page </h2>

    <button id="logout" onclick = "location.href = './index.php'" > logout</button><br/><br/>
  <a href ="loggedIn.php"> view as student </a><br/><br/>
    <form action = "./insertFood.php" method = "post">
      
<input type="submit" value="InsertfoodItems">
</form ><br/>
<form action = "./updateFood.php" method="post">
<input type="submit" value="UpdateFoodItems">
</form><br/>
<form action = "./deleteFood.php" method="post">
<input type="submit" value="DeleteFoodItems ">
</form>

 <h3> Current available food item</h3>       

<?php
  // This joins staffList table with the cafe table
$staffQuery = "select staffList.staffId,staffList.staffName, staffList.utasId, cafe.cafeName from staffList, cafe where staffList.cafeId = cafe.cafeId ";

$result = $mysqli->query($staffQuery);
    if($result)
    {
     
        echo"<table border=1>
            
            <tr>
            <th>Staff Id
                <th>Staff Name
                <th>UTAS ID
                <th> Cafe Name
                
            </tr>";
      while($row= $result->fetch_array(MYSQLI_ASSOC))
      {
                echo 
                "<tr>
                <td>".$row['staffId'].
                "<td>".$row['staffName'].
                "<td>".$row['utasId'].
                "<td>".$row['cafeName'].
                
                "</tr>";
               
            }
        echo"</br>";
 }
?>
  <h3>Available staffs</h3>
  <!-- Form to add staff--> 
  <form action = "./masterFoodList.php" method="post">
    <h4>Add Staff</h4> 
    <input type='number', name ="staffId"placeholder="Staff ID"/>
    <input type = 'text' name='addStaffName'placeholder="staffName"/>
    <input type = 'text' name = 'addUtasId' placeholder='UTAS ID(example: CS1111)'/>
    <select name = "addStaff">
      <option >Select cafe</option>
      <option value=1> Lazenby</option>
     <option value=2> The ref</option>
      <option value=3>  Trade Table</option>
    </select>
<input type="submit" name = 'AddStaff' />
</form><br/>
    <!-- Form to add staff--> 
<form action = "" method="post">
  <h4>Delete Staff</h4> <input type = 'number' name='deleteStaffName' placeholder = "Staff ID for example: 1"/>
<input type="submit" name="deleteStaff"/>
</form>

</html>
<?php
if(isset($_POST['AddStaff']))
 { 
  // inserting staff in staffList table 
  $staffId= $_POST["staffId"];
  $addStaffName = $_POST["addStaffName"];
$addUtasId = $_POST["addUtasId"];
$addStaff = $_POST["addStaff"];

$insertQuery = "insert into `staffList`(`staffId`,`utasId`, `staffName`, `cafeId` ) values ('".$staffId."','".$addUtasId."','".$addStaffName."','".$addStaff."')";
$result = $mysqli->query($insertQuery);
  
    
  while($row = $result->fetch_array(MYSQLI_ASSOC))
  {
     echo 
                "<tr>
                <td>".$row['staffId'].
                "<td>".$row['staffName'].
                "<td>".$row['utasId'].
                "<td>".$row['cafeName'].
                
                "</tr>";
  }
  echo "<br/>";
   
  
   
  
}
if (isset($_POST['deleteStaff']))
{
  // php code for deleting staff
  $deleteStaffName = $_POST['deleteStaffName'];
  $deleteQuery = "delete from staffList where staffId = '$deleteStaffName'";
  $result = $mysqli->query($deleteQuery);
}
?>

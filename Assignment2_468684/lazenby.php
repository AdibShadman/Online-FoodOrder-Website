<!-- This page set the 3 images for restaurant Lazenby and set the price for them. it also shows the opening and closing time
Name: Adib Shadman, ID:468684-->
<?php
include("header.php");
include("session.php");
//include the file db_conn.php
include("db_conn.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="lazenby.css">

</head>
<body>
    <div class="lazenbyPage">
    <h2> Items and prices</h2>

<div id ="html">
    <div class="row">
  <div class="column">
    <img src="Images/burger.jpg" alt="burger" style='width:100%;height:350px'/>
      Burger: $12
  </div>
  <div class="column">
    <img src="Images/beefsteak.jpg" alt="beefsteak" style='width:100% ;height:350px'/>
      Beefsteak: $15
  </div>
  <div class="column">
    <img src="Images/fishandchips.jpg" alt="fishandchips" style='width:100%;height:350px'/>
      Fish and Chips: $15
  </div>
</div>
    <h2> Opening hours</h2>
    <div class="openinghoursrow">
        <div class="openinghourscolumn">
        <div id="openinghourscolumn1"> Monday-Friday</div>
        <div id="openinghourscolumn2"> 9:00AM- 5:00PM</div>
        
        </div>
      
    
  
  <div class="openinghourscolumn">
        <div id="openinghourscolumn1"> Saturday</div>
        <div id="openinghourscolumn2"> 9:00AM- 3:00PM</div>
    
  </div>
  <div class="openinghourscolumn">
        <div id="openinghourscolumn1"> Sunday</div>
        <div id="openinghourscolumn2"> 9:00AM- 12:00PM</div>
    
  </div>
</div>
    <h2> You need to login before making an order </h2>
    
    </div>
    </div>
    
</body>
</html>

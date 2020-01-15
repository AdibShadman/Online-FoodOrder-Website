<!-- This page set the 3 images for restaurant "The ref" and set the price for them. It also shows the opening and closing time using div.
Name: Adib Shadman, ID:468684-->
<?php
   include("./header.php");
?>
<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" href="theRef.css">
</head>
<body>
    <div class= "theRefPage">
    <h2> Items and prices</h2>


    <div class="row">
  <div class="column">
    <img src="Images/chickenBiriyani.jpg" alt="chickenBiriyani" style='width:100%;height:350px'/>
      Chicken biriyani: $12
  </div>
  <div class="column">
    <img src="Images/beefBiriyani.jpg" alt="beefBiriyani" style='width:100% ;height:350px'/>
      Beef biriyani: $15
  </div>
  <div class="column">
    <img src="Images/lambBiriyani.jpg" alt="lambBiriyani" style='width:100%;height:350px'/>
      Lamb biriyani: $15
  </div>
</div>
    <h2> Opening hours</h2>
    <div class="openinghoursrow">
        <div class="openinghourscolumn">
        <div id="openinghourscolumn1"> Monday-Friday</div>
        <div id="openinghourscolumn2"> 9:00AM- 6:00PM</div>
        
        </div>
      
    
  
  <div class="openinghourscolumn">
        <div id="openinghourscolumn1"> Saturday</div>
        <div id="openinghourscolumn2"> 9:00AM- 3:00PM</div>
    
  </div>
  <div class="openinghourscolumn">
        <div id="openinghourscolumn1"> Sunday</div>
        <div id="openinghourscolumn2"> 9:00AM- 12:50PM</div>
    
  </div>
</div>
    <h2> You need to login before making an order </h2>
    </div>
</body>
</html>
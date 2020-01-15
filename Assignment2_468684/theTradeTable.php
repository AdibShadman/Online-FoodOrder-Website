    <!-- This page set the 3 images for restaurant "Trade Table" and set the price for them. It also shows the opening and closing time
Name: Adib Shadman, ID:468684-->
<?php
   include("./header.php");
?>
<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="theTradeTable.css">

    </head>
    <body>
        <div class="tradeTablePage">
        <h2> Items and prices</h2>


        <div class="row">
      <div class="column">
        <img src="Images/tea.jpg" alt="Tea" style='width:100%;height:350px'/>
          Tea: $4
      </div>
      <div class="column">
        <img src="Images/coffee.jpg" alt="Coffee" style='width:100% ;height:350px'/>
          Coffee: $4
      </div>
      <div class="column">
        <img src="Images/cookies.jpg" alt="Cookies" style='width:100%;height:350px'/>
          Cookies: $2
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
            <div id="openinghourscolumn2"> 9:00AM- 4:50PM</div>

      </div>
      <div class="openinghourscolumn">
            <div id="openinghourscolumn1"> Sunday</div>
            <div id="openinghourscolumn2"> 9:00AM- 1:30PM</div>

      </div>
    </div>
        <h2> You need to login before making an order </h2>
    </div>

    </body>
    </html>
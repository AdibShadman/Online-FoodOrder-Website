<?php
include("db_conn.php");
include("session.php");
?>
<!doctype html>
<html>
<head>
</head>
<body>
    <!-- This page is viewed by student, staff and employee (all with access level3 )--> 
    <form action= "./increaseBalance.php" method="post">
    <input type="submit" value="IncreaseBalance"/>
    </form><br/>
      <form action= "./editProfile.php" method="post">
    <input type="submit" value="editProfile"/>
    </form><br/>

    
   <form action="./logout.php" method = "post">
       <input type = "submit" name ="submit" value = "logout"> 
    </form><br/>
  <form action = "./checkout.php" method = "post">
     <input type = "submit" name= "checkout" value = "checkout"/>  
  </form>
  <!-- button that can be only accessed by manager-->
  <form action = "" method= "post">
    <input type = "submit" name = "managerView" value ="View as Manager"/> 
  </form>
  <?php 
  if (isset($_POST['managerView']))
  {
    $query = "select access from assignment2 where username='".$session_user."'";
    $result = $mysqli->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
      if( $row['access'] == 3 || $row['access'] == 0 ||$row['access'] == 1)
      {
        
        echo"<script type = 'text/javascript'>alert('You can't access this page ');</script>";
      }
      else
      {
        if($session_user == "lazenbyManager"){
        header("Location:lazenbyManager.php");}
        else
        {
          header("Location:refManager.php");
        }
      }
    }
  }
  ?>

<?php
  


  
  echo"Food In the menu";
  // displays the food in the student page the food choosed by the manager in all 3 cafes.
  $displayQuery= "select * from `masterFoodList` where `foodId` in (select `foodId` from `cafeFood` where `cafeId` = 1 or `cafeId` = 2)";

  $displayResult = $mysqli->query($displayQuery);
 $printKey = false;
  
   
   if($rowCount = $displayResult->num_rows >= 1)
   {
     echo"<form method = 'get' action = 'checkout.php'>";
     echo"<table border=1>";
    
     
     while($row = $displayResult->fetch_array(MYSQLI_ASSOC))
     {
      if( !$printKey )
      {
        print( "<tr>\r\n" );
        foreach($row as $key=>$value)
        {
          printf("<td>%s</td>\r\n",$key);
        }
        
        print( "<td></td>" );
        print( "</tr\r\n>" );
        $printKey = true;
      }
       
       print( "<tr>\r\n" );
       
       foreach($row as $key=>$value)
       {
         printf( "<td>%s</td>\r\n",$row[ $key ]);
       }
       
       
       print( "<td><a href='checkout.php?added=".$row['foodId']."'>add</a></td>");
       print( "</tr>\r\n" );
     
     }
     
     echo "</table>";
     echo "</form>";
   }
  
  else 
  {
    echo "sorry no items available";
  }
  
?>
  

  </body>
</html>

      

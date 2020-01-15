<?php
include("./session.php");
include("./db_conn.php");
?>

 <?php
// update the profile using post method
if(isset($_POST['submitProfile']))
  
{

   
    $newEmail=$_POST['newEmail'];
   $newPhoneNumber=$_POST['newPhoneNumber'];
   $newPassword=$_POST['newPassword'];
  $encryptedNewPassword = md5($newPassword);
  
 
 $query = "update  assignment2 set email = '$newEmail', phoneNumber='$newPhoneNumber', password='$encryptedNewPassword' where username= '". $session_user."'";

  $result2=$mysqli->query($query);
    
}
echo"<p> your current profile:";
// retrieve the data from database
    $query = "select email,phoneNumber, password from assignment2 where username ='".$session_user."'";
    $result = $mysqli->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
      echo "<br/>Email: ";
        echo $row['email'];
      echo "<br/> Phone Number: ";
       echo $row['phoneNumber'];
        echo "<br/>Password :";
       echo $row['password'];
        echo"<br>";
        
    }

    
    echo"</p>";

    
?>
   
<!doctype html>
<html> 
    <head> </head>
        <body>
<form action="./editProfile.php" method="post">
  <p>Disclaimer: Please provide all the fields. Provide previous values if you want to change either email or phone number or password but not all</p>
New email:<input type ="text" name="newEmail" required/><br/>
New phone number:<input type ="text" name="newPhoneNumber" required/><br/>
  <!--password to match the regex pattern -->
 New password:<input type ="password" name="newPassword" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d ~!#$]{6,12}$" title="Password must be 6-12 characters in length, contains at least 1 lower case, 1 upper case, 1 number and one of following special character ~!#$" required/><br/>

    <input type="submit" name="submitProfile" value="Update"/>
</form>
          <a href ='./loggedIn.php'> Go back</a>
    </body>
</html>

 



    
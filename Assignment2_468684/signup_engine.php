<?php
/* This php file validates the input typed by user. if all the inputs are validated, only then it gets inserted in the database*/
include("session.php");
include("db_conn.php");

if(isset($_POST['submitButton']))

{
   $sessionCaptcha = $_SESSION['captcha'];
  $formCaptcha = $_POST['captcha'];
  // checks if the typed captcha matches with the random captcha
  if($sessionCaptcha == $formCaptcha)
  {
    
     $user=$_POST['registerUsername'];
   $id = $_POST['id']; 
   $email=$_POST['email'];
    $phoneNumber=$_POST['phoneNumber'];
   $password=$_POST['registerPassword'];
    $encryptedPassword=md5($password);
   $depositAmount=$_POST['depositAmount'];
    $cardNumber=$_POST['cardNumber'];
   $cvv=$_POST['cvv'];
    
      
  
    
$query = "select * from assignment2 where username='$user'";
$result = $mysqli->query($query);
 

if(mysqli_num_rows($result)>0)
{
   $message = "Username exist";
    
echo "<script type='text/javascript'>alert('$message');</script>";
  header( "refresh:1; url=register.php" ); 
    
}
   
else
{ // validate the email
  if(filter_var($email,FILTER_VALIDATE_EMAIL) == FALSE)
    {
       header('Location: login.php?error=Invalid_email');
    }
  else{
    // using real_escape_string to prevent MYSQLI injection
 $user = $mysqli->real_escape_string($user);
  $id = $mysqli->real_escape_string($id);
  $email = $mysqli->real_escape_string($email);
  $phoneNumber = $mysqli->real_escape_string($phoneNumber);
  $depositAmount = $mysqli->real_escape_string($depositAmount);
   $cardNumber = $mysqli->real_escape_string($cardNumber);
  $cvv = $mysqli->real_escape_string($cvv);
                
    // query to insert in table assignment2
    $insertQuery = "INSERT INTO assignment2 (`username`, `utasId`,`email`,`phoneNumber`,`password`,`depositAmount`,`cardNumber`,`CVV`) VALUES ('".$user."', '".$id."', '".$email."','".$phoneNumber."','".$encryptedPassword."', '".$depositAmount."','".$cardNumber."','".$cvv."');";
      
        $mysqli->query($insertQuery);
 
    header('Location: ./login.php');
 }
}

  }
  else
  {
    header('Location: login.php?error=Invalid_captcha');
  }
   

}

?>
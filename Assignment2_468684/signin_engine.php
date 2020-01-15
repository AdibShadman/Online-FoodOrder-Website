<?php

include("session.php");

include("db_conn.php");


$user=$_POST['username'];

$password=$_POST['password'];
$encryptedPassword=md5($password);// encrypt the password so that it becomes unreadable.


$query = "SELECT username, password, access FROM assignment2 WHERE username='$user'";

$result = $mysqli->query($query);


	$row=$result->fetch_array(MYSQLI_ASSOC);

// checks if the username is in thev database
if($row['username']!=$user || $user=="")
{
	
	header('Location: login.php?error=invalid_username');
}

else {
	// checks if the passowrd matches with the password in the database
	if($row['password']==$encryptedPassword)
    {
		
		$session_user=$row['username'];
		$_SESSION['session_user']=$session_user;
        // asigning different access level to different users
        if($row['access'] == 1)
        {
            header('location:./masterFoodList.php');
          
        }
      else if($row['access'] == 2)
      {
        if($session_user == "lazenbyManager")
        header('location:./lazenbyManager.php');
        
        else
          header('location:./refManager.php');
        
      }
		
        else
        {
		header('Location: ./loggedIn.php');
          
        }
	
	}
	else{

		
		header('Location: login.php?error=invalid_password');
      
	}
}
?>
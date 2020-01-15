<?php
include("session.php");
include("db_conn.php");
include("header.php");

//if there is any received error message 
if(isset($_GET['error']))
{
	$errormessage=$_GET['error'];
	//show error message using javascript alert
	echo "<script>alert('$errormessage');</script>";
}
?>
<!DOCTYPE html>
<!--This is the login page where all the people linked with the system logged in -->
        <html>
        <head>
            <link rel="stylesheet" href="main.css">
        </head>
        <body>
            
            <div class="loginPage">
            <div class="form">
                <form action="./signin_engine.php" method="post">

                    <label>Username:</label>
                    <input type="text" name="username" required><br><br>

                    <label>Password:</label>
                    <input type="password"  name="password" required>

                    <input id="loginId" type="submit" name="login" value="login"><br><br>
                   

                </form>
                 <text>Don't have an account? <button id="registerId" onclick="location.href='register.php'"> Register</button></text>
                <button onclick="location.href='./index.php'">go back to main menu </button>
                     

            </div>  
            </div>
        </body>
        </html>
    
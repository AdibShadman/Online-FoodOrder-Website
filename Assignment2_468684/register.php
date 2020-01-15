<?php
include("session.php");
include("db_conn.php");
include("header.php");
?>
<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="main.css">
        <!-- The script here compare the password when the user wants to register and gives alert box if the oassword is invalid-->
        

    </head>
    <body>
        <div class="registerPage">
                <div class="form">


            <form action="./signup_engine.php" method="post">
            <label id="formId">Username:</label>
            <input id="inputId" type="text" name="registerUsername" required><br>

            <label id="formId">ID:</label>
            <input id="inputId"type="text" name="id"required><br>

            

            <label id="formId">Email:</label>
            <input id="inputId" type="text" name="email"required><br>
                <label id="formId">Phone number:</label>
            <input id="inputId" type="text" name="phoneNumber"required><br>
                <!-- regex pattern is used to fulfill password requirements-->

            <label id="formId">Password:</label>
            <input id="passwordId" type="password" name="registerPassword" onKeyUp="validate()"pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d ~!#$]{6,12}$" title="Password must be 6-12 characters in length, contains at least 1 lower case, 1 upper case, 1 number and one of following special character ~!#$"required><br>
               <!-- regex pattern is used to fulfill password requirements-->
            <label id="formId">Confirm password:</label>
            <input id="confirmPasswordId" type="password" name="confirmPassword" onKeyUp="validate()"pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d ~!#$]{6,12}$" title="Password must be 6-12 characters in length, contains at least 1 lower case, 1 upper case, 1 number and one of following special character ~!#$"required><span id="message"></span><br>

                  <!-- regex pattern is used to fulfill password requirements-->
                 <label id="depositAmountId" name= "depositAmount">Deposit amount:</label>
            <input id="inputId" type="number" min ="5" step ="5" name="depositAmount"placeholder="minimum: $5"required><br>

            <label id="formId">Card number:</label>
            <input id="inputId"type="text" name="cardNumber"required><br>

            <label id="formId">CVV:</label>
            <input id="inputId" type="text" name="cvv"required><br>
              <!-- captcha to prove it is human-->
              Type Captcha:<input type="text" name="captcha"><img src="captcha.php"><br/>

            <input id="submitId" type="submit" name="submitButton"/><br>
            </form>
                  
                  <a href = "index.php"> Back to main page </a><br/>
                  <!-- forgot password feature-->
                  <a href ="forgottenPassword.php">Forgotten Password </a>
                <!-- scripts to match the the inputs of 'passwords' and 'retype Passwords'. Shows error if it doesnot match-->
                <script>
            function validate(){

                var a = document.getElementById("passwordId").value;
                var b = document.getElementById("confirmPasswordId").value;

                if (a !== b) {
                   document.getElementById("message").innerHTML="<font color ='red'>Passwords do not match</font>";
                    document.getElementById("submitId") = false;
                }
                else
                {
                    document.getElementById("message").innerHTML="<font color = 'green'>Correct</font>";
                    document.getElementById("submitId") = true;
                }
            }
         </script>
            </div>
        </div> 

    </body>
    </html>

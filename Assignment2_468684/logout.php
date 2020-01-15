<?php
  // destroying session when the user Logs out.

    include("sesssion.php");
    session_destroy();
    header('location:./index.php');


?>
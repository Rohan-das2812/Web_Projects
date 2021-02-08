<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   
   echo 'You have cleaned session,Please wait while we redirect you to the home page';
   header('Refresh:1; URL=front.html');
?>
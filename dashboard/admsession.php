<?php
	session_start();
   include 'config.php';
   
   $user_check = $_SESSION['adm_user'];
   
   if(!isset($_SESSION['adm_user']) || $user_check != 'libadmin'){
      header("location:index.php");
   }
?>
<?php 
  define('__CONFIG__', true);
  if (!defined('__CONFIG__')) 
  {
    exit('You do not have a config file!!');
  }

  include_once "include/classes/DB.php";
  session_destroy();
 header("Location: index.php")


 ?>
<?php
  //ob_start(); 
define('__CONFIG__', true);
  if (!defined('__CONFIG__')) 
  {
    exit('You do not have a config file!!');
  }

  include_once "include/classes/DB.php";

	if (isset($_POST['login']))
	{
    $email = mysqli_real_escape_string($dbconnection, $_POST['inputEmail']);
    $password = mysqli_real_escape_string($dbconnection, $_POST['inputPassword']);

		    $sql_select_users_login = "SELECT * FROM users WHERE email = '{$email}'";
        $result_sql_select_users_login = mysqli_query($dbconnection, $sql_select_users_login);

        if (!$result_sql_select_users_login)
            {
              die("Error description:" . mysqli_error());
            }

        while ($row_user_login = mysqli_fetch_assoc( $result_sql_select_users_login))
              {
               $id_user_login = $row_user_login['id'];
               $user_login_email = $row_user_login['email'];
               $user_login_password = $row_user_login['password'];
              }
              if ($user_login_email === $email && $user_login_password === md5($password))
              {
                $_SESSION['id'] = $id_user_login;
                $_SESSION['email'] = $user_login_email;
                $_SESSION['password'] = $user_login_password;
              	echo " ok";
              	header("Location: admin/index.php");
              	
              }
              else
              {
              	echo "nije ok";
              	$_SESSION['email'] = null;
              	$_SESSION['password'] = null;
              	header("Location: index.php");
              }
              
          
	}

 ?>
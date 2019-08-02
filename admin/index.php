<?php 
  define('__CONFIG__', true);
  if (!defined('__CONFIG__')) 
  {
    exit('You do not have a config file!!');
  }

  include_once "../include/classes/DB.php";

  if (!isset($_SESSION['id']))
  {
    header("Location: ../index.php");
    
  }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Administration</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<h1 align="center">This is admin area</h1>
	<div class="container">
	<nav class="navbar navbar-dark bg-primary">
  		 <a href="../index.php" class="navbar-brand"><p align="right">Login Area</p></a>
  		 <a href="../register.php" class="navbar-brand"><p align="right">Register Area</p></a>
  		 <a href="../logout.php" class="navbar-brand"><p align="right">Logout</p></a>
	</nav>
	 <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Password MD5</th>
      </tr>
    </thead>
    <tbody>
  			<?php 
                $counter= 0;
                $sql_select_users = "SELECT * FROM users ORDER BY id desc";
                $result_sql_select_users = mysqli_query($dbconnection, $sql_select_users);
                while ($rowuser = mysqli_fetch_assoc($result_sql_select_users))
                {
                  $view_user_id = $rowuser['id'];
                  $view_user_email = $rowuser['email'];
                  $view_user_password = $rowuser['password'];
                  $counter++;
        ?>
      <tr>
        <th scope="row"><?php echo $counter . "."; ?></th>
        <td><?php echo $view_user_email; ?></td>
        <td><?php echo $view_user_password; ?></td>
      </tr>
        <?php }  ?>
  </tbody>
</table>
<h5>By Nedzad Mesic / neckozenica@gmail.com</h5>
</div>
</body>
</html>
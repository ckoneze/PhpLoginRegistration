
<?php 
    define('__CONFIG__', true);
    require_once "include/config.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP Login/Register Form</title>
</head>
<body>
    <h1 align="center">Registration page</h1>
    <div id="logreg-forms">
        <?php 
            $current_date = date('d/m/Y');
            if (isset($_POST['btn-register'])) 
            {
                //$add_email=$_POST['inputEmail'];
                $add_email = mysqli_real_escape_string($dbconnection, $_POST['inputEmail']);
                $add_password = mysqli_real_escape_string($dbconnection, $_POST['inputPassword']);
                //$add_password=$_POST['inputPassword'];
                $add_user_password=md5($add_password);
                $sql_add_user = "INSERT INTO users(email,password,reg_time) VALUES('$add_email', '$add_user_password', '$current_date')";
                $result_sql_add_user= mysqli_query($dbconnection, $sql_add_user);
                if (!$result_sql_add_user)
                {
                  die("Error description:" . mysqli_error());
                }
                else
                {
                  echo "Data added successfully";
                  header("Location: index.php");
                }
            }

         ?>
        <form action="register.php" method="post" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Create Account</h1>
            <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required="" autofocus=""><br>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="">
            <hr>
            <!-- <p>Don't have an account!</p>  -->
            <button class="btn btn-primary btn-block" type="submit" name="btn-register" id="btn-register" ><i class="fas fa-user-plus"></i> Register New Account</button>
            
        </form>

            <br>
           
    </div>
    <p align="center">
        Already a member? <a href="index.php">Sign in</a>
    </p>
    <p style="text-align:center">
        By Nedzad Mesic / neckozenica@gmail.com
    </p>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
</body>
</html>
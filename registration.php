<?php

require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];
    $tel = $_POST["tel"];
    $duplicate = mysqli_query($conn,"SELECT * FROM tb_user WHERE username='$username' OR email='$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or Email Has Already Taken');</script>";
        
    } 
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUE('','$name','$username','$email','$password','$birthday','$gender','$tel')";
            mysqli_query($conn,$query);
            "<script> alert('Registration Successful');</script>";
        }
        else{
            echo
            "<script> alert('Password Does Not Match');</script>";
        }
    }
   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="regiscus.css">

<main class="form-signin w-100 m-auto">
<form class="" action="" method="post" autocomplete="off">
    <h1 class="h3 mb-4 fw-normal">Registration</h1>
    
    <div class="form-floating mb-4">
      
      <input type="text" class="form-control" name="name" id="name" required value="">
      <label for="floatingInput">Name</label>
    </div>

    <div class="form-floating mb-4">
      
      <input type="text" class="form-control" name="username" id="username" required value="">
      <label for="floatingInput">Username</label>
    </div>





    <div class="form-floating mb-4">
      
      <input type="date" class="form-control" name="birthday" id="birthday" required value="">
      <label for="floatingInput">Birthday</label>
    </div>
    <div class="form-floating mb-4">
      
      <input type="text" class="form-control" name="gender" id="gender" required value="">
      <label for="floatingInput">Gender</label>
    </div>
    <div class="form-floating mb-4">
      
      <input type="text" class="form-control" name="tel" id="tel" required value="">
      <label for="floatingInput">Tel</label>
    </div>








    <div class="form-floating mb-4">
      <!-- <input type="password" class="form-control" name="password"id="password" required value="" > -->
      <input type="email" class="form-control" name="email" id="email" required value="">
      <label for="floatingInput">Email</label>
    </div>

    <div class="form-floating mb-4">
      <!-- <input type="password" class="form-control" name="password"id="password" required value="" > -->
      <input type="password" class="form-control" name="password" id="password" required value="">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-floating mb-4">
      <!-- <input type="password" class="form-control" name="password"id="password" required value="" > -->
      <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required value="">
      <label for="floatingPassword">Confirm Password</label>
    </div>

    <button type="submit" name="submit" class="btn btn-primary w-100 py-2">Register</button> 

    <form class="" action="index.php" method="post" autocomplete="off">
    <!-- <button class="btn btn-primary w-100 py-2" type="submit" name ="submit" >Register</button> -->
    <div class="login">
 <a href="login.php" class="btn btn-primary w-100 py-2">Login</a>
    </div>
   
    <!-- <p class="mt-5 mb-3 text-body-secondary">Don't have an account yet? <a href="registration.php">Click here</a> to sign up</p> -->
  

</form>
</main>
<br>
<!-- <a href="login.php" class="btn btn-primary w-100 py-2">Login</a> -->
</body>
</html>
<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn,"SELECT * FROM tb_user WHERE username='$usernameemail' OR email='$usernameemail' ");
    $row = mysqli_fetch_assoc($result);
    
    if(mysqli_num_rows($result) >0 ){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }
        else{
            echo
        "<script> alert('Wrong Password');</script>";
        }
    }
    else{
        echo
        "<script> alert('User Not registered');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- custom.css-->
    <link rel="stylesheet" href="custom.css">
    <style>
        .form-control {
            font-size: 1.2rem; 
            padding: 1rem; 
        }
    </style>
</head>
<body>
    <main class="container d-flex justify-content-center align-items-center vh-100">
    <form class="w-100 max-w-md bg-light p-5 rounded-3 mb-5" action="" method="post" autocomplete="off">
    <img class="mb-4" src="envelope.png" alt="" width="72" height="72">
    <h1 class="h3 mb-4 fw-normal text-center">Please sign in</h1>
    <div class="form-floating mb-4">
        <input type="text" class="form-control" name="usernameemail" id="username" required="" value="" placeholder="name@example.com">
        <label for="username">Username or Email address</label>
    </div>
    <div class="form-floating mb-4">
        <input type="password" class="form-control" name="password" id="password" required="" value="" placeholder="Password">
        <label for="password">Password</label>
    </div>
    <button class="btn btn-primary w-100 py-3" type="submit" name="submit">Sign in</button>
    <p class="mt-4 mb-0 text-center">Don't have an account yet? <a href="registration.php">Click here</a> to sign up</p>
</form>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


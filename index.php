<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating a Stunning Personal Profile Card with HTML and CSS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="card">
  

  <div class="right-container">
    <h3 class="gradienttext">Profile Details</h3>
    <table>
        <tr>
            <td>Name :</td>
            <td><?php echo $row["name"]; ?></td>
          </tr>
      <tr>
        <td>Username :</td>
        <td><?php echo $row["username"]; ?></td>
      </tr>
      <tr>
        <td>Birthday :</td>
        <td><?php echo $row["birthday"]; ?></td>
      </tr>
      <tr>
        <td>Gender :</td>
        <td><?php echo $row["gender"]; ?></td>
      </tr>
      <tr>
        <td>Tel :</td>
        <td><?php echo $row["tel"]; ?></td>
      </tr>
      <tr>
        <td>Email :</td>
        <td><?php echo $row["email"]; ?></td>
      </tr>
      
      <tr>
        <td>Password :</td>
        <td><?php echo $row["password"]; ?></td>
      </tr>

      
    </table>
  
    <div class="button">
        <a href="logout.php" class="btn btn-primary w-100 py-2">Logout</a>
    </div>
  </div>
</div>

</body>
</html>

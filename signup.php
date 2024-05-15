<?php 
$alert = false;
$exists = false;
if($_SERVER ["REQUEST_METHOD"] == "POST"){
  include 'partials/dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];

  $existQuery = "SELECT * FROM `formisecure` where username = '$username'";
  $existResult = mysqli_query($connection, $existQuery);
  $numRows = mysqli_num_rows($existResult);
  if($numRows > 0){
    $exists =  true;
  }
  else{

    if($password == $cpassword){
      
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `formisecure` (`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp())";
      $result = mysqli_query($connection, $sql);
      if($result){
        $alert = true;
      }

    }
      else{
        echo "Passwords do not match";
    }
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup to iSecure!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  
    <?php 
    require('partials/nav.php');
    ?>

    <?php 
    if($alert){
      echo "<div class= 'alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Holy guacamole!</strong> data has been inserted successfully
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }

    elseif ($exists){
      echo "<div class= 'alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>warning!</strong> user already exists
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";;
    }
    else{
      echo "<div class= 'alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>failed!</strong> data has not been inserted successfully
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
      ?>
    <div class="container my-4">
    <form action="/phpForm/signup.php" method="post">
     
  <div class="mb-3">
    <label for="username" class="form-label">username</label>
    <input type="type" class="form-control" id="username" name="username" >
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
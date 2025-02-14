<?php 
$alert = false;
$login = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'partials/dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = "SELECT * FROM formisecure WHERE username='$username'";
  $result = mysqli_query($connection, $sql);
  $num = mysqli_num_rows($result);
  if($num >= 1){
    while($row = mysqli_fetch_assoc($result)){ // corrected operator here
      if(password_verify($password, $row['password'])){
        $login = true;
        $alert = true;
        session_start();
        $_SESSION["loggedin"] = true;   
        $_SESSION["username"] = $username;
        header('location:/phpform/welcome.php');   
      }
    }
  } else {
    $alert = false;
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
      <strong>Success!</strong> You logged in successfully
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    else{
      echo "<div class= 'alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Sorry!</strong> Invalid Data
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    ?>
    <div class="container my-4">
    <form action="/phpForm/login.php" method="post">
     
  <div class="mb-3">
    <label for="username" class="form-label">username</label>
    <input type="type" class="form-control" id="username" name="username" >
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

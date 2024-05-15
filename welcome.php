<?php 
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin" ]!=true){
header("location:login.php") ;
exit();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Welcome to iSecure</title>
    </head>
    <body>
    <?php 
    require('partials/nav.php');
    ?>
    <div class="container">
    <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Welcome <?php echo $_SESSION['username']; ?>!</h4>
  <p>Aww yeah, you successfully loggedin to our iSecure app.</p>
  <hr>
  <p class="mb-0">Whenever you want to logout, use this link inorder to logout <a href="/phpform/logout.php">click here</a>.</p>
</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
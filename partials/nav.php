

<?php
$loggedin = false;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
}

echo '<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">iSecure</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/phpForm/welcome.php">Home</a>
            </li>';
if (!$loggedin) {

    echo'<li class="nav-item">
                <a class="nav-link" href="/phpForm/signup.php">Signup</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/phpForm/login.php">Login</a>
                </li>';
}
if ($loggedin) {

    echo '<li class="nav-item">
            <a class="nav-link" href="/phpForm/logout.php">Logout</a>
            </li>';
            
}
echo '</div>
            </div>
            </nav>'
?>
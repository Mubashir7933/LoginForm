<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'users';

$connection = mysqli_connect($servername, $username, $password, $database);

if($connection){
    //echo "Working";
}
else{
    echo "not working";
}
?>
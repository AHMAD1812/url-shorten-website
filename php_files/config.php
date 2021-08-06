<?php

$conn = mysqli_connect("localhost:3308","root","","urlShorten");

if(!$conn){
    echo "DataBase Error".mysqli_connect_error();
}

?>
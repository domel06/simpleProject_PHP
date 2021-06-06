<?php 
//connect to the database
$conn = mysqli_connect('localhost','domel','domel1234','pizzas');

if(!$conn){
    echo 'erro :'.mysqli_connect_error();
}
else{
    //echo 'connection succesfull';
}

?>
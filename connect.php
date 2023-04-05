<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'nexuslink';

$database= new mysqli($host,$user, $password,$db);
if ($database->connect_error){
    die("Connection failed:  ".$database->connect_error);
}


?>
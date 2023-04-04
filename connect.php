<?php
$host = 'db4free.net';
$user = 'rendel';
$password = 'Rendel78';
$db = 'nexuslink';

$database= new mysqli($host,$user, $password,$db);
if ($database->connect_error){
    die("Connection failed:  ".$database->connect_error);
}


?>
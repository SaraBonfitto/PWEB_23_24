<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'agenzia_viaggi';


try {
    $cid = new mysqli($hostname,$username,$password,$db);
} catch (Exception $e) {
    $cid=null;
}




?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$config = file_get_contents('config.json');



$data = json_decode($config);


$use_root = $data->mariadb_use_root_account;

if ($use_root == 'false') {
    $password = $data->mariadb_password;
    
    $conn = new mysqli("localhost", "onlygit", $password, "onlygit");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
} else {
    $password = $data->mariadb_root_password;
    
    $conn = new mysqli("127.0.0.1", "onlygit_root", $password, "onlygit");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "YOU ARE USING THE ROOT USER! YOU MAY DAMAGE THE SERVER!";
}

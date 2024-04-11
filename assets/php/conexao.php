<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "unitec";

try{
    $conn = new PDO("mysql:host=$host;dbname=". $dbname, $user, $pass);
    //echo "conexao realizada";
}catch(PDOException $err){
    //echo "Erro";
}

?>
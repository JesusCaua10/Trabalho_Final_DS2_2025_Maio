<?php
$host = 'localhost';
$dbname = 'sistema_SGF';
$user = 'root';
$pass = '';

$mysqli = new mysqli($host, $user, $pass, $dbname);

if ($mysqli->error) {
    die("Não conseguiu conectar ao banco de dados: " . $mysqli->error);
}
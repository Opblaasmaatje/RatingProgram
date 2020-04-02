<?php
session_start();
$servername = "mysql:host=localhost;dbname=ratingprogram";
$username = "root";
$password = "";
$pdo = new PDO($servername, $username, $password);

if($_GET['id'] == NULL || !isset($_GET['id']) || $_GET['id'] == 0){
    header("location: index.php");
}

$game = $pdo->query("SELECT console, foto, genre, naam, omschrijving, trailer FROM ratingprogram.gamedata WHERE id = '$_GET[id]'");
$gameInfo = $game->fetch();
//hier wordt het opgehaald

echo $gameInfo["console"];
echo $gameInfo["foto"];
echo $gameInfo["genre"];
echo $gameInfo["naam"];
echo $gameInfo["omschrijving"];
echo $gameInfo["trailer"];
//hier wordt het neer gezet
?>
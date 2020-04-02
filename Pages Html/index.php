<?php
session_start();
$servername = "mysql:host=localhost;dbname=ratingprogram";
$username = "root";
$password = "";
$pdo = new PDO($servername, $username, $password);

if(!isset($_SESSION['gebruiker'])){
    header ("location: inlog.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/RatingProgram/Style/home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php   
        $user = $pdo->query("SELECT email, gebruikersnaam, admin, Verified FROM ratingprogram.gebruikerdata WHERE id = '$_SESSION[gebruiker]'");
        $userInfo = $user->fetch();
        //hier wordt het opgehaald
        echo $userInfo["email"];
        echo $userInfo["gebruikersnaam"];
        if (isset($userInfo["admin"])) {
            echo $userInfo["admin"];
        }
        if (isset($userInfo["Verified"])) {
            echo $userInfo["Verified"];
        }
        //hier wordt het neer gezet
        //dit is gebruikersinfo
        ?>

    <?php
    $game = $pdo->query("SELECT naam, foto, genre FROM ratingprogram.gamedata");
    while($gameInfo = $game->fetch()){
        echo $gameInfo["naam"];
        echo "<img src='".$gameInfo["foto"]."'></img>";
        echo $gameInfo["genre"];
        //hier wordt game info geladen
    }

    ?>

</body>
</html>
<?php
session_start();
$_SESSION['gebruiker'];

$servername = "mysql:host=localhost;dbname=ratingprogram";
$username = "root";
$password = "";
$pdo = new PDO($servername, $username, $password);


$gebruikerInfo = array();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
    <div class="loginbox">
        <div class="loginvalue">
            <h1>Login</h1>
        </div>
        <form method="post">
            <input type="text" placeholder="Email" name="email" require>
            <input type="password" placeholder="password" name="wachtwoord" require>
            <button type="sumbit">Log in</button>
            <?php
                if(isset($_POST["email"]) || isset($_POST["wachtwoord"])) {
                    $emailIn = strtolower($_POST['email']);
                    $wachtwoordIn = $_POST['wachtwoord'];
                    // ingevulde wachtwoord en email van gebruiker 
                    if (!filter_var($emailIn, FILTER_VALIDATE_EMAIL)) {
                        echo "Invalid email format";
                        exit();
                        //hier wordt gekeken of het email wel email format is
                    }
                    $log = $pdo->query("SELECT email, wachtwoord, id FROM ratingprogram.gebruikerdata WHERE email = '$emailIn'");
                    $inlogPremit = $log->fetch();
                    if ($emailIn == $inlogPremit['email'] && $wachtwoordIn == $inlogPremit['wachtwoord']) {
                        $_SESSION["gebruiker"] = $inlogPremit["id"];
                        header ("location: index.php");
                        //kijkt of de email klopt me die geven met een email in database, hetzelfde voor wachtwoord
                    }
                }
            //Hier wordt daadwerkelijk ingelogd

            ?>
        </form>
        <a href=""></a>
        
            <div class="loginvalue">
               <h1> Register</h1>
               <a href=""></a>
            </div>
        <input type="submit" value="Take Me To the Register Page">

        <div class="infoicons">
            <h1> Other Login Methods</h1>
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-snapchat"></a>
            <a href="#" class="fa fa-instagram"></a>
        </div>
    </div>
          
     
        
    </div>
</div>
</body>
</html>
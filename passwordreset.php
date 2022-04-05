<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: index.php");
  exit;
} else {
		$expireAfter = 15;
		if(isset($_SESSION['last_action'])){
			$secondsInactive = time() - $_SESSION['last_action'];
			$expireAfterSeconds = $expireAfter * 60;

			if($secondsInactive >= $expireAfterSeconds){
			   	 session_unset();
       			 session_destroy();
				header("Location: ../index.php");
				exit;
   			 }
		}
	$_SESSION['last_action'] = time();
	}
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
        require("mysql.php");
        $stmt = $mysql->prepare("SELECT * FROM accounts WHERE EMAIL = :email"); //Username überprüfen
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count != 0){
          $token = generateRandomString(25);
            $stmt = $mysql->prepare("UPDATE accounts SET TOKEN = :token WHERE EMAIL = :email");
            $stmt->bindParam(":token", $token);
            $stmt->bindParam(":email", $_POST["email"]);
            $stmt->execute();
            mail($_POST["email"],
            "Passwort zurücksetzen",
            "Guten Tag, es wurde von dieser E-Mail eine Passwortzurücksetzung gefordert. Das funktioniert ganz einfach: \r\n1. Diesen Link öffnen: LINK/register/setpassword.php?token=$token \r\n2. Das neue Passwort eingeben! \r\n3. Feierabend! Dein Passwort wurde höchstwahrscheinlich fehlerfrei gespeichert! \r\nFalls es noch Fragen gibt, bitte an  wenden!", "FROM: ");
            echo "Die Email wurde versendet";
        } else {
            echo "Diese Email ist wurde nicht registriert";
        }
    }
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    ?>
    <h1>Passwort vergessen?</h1>
    <form action="passwordreset.php" method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <button type="submit" name="submit">Zurücksetzen</button>
    </form>
</body>

</html>

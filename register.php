<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: ./index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Account erstellen</title>
</head>

<body>
  <?php
  if (isset($_POST["register"])) {
    require("mysql.php");
    $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); //Username überprüfen
    $stmt->bindParam(":user", $_POST["username"]);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 0) {
      //Username ist frei
      $stmt = $mysql->prepare("SELECT * FROM accounts WHERE EMAIL = :email"); //Email überprüfen
      $stmt->bindParam(":email", $_POST["email"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      if ($count == 0) {
        if ($_POST["pw"] == $_POST["pw2"]) {
          //User anlegen
          $stmt = $mysql->prepare("INSERT INTO accounts (USERNAME, PASSWORD, EMAIL, TOKEN) VALUES (:user, :pw, :email, null)");
          $stmt->bindParam(":user", $_POST["username"]);
          $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
          $stmt->bindParam(":pw", $hash);
          $stmt->bindParam(":email", $_POST["email"]);
          $stmt->execute();
          echo "Dein Account wurde angelegt";
          header("Location: kunden/index.php");
        } else {
          echo "Die Passwörter stimmen nicht überein";
        }
      } else {
        echo "Email bereits vergeben";
      }
    } else {
      echo "Der Username ist bereits vergeben";
    }
  }
  ?>
  <!---<form action="register.php" method="post">
    <input name="username" type="text" placeholder="Username">
    <input name="email" type="text" placeholder="E-Mail">
    <input name="pw" type="text" placeholder="PW1">
    <input name="pw2" type="text" placeholder="PW2">
    <button name="submit" type="submit">Submit</button>
  </form>--->
</body>

</html>
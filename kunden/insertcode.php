<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: ../index.php");
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
<?php
$mysqli = mysqli_connect("localhost", "dbadmin", "j;EwvC9!rQ%B");
$db = mysqli_select_db($mysqli, "kunden");

if(isset($_POST["insertdata"])) {

  $name = $_POST['name'];
  $tele = $_POST['tele'];
  $adresse = $_POST['adresse'];
  $tier = $_POST['tier'];
  $tname = $_POST['tname'];
  $gbdatum = $_POST['gbdatum'];
  $infos = $_POST['infos'];
  $query = "INSERT INTO poster (NAME, TELE, ADRESSE, TIER, TNAME, GBDATUM, INFOS) VALUES ('$name', '$tele', '$adresse', '$tier', '$tname', '$gbdatum', '$infos')";
  $query_run = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

  if($query_run) {
    echo '<script> alert("Speichern war erfolgreich!"); </script>';
    header('Location: index.php');
  }
  else {
    echo '<script> alert("Ein Fehler ist aufgetreten!"); </script>';
  }
}
 ?>

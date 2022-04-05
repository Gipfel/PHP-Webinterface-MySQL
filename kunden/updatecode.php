<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: ../index.php");
  exit;
} else {
		$expireAfter = 60 * 2;
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
$mysqli = mysqli_connect("", "", "");
$db = mysqli_select_db($mysqli, "kunden");

if(isset($_POST["updatedata"])) {
  $update_id = $_POST['update_id'];
  $infos = $_POST['infos3'];

  $query = "UPDATE poster SET INFOS='$infos' WHERE id='$update_id'";
  $query_run = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

  if($query_run) {
	  header("Location: index.php");
    echo '<script> alert("Speichern war erfolgreich!"); </script>';
  }
  else {
    echo '<script> alert("Ein Fehler ist aufgetreten!"); </script>';
  }
}
 ?>

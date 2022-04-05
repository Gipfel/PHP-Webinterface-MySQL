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
$mysqli = mysqli_connect("", "", "");
$db = mysqli_select_db($mysqli, "kunden");

if(isset($_POST["deletedata"])) {

  $id = $_POST['delete_id'];
  $query = "DELETE FROM poster WHERE id='$id'";
  $query_run = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

  if($query_run) {
    echo '<script> alert("Löschen war erfolgreich!"); </script>';
    header('Location: index.php');
  }
  else {
    echo '<script> alert("Ein Fehler ist aufgetreten!"); </script>';
  }
}
 ?>

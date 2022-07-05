<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: ../index.php");
  exit;
}
 ?>
<?php
class DBController {
	private $conn = "";
	private $host = "";
	private $user = "";
	private $password = "";
	private $database = "kunden";

	public function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->conn = $conn;
		}
	}

	public function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	public function runSelectQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	public function executeInsert($query) {
        $result = mysqli_query($this->conn,$query);
        $insert_id = mysqli_insert_id($this->conn);
		return $insert_id;

    }
	public function executeUpdate($query) {
        $result = mysqli_query($this->conn,$query);
        return $result;

    }

	public function executeQuery($sql) {
		$result = mysqli_query($this->conn,$sql);
		return $result;

    }

	public function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;
	}
}
?>

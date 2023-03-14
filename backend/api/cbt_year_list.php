<?php
$servername = "localhost";
$username = "root";
$password = "aot#avsec";
$dbname = "xsim2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT YEAR(`record_date`) as year FROM `cbt` GROUP by YEAR(`record_date`)";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  echo "<option selected dsable>".date('Y')+543 ."</option>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<option value=" . $row["year"] .">".(((int) $row["year"])+543)."</option>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
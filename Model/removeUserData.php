<?php
  session_start(); 
  if (!isset($_SESSION['username'])) {
    header('location: ../View/signIn.php');
  }
  if (isset($_GET['logout'])) {
    session_start();
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../View/signIn.php");
  }
$uname=$_GET['uname'];
$conn = mysqli_connect("localhost", "root", "","database");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM userdata WHERE username='$uname'";

if (mysqli_query($conn, $sql)) {
    header("location:../View/adminUserInformation.php");
} 
else {
    echo "Error deleting record: " . mysqli_error($conn);

}
mysqli_close($conn);

?>
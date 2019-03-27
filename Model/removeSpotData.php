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

$photo=$_GET['photo'];

$filePath="Uploads/$photo";
// Create connection
 if (file_exists($filePath)) 
               {
                 unlink($filePath);
                  echo "File Successfully Delete."; 
              }
              else
              {
               echo "File does not exists"; 
              }



$conn = mysqli_connect("localhost", "root", "","database");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM spotdata WHERE spotimage='$photo'";

if (mysqli_query($conn, $sql)) {
    if($_SESSION["type"]=="admin")
    {header("location:../View/adminGallery.php");}
  else
  {
    header("location:../View/userGallery.php");
  }
} 
else {
    echo "Error deleting record: " . mysqli_error($conn);

}
mysqli_close($conn);

?>
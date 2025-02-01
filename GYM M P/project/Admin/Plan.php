<?php
include("connection.php");
error_reporting(0);

$name  = $_POST['Plname'];
$Price = $_POST['Price'];
$f1    = $_POST['f1'];
$f2    = $_POST['f2'];
$f3    = $_POST['f3'];
$f4    = $_POST['f4'];
$f5    = $_POST['f5'];
$f6    = $_POST['f6'];

$sql = " INSERT INTO `plan`(`Name`, `Price`, `Facility 1`, `Facility 2`, `Facility 3`, `Facility 4`, `Facility 5`, `Facility 6`) VALUES ('$name','$Price','$f1','$f2','$f3','$f4','$f5','$f6')";

$data  = mysqli_query($con, $sql);

if ($data) {
    echo "<script> alert('Plan Sucessfully..!') </script>";
?>
    <meta http-equiv="refresh" content="1; url=http://localhost/project/Admin/Admin.php" />
<?php
    header("refresh:0; url=http://localhost/project/Admin/Admin.php");
} else {
    echo "<script> alert('Plan Not Added..!') </script>";
}
?>
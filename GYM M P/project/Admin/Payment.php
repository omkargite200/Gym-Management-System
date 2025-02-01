<?php
include("connection.php");
error_reporting(0);

$name     = $_POST['Pname'];
$UEmail   = $_POST['PUname'];
$Phone   = $_POST['Phone'];
$EPhone    = $_POST['EPhone'];
$Plan    = $_POST['Plan'];
$Amount     = $_POST['Amt'];
$DOJ    = $_POST['DOJ'];

$sql = " SELECT * FROM `register` where Username='$UEmail' or Email='$UEmail' ";
$data = mysqli_query($con, $sql);

if ($data) 
{
  if (mysqli_num_rows($data) == 1) 
  {
    $sql1 = " INSERT INTO `payment`(`Name`, `Email`, `Phone`, `Emergency`, `Plan`, `Amount`, `Date Of Joining`) VALUES ('$name','$UEmail','$Phone','$Ephone','$Plan','$Amount','$DOJ')";

    $data1  = mysqli_query($con, $sql1);

    if ($data1) 
    {
      echo "<script> alert('Payment Sucessfully..!') </script>";
?>
<meta http-equiv="refresh" content="1; url=http://localhost/project/Admin/Admin.php#"/>
<?php
        } else {
            echo "<script color='red'> alert('Payment NOT DONE..!') </script>";
        }
    } else {
        echo "<script> alert('User Not Registered Please Registered First..!') </script>";
    }
    header("refresh:0; url=http://localhost/project/Admin/Admin.php");
}
?>
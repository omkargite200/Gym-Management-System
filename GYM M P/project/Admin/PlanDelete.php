<?php
    include("connection.php");
    error_reporting(0);

    $id = $_GET['id'];
    $query = " DELETE FROM plan where id='$id' ";
    $data  = mysqli_query($con,$query);

    if(isset($data))
    {
        echo"<script> alert('Plan Deleted..!') </script>";
?>
<meta http-equiv="Refresh" content="2; URL=http://localhost/project/Admin/Admin.php">
<?php
    }
    else
    {
        echo"<script> alert('Plan is Saved..!') </script>";
    }
?>
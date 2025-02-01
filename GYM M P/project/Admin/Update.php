<?php
    include("connection.php");
    error_reporting(0);

    $id = $_GET['id'];
    $query = " SELECT * FROM register where ID='$id' ";
    $data  = mysqli_query($con,$query);
    $result = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="Admin.css">
  <title> Admin Site </title>
</head>
  <div class="container_form" id="update">
      <form method="POST">
        <h1> Update Form </h1>
        <div class="input_field">
          <input type="text" placeholder="Full Name" name="name" value="<?php echo $result['Name']; ?>" required>
          <select class="input_field" name="Gender" required>
            <option value="Not Selected"> <?php echo $result['Gender']; ?> </option>
            <option value="Male"> Male </option>
            <option value="Female"> Female </option>
            <option value="Other"> Other </option>
          </select><br>
          </i><input type="text" placeholder="Username" name="Username" value="<?php echo $result['Username']; ?>" required><br>
          </i><input type="number" placeholder="Phone Number" name="Phone" value="<?php echo $result['Phone']; ?>" required><br>
          </i><input type="email" placeholder="Email" name="Email" value="<?php echo $result['Email']; ?>" required><br>
        </div>
        <div class="">
          <button type="cancel" class="btn"> Cancel </button>
          <input type="submit" class="btn" name="update" value="update">
        </div>
      </form>
    </div>
</div>

<?php
include('connection.php');
error_reporting(0);

if($_POST['update'])
{
    $name = $_POST['name'];
    $Gender = $_POST['Gender'];
    $username = $_POST['Username'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $query = " UPDATE `register` SET `Name`='$name',`Gender`='$Gender',`Username`='$username',`Phone`='$Phone',`Email`='$Email' WHERE ID='$id'";
    $data=mysqli_query($con,$query);
    if($data)
    {
      echo "<script> alert('Update Sucessfully..!'); </script>"; 
    
    ?>
  <meta http-equiv="refresh" content="0; url=http://localhost/project/Admin/Admin.php#" />
    <?php
    }
    else
    {
        echo"Failed..!";
    }
}
?>

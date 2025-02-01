<?php
session_start();
error_reporting(0);
$Admin = $_SESSION['Admin_name'];
if ($Admin == true) {
}
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="Admin.css">
  <title> Admin Site </title>
  <style>
  </style>
</head>

<body>
  <nav>
    <ul class="nav_links">
      <div class="profile">
        <img src="assets/logo.jpg" onclick="toggleMenu()">
      </div>
      <hr>
      <li class="link"><a href="#" onclick="dashboard()"> Dashboard </a></li>
      <li class="link"><a href="#" onclick="toggleregister()"> New Registration </a></li>
      <li class="link"><a href="#" onclick="Member()"> Members </a></li>
      <!-- <li class="link"><a href="#" onclick="Payment()"> Payment </a></li> -->
      <li class="link"><a href="#" onclick="Plan()"> Plan </a></li>
    </ul>
  </nav>

  <div>
    <?php
    include("connection.php");
    error_reporting(0);
    $sql = " SHOW TABLE STATUS LIKE 'register'";
    $data = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($data);

    $sql1 = " SHOW TABLE STATUS LIKE 'plan'";
    $data1 = mysqli_query($con,$sql1);
    $row1 = mysqli_fetch_assoc($data1);
    ?>
    <div class="dash" id="Dashboard">
      <div class="search">
        <h2> Dashboard </h2>
        <div class="dash_profile">
          <form method="post" class="S">
            <input type="text" name="Search" placeholder="Search" value="<?php if(isset($_POST['Search'])){echo $_POST['Search']; } ?>" autocomplete="off" onclick="Find()">
            <button name="submit" value="Go" onclick="Find()"> GO </button>
          </form>
          <img src="assets/profile.jpeg" onclick="toggleMenu()">
        </div>
      </div>
    </div>
    <div class="dash1" id="find">
      <div class="dashboard">
        <h1 class="O">OverView</h1>
        <div class="data">
          <div class="data_info">
            <h1>Total Income : </h1>
            <hr>
            <h2>Rs.90000/-</h2>
          </div>
          <div class="data_info" onclick="Member()">
            <h1>Total Members : </h1>
            <hr>
            <h2><?=$row['Rows']; ?></h2>
          </div>
          <div class="data_info" onclick="Plan()">
            <h1>Available Plans : </h1>
            <hr>
            <h2> <?=$row1['Rows'];?> </h2>
          </div>
          <div class="data_info">
            <h1>Available Trainer: </h1>
            <hr>
            <h2> 5 </h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include("connection.php");
  error_reporting(0);
  $query = "SHOW TABLE STATUS LIKE 'register' ";
  $data  = mysqli_query($con, $query);
  $result = mysqli_fetch_assoc($data);
  ?>
  <div class="register">
    <div class="container_form" id="register">
      <form action="#" method="POST" autocomplete="off">
        <h1> Registration Form </h1>
        <h2> User ID: <?= $result['Auto_increment']; ?></h2>
        <div class="input_field">
          <i class='bx bxs-user'></i><input type="text" placeholder="Full Name" name="name" required>
          <i class='bx bxs-user'></i><select class="input_field" name="Gender">
            <option value="Not Selected"> Select Your Gender </option>
            <option value="Male"> Male </option>
            <option value="Female"> Female </option>
            <option value="Other"> Other </option>
          </select><br>
          <i class='bx bxs-user'></i><input type="text" placeholder="Username" name="Username" required><br>
          <i class='bx bxs-phone'></i><input type="number" placeholder="Phone Number" name="Phone" required><br>
          <i class='bx bx-envelope'></i><input type="email" placeholder="Email" name="Email" required><br>
          <i class='bx bxs-lock-alt'></i><input type="password" placeholder="password" name="Password" required><br>
          <i class='bx bxs-lock-alt'></i><input type="password" placeholder="Confirm password" name="CPassword" required>
        </div>
        <div class="">
          <button type="cancel" class="btn"> Cancel </button>
          <input type="submit" class="btn" name="Done"> </button>
        </div>
      </form>
    </div>
  </div>

  <?php
  include("connection.php");
  error_reporting(0);

  $query = " SELECT * FROM register ";

  $data  = mysqli_query($con, $query);

  $total = mysqli_num_rows($data);

  if ($total > 0) {

  ?>

    <div class="table" id="Member">
      <div class="table">
        <table border="0.5px" cellpadding="5px" cellspacing="0" width="70%" class="table">
          <h1> Registered Members </h1>
          <tr>
            <th width="5%"> ID </th>
            <th width="10%"> Name </th>
            <th width="8%"> Gender </th>
            <th width="8%"> Username </th>
            <th width="8%"> Phone NO </th>
            <th width="10%"> Email </th>
            <th width="10%"> Password </th>
            <th width="15%"> Confirm Password </th>
            <th width="15%" colspan="2" class="btn"> Action </th>
          </tr>

        <?php
        while ($result = mysqli_fetch_assoc($data)) {
          echo "<tr>
                    <td>" . $result['ID'] . "</td>
                    <td>" . $result['Name'] . "</td>
                    <td>" . $result['Gender'] . "</td>
                    <td>" . $result['Username'] . "</td>
                    <td>" . $result['Phone'] . "</td>
                    <td>" . $result['Email'] . "</td>
                    <td>" . $result['Password'] . "</td>
                    <td>" . $result['Confirm Password'] . "</td>
                    <td><a href='Update.php?id=$result[ID]' onclick='Update()'> Edit </td>
                    <td><a href='Delete.php?id=$result[ID]' onclick='return DeleteMe()'> Delete </td>
                </tr>
                ";
        }
      } else {
        echo "No Records";
      }
        ?>
        </table>
      </div>
    </div>
    </table>

    <?php

    include("connection.php");
    error_reporting(0);

    $query = " SELECT * FROM payment ";

    $data  = mysqli_query($con, $query);

    $total = mysqli_num_rows($data);

    if ($total > 0) {

    ?>

      <div class="table" id="paytable">
        <div class="table">
          <table border="1px" cellpadding="5px" cellspacing="0" width="70%" class="table">
            <h1> Done Payment </h1>
            <tr>
              <th width="5%"> ID </th>
              <th width="10%"> Name </th>
              <th width="8%"> Email </th>
              <th width="8%"> Phone </th>
              <th width="12%"> Emergency Number </th>
              <th width="15%"> Plan </th>
              <th width="10%"> Amount </th>
              <th width="15%"> Date of Joining </th>
              <th width="15%" colspan="2" class="btn"> Action </th>
            </tr>

          <?php
          while ($result = mysqli_fetch_assoc($data)) {
            echo "<tr>
                    <td>" . $result['ID'] . "</td>
                    <td>" . $result['Name'] . "</td>
                    <td>" . $result['Email'] . "</td>
                    <td>" . $result['Phone'] . "</td>
                    <td>" . $result['Emergency Phone'] . "</td>
                    <td>" . $result['Plan'] . "</td>
                    <td>" . $result['Amount'] . "</td>
                    <td>" . $result['Date Of Joining'] . "</td>
                    <td><a href='Update.php? id=$result[ID]'> Edit </td>
                    <td><a href='PDelete.php? id=$result[ID]' onclick='return DeleteMe()'> Delete </td>
                </tr>
                ";
          }
        }
          ?>
          </table>
        </div>
      </div>
      </table>

      <div class="container_form" id="payment">
        <form action="Payment.php" method="post">
          <h1> Make Payment </h1>
          <div class="input_field">
            <input type="text" placeholder="Name" name="Pname" required><br>
            <input type="text" placeholder="Enter Your Username or Email Correctly" name="PUname" required><br>
            <input type="text" placeholder="Enter Your Phone Number" name="Phone" required><br>
            <input type="text" placeholder="Enter Emergency Phone Number" name="EPhone" required><br>

            <select class="input_field" name="Plan">
              <option value="1 Month (Rs.500)"> Select New Plan </option>
              <option value="1 Month (Rs.500)">1 Month (Rs.500)</option>
              <option value="6 Month (Rs.1500)">6 Month (Rs.1500)</option>
              <option value="Lifetime (Rs.5000)">Lifetime (Rs.5000)</option>
            </select><br>

            <input type="number" placeholder="Amount" name="Amt" required><br>
            Date Of Joining:
            <input type="Date" placeholder="Date of Joining" name="DOJ" required>

          </div>
          <div class="">
            <button type="submit" class="btn"> Cancel </button>
            <button type="submit" class="btn" name="Pay"> Done </button>
          </div>
        </form>
      </div>

      <div class="container_form" id="plan">
        <form action="Plan.php" method="post">
          <h1> ADD PLAN </h1>
          <div class="input_field">
            <input type="text" placeholder="Enter Plan Name" name="Plname" required><br>
            <input type="text" placeholder="Enter Price of Plan" name="Price" required><br>
            <input type="text" placeholder="Enter Facility if it has" name="f1"><br>
            <input type="text" placeholder="Enter Facility if it has" name="f2"><br>
            <input type="text" placeholder="Enter Facility if it has" name="f3"><br>
            <input type="text" placeholder="Enter Facility if it has" name="f4"><br>
            <input type="text" placeholder="Enter Facility if it has" name="f5"><br>
            <input type="text" placeholder="Enter Facility if it has" name="f6"><br>
          </div>
          <div class="">
            <button type="text" class="btn"> Cancel </button>
            <button type="submit" class="btn" name="Plan"> ADD </button>
          </div>
        </form>
      </div>

      <?php

      include("connection.php");
      error_reporting(0);

      $query = " SELECT * FROM plan ";

      $data  = mysqli_query($con, $query);

      $total = mysqli_num_rows($data);

      if ($total > 0) {

      ?>

        <div class="table" id="Plantable">
          <div class="table">
            <table border="0.5px" cellpadding="15px" cellspacing="0" width="85%" class="table">
              <h1> Plan Table </h1>
              <tr>
                <th width="10%"> Name </th>
                <th width="7%"> Price </th>
                <th width="10%"> Facility 1 </th>
                <th width="10%"> Facility 2 </th>
                <th width="10%"> Facility 3 </th>
                <th width="10%"> Facility 4 </th>
                <th width="10%"> Facility 5 </th>
                <th width="10%"> Facility 6 </th>
                <th width="8%" colspan="2" class="btn"> Action </th>
              </tr>
            <?php
            while ($result = mysqli_fetch_assoc($data)) {
              echo "<tr>
                    <td>" . $result['Name'] . "</td>
                    <td>" . $result['Price'] . "</td>
                    <td>" . $result['Facility 1'] . "</td>
                    <td>" . $result['Facility 2'] . "</td>
                    <td>" . $result['Facility 3'] . "</td>
                    <td>" . $result['Facility 4'] . "</td>
                    <td>" . $result['Facility 5'] . "</td>
                    <td>" . $result['Facility 6'] . "</td>
                    <td><a href='#' onclick='AddPlan()'> Add </td>
                    <td><a href='PlanDelete.php? id=$result[ID]' onclick='return DeleteMe()'> Delete </td>
                </tr>
                ";
            }
          } else {
            echo "No Records";
          }
            ?>
            </table>
          </div>
        </div>
        </table>

        <?php

        if (isset($_POST['submit'])) {
          $search = $_POST['Search'];
          $query = " SELECT * FROM register where Name='$search' or ID='$search' or Phone='$search' or Username='$search'";
          $data  = mysqli_query($con, $query);
          $total = mysqli_num_rows($data);
          if ($data) {
            if ($total > 0) {
        ?>
              <div class="table" id="search">
                <div class="table">
                  <table border="0.5px" cellpadding="10px" cellspacing="0" width="70%" class="table">
                    <h1> Registered Members </h1>
                    <tr>
                      <th width="5%"> ID </th>
                      <th width="10%"> Name </th>
                      <th width="8%"> Gender </th>
                      <th width="8%"> Phone NO </th>
                      <th width="10%"> Email </th>
                      <th width="15%" colspan="2" class="btn"> Action </th>
                    </tr>

                  <?php
                  $result = mysqli_fetch_assoc($data);
                  echo "<tr>
                    <td>" . $result['ID'] . "</td>
                    <td>" . $result['Name'] . "</td>
                    <td>" . $result['Gender'] . "</td>
                    <td>" . $result['Phone'] . "</td>
                    <td>" . $result['Email'] . "</td>
                    <td><a href='Update.php? id=$result[ID]'> Edit </td>
                    <td><a href='Delete.php? id=$result[ID]' onclick='return DeleteMe()'> Delete </td>
                </tr>
                ";
                } else {
                  ?>
                    <script>
                      alert("Data Not Found..!");
                    </script>
              <?php
                }
              }
            }
              ?>

              <div class="sub_menu" id="subMenu">
                <div class="menu">
                  <div class="user_info">
                    <img src="assets/profile.jpeg" onclick="toggleMenu()">
                    <h1>Amir Shaikh</h1>
                  </div>
                  <hr>
                  <a href="logout.php" class="u_link">
                    <img src="assets/images/logout.png">
                    <p> LogOut </p>
                    <span> > </span>
                  </a>
                </div>
              </div>

</body>

</html>

<script>
  let subMenu = document.getElementById("subMenu");
  let register = document.getElementById("register");
  let member = document.getElementById("Member");
  let payment = document.getElementById("payment");
  let plan = document.getElementById("plan");
  let Pay = document.getElementById("paytable");
  let Plantable = document.getElementById("Plantable");
  let Dashboard = document.getElementById("Dashboard");
  let search = document.getElementById("search");
  let find = document.getElementById("find");

  register.style.display = "none";
  member.style.display = "none";
  payment.style.display = "none";
  plan.style.display = "none";
  Plantable.style.display = "none";
  Pay.style.display = "none";
  Dashboard.style.display = "none";
  search.style.display = "none";
  find.style.display = "none";

  function DeleteMe() {
    return confirm("Are You Really Want to Delete this record...?");
  }


  function toggleMenu() {
    subMenu.classList.toggle("open");
  }

  function toggleregister() {
    if (register.style.display === "none") {
      register.style.display = "block";
      member.style.display = "none";
      payment.style.display = "none";
      plan.style.display = "none";
      Plantable.style.display = "none";
      Dashboard.style.display = "none";
      find.style.display = "none";
      search.style.display = "none";
    }
  }

  function Member() {
    if (member.style.display === "none") {
      member.style.display = "block";
      register.style.display = "none";
      Plantable.style.display = "none";
      plan.style.display = "none";
      Dashboard.style.display = "none";
      find.style.display = "none";
      search.style.display = "none";
    }
  }

  function Payment() {
    if (payment.style.display === "none") {
      payment.style.display = "none";
      member.style.display = "none";
      register.style.display = "none";
      Dashboard.style.display = "none";
      find.style.display = "none";
      search.style.display = "none";
    }
  }

  function Plan() {
    plan.style.display = "none";
    if (Plantable.style.display === "none") {
      Plantable.style.display = "block";
      register.style.display = "none";
      member.style.display = "none";
      Dashboard.style.display = "none";
      find.style.display = "none";
      search.style.display = "none";
    }
  }

  function AddPlan() {
    if (plan.style.display === "none") {
      plan.style.display = "block";
      Plantable.style.display = "none";
      search.style.display = "none";
    }
  }

  function dashboard() {
    if (Dashboard.style.display === "none") {
      Dashboard.style.display = "block";
      find.style.display = "block";
      register.style.display = "none";
      member.style.display = "none";
      Plantable.style.display = "none";
      plan.style.display = "none";
      search.style.display = "none";
    }
  }

  function Find() {
    find.style.display = "none";
    search.style.display = "block";
  }
</script>

<?php
include("connection.php");
error_reporting(0);

if ($_POST['Done']) {

  $name     = $_POST['name'];
  $Gender   = $_POST['Gender'];
  $username = $_POST['Username'];
  $Phone    = $_POST['Phone'];
  $Email    = $_POST['Email'];
  $Pass     = $_POST['Password'];
  $CPass    = $_POST['CPassword'];

  if ($Pass == $CPass) {
    $sql = " INSERT INTO `register`(`Name`, `Gender`, `Username`, `Phone`, `Email`, `Password`, `Confirm Password`) VALUES ('$name','$Gender','$username','$Phone','$Email','$Pass','$CPass')";

    $data  = mysqli_query($con, $sql);

    if ($data) {
      echo "<script> alert('Register Sucessfully..!') </script>";
      header("refresh:0; url=http://localhost/project/Admin/Admin.php");
    } else {
?>
      <script>
        alert("Data Not Inserted..!");
      </script>
<?Php
    }
  } else {
    echo "<script> alert('Enter Valid Confirm Password..!') </script>";
  }
  header("refresh:0; url=http://localhost/project/Admin/Admin.php");
}


?>
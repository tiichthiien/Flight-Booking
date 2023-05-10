<?php
error_reporting(0);
$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "";
$db = "Flight_Reservation";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
if (!$conn) {
  echo "Connection was failed" . mysqli_connect_error();
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>GDC Airways</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Pacifico|Paytone+One" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="GDC-HomeCSSnew.css">
</head>

<body>

  <!--NavBar-->
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a href="#" class="navbar-brand"><img src="4b5d99c4-2f06-45be-88b2-5e4bb39f9885.png" id="logo"> GDC AIRWAYS</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" data-toggle="modal" data-target="#signup"><strong>Sign up </strong><i class="fas fa-user-plus"></i></a></li>
          <li><a href="#" data-toggle="modal" data-target="#login"><strong>Login </strong><i class="fas fa-user"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!--NavBar End-->

  <!--Heading/Moto-->
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div id="content">
          <h1>Your Experience Starts Here!</h1>
        </div>
      </div>
    </div>
  </div>
  <!--Heading/Moto End-->

  <!--Tabs-->
  <div class="container" id="second">
    <!--Tabs Headings-->
    <ul class="nav nav-tabs">
      <li class="active"><a class="tabshead" data-toggle="tab" href="#home"><i class="fas fa-plane"></i> Flights</a></li>
      <li><a class="tabshead" data-toggle="tab" href="#menu1"><i class="far fa-address-book"></i> My Bookings</a></li>
      <li><a class="tabshead" data-toggle="tab" href="#menu2"><i class="far fa-clock"></i> Flight Status</a></li>
    </ul>
    <!--Tabs Headings End-->

    <!--Tabs Content-->
    <div class="tab-content">
      <!--Tab Content Flight-->
      <div id="home" class="tab-pane fade in active">
        <h3 class="lab">Flights</h3>
        <form action="GDC-HomeConn.php" method="POST" onsubmit="return validateForm()">
          <select name="origin" class="drop" id="ori" onchange="updateDestinationDropdown()">
            <option disabled selected>Select an origin</option>
            <?php
            $sql = 'SELECT * FROM flight';
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value="' . $row['Origin']  . '">' .
                $row['Origin'] . '</option>';
            }
            ?>
          </select>

          <i class="fas fa-exchange-alt"></i>
          <select name="destination" class="drop" id="dest">
            <option disabled selected>Select an destination</option>
            <?php
            $sql = 'SELECT * FROM flight';
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value="' . $row['Destination']  . '">' .
                $row['Destination'] . '</option>';
            }
            ?>
          </select>
          <input type="number" class="drop" name="passengers" step="1" min="1" max="10" placeholder="Number Of Passengers" required>
          <span class="lab">Departure:</span>
          <input type="date" name="depart" class="drop" id="depart" required>
          <span class="lab">Return:</span>
          <input type="date" name="return" class="drop" id="return" required>
          <input type="submit" name="submit" id="flightsButton">
        </form>
      </div>
      <!--Tab Content Flight End-->

      <!--Tab Content My Bookings-->
      <div id="menu1" class="tab-pane fade">
        <h3 class="lab2">My Bookings</h3>
        <form action="GDC-Ticket.php" method="POST">
          <input type="text" name="ticketno" placeholder="Ticket Number" class="drop2">
          <input type="text" name="lastname" placeholder="Passenger Last Name" class="drop2">
          <input type="submit" name="submit" id="tickButton">
        </form>
      </div>
      <!--Tab Content My Bookings Ends-->

      <!--Tab Content Flight Status-->
      <div id="menu2" class="tab-pane fade">
        <h3 class="lab2">Flight Status</h3>
        <form action="GDC-FlightStatus.php" method="POST">
          <input type="text" name="flightid" placeholder="Flight Number" class="drop2">
          <select name="origin" class="drop2">.
            <?php
            $sql = 'SELECT * FROM flight ';
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value="' . $row['Origin']  . '">' .
                $row['Origin'] . '</option>';
            }
            ?>
          </select>
          <span class="lab2">Date:</span>
          <input type="date" name="depart" class="drop21">
          <input type="submit" name="submit" id="fsButton">
        </form>
      </div>
      <!--Tab Content Flight Status Ends-->
    </div>
    <!--Tab Contents End-->
  </div>
  <!--Tabs End-->

  <!--SingUp Modal-->
  <div id="signup" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!--SignUp Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">SignUp</h4>
        </div>
        <div class="modal-body">
          <form method="POST">
            <label for="username">Username:</label>
            <input type="text" name="usernameSignUp" placeholder="Username" id="usernameSignUp">
            <br>
            <label for="email">Email ID:</label>
            <input type="email" name="emailid" placeholder="Email Id" id="email">
            <br>
            <label for="pass">Password:</label>
            <input type="password" name="passwordSignUp" id="passSignUp">
            <br>
            <label for="confpass">Confirm Password:</label>
            <input type="password" name="confpassword" id="confpass">
            <br>
            <input type="Submit" name="submit" id="submitSignUp" value="SUBMIT">
            <br>
            <span id="messagecheck1"></span>
            <br>
            <span id="messagecheck2"></span>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!--SignUp Modal content End-->
    </div>
  </div>
  <!--SignUp Modal End-->

  <!--Login Modal-->
  <div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!--Login Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
          <form method="POST">
            <label for="username">Username:</label>
            <input type="text" name="usernameLogin" placeholder="Username" id="usernameLogin">
            <br>
            <label for="pass">Password:</label>
            <input type="password" name="passwordLogin" id="passLogin">
            <br>
            <input type="Submit" name="submit" value="LOGIN">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!--Login Modal Content End-->
    </div>
  </div>
  <!--Login Modal End-->
  <script type="text/javascript" src="GDC-HomeJSnew.js"></script>
  <script>
    function updateDestinationDropdown() {
      var originDropdown = document.getElementById("ori");
      var destinationDropdown = document.getElementById("dest");
      var selectedOrigin = originDropdown.value;

      // Remove the selected option from the destination dropdown
      for (var i = 0; i < destinationDropdown.options.length; i++) {
        if (destinationDropdown.options[i].value == selectedOrigin) {
          destinationDropdown.remove(i);
        }
      }
    }
  </script>
  <script>
    function validateForm() {
      // Use the "checkValidity()" method of the HTML form to check if all the required fields have been filled
      if (!document.forms[0].checkValidity()) {
        // If any required field is not filled, show an alert message to the user and return false to prevent the form from being submitted
        alert("Please fill out all required fields.");
        return false;
      } else {
        // If all required fields are filled, check if the dropdown menus have been selected
        var originDropdown = document.getElementById("ori");
        var destinationDropdown = document.getElementById("dest");
        if (originDropdown.selectedIndex == 0 || destinationDropdown.selectedIndex == 0) {
          alert("Please select an origin and a destination.");
          return false;
        } else {
          // If all required fields are filled and dropdown menus have been selected, return true to allow the form to be submitted
          return true;
        }
      }
    }
  </script>
</body>

</html>

<?php
$uname = $_POST['usernameSignUp'];
$uname = mysqli_real_escape_string($conn, $uname);
$em = $_POST['emailid'];
$em = mysqli_real_escape_string($conn, $em);
$passsign = $_POST['passwordSignUp'];
$passsign = mysqli_real_escape_string($conn, $passsign);
$confsign = $_POST['confpassword'];
$confsign = mysqli_real_escape_string($conn, $confsign);
$sbtn = $_POST['submit'];

$unamelg = $_POST['usernameLogin'];
$unamelg = mysqli_real_escape_string($conn, $unamelg);
$passlg = $_POST['passwordLogin'];
$passlg = mysqli_real_escape_string($conn, $passlg);
$lbtn = $_POST['submit'];

if (!empty($uname) && !empty($em) && !empty($passsign) && !empty($confsign) && $passsign == $confsign && $sbtn == "SUBMIT") {
  $sql = "Insert into users values('" . $uname . "','" . $em . "','" . $passsign . "')";
  if (mysqli_query($conn, $sql)) {
    echo "Done";
  } else {
    echo "Something Went Wrong";
  }
}

if (!empty($unamelg) && !empty($passlg) && $lbtn == "LOGIN") {
  $sql = "select username, password from users";
  if (mysqli_query($conn, $sql)) {
    $print = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($print)) {
      if ($row['username'] == $unamelg && $row['password'] == $passlg) {
        echo "<script type='text/javascript'>
                      alert('Welcome');
                      </script>";
        $ch = 1;
      }
    }
    if ($ch != 1) {
      echo "<script type='text/javascript'>
                      alert('Invalid Credentials');
                      </script>";
    }
  } else {
    echo "Something Went Wrong";
  }
}

?>
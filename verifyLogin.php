<!-- login verification code -->
<?php
  session_start();
  $username = $password = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    if (empty($_POST["username"]))
    {
      $_SESSION["nameErr"] = "* Username is required";
    }
    else
    {
      $name = test_input($_POST["username"]);
    }

    if (empty($_POST["pwd"]))
    {
        $_SESSION['pwdErr'] = "* Password is required";
    }
    else
    {
        $pwd = test_input($_POST["pwd"]);
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ip-project";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT password FROM users WHERE username = '$name'";
  $result = $conn->query($sql);
  $r = $result->fetch_array();
  if($r['password'] === $pwd)
  {
    $_SESSION['currentUser'] = $name;
    header("Location: userDashboard.php");
  }
  else {
    $_SESSION['loginErr'] = "* Username or password is incorrect!";
    header("Location: loginPage.php");
  }

?>

<?php
  session_start();
  $goaltype = $startdate = $enddate = $goalamount = $user_id = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["goaltype"]))
    {
      $_SESSION["goaltypeErr"] = "* Goal type is required";
    }
    else
    {
      $goaltype = test_input($_POST["goaltype"]);
    }

    if (empty($_POST["startdate"]))
    {
      $_SESSION["startdateErr"] = "* Start date is required";
    }
    else
    {
      $startdate = test_input($_POST["startdate"]);
    }
    if (empty($_POST["enddate"]))
    {
      $_SESSION["enddateErr"] = "* End date is required";
    }
    else
    {
      $enddate = test_input($_POST["enddate"]);
    }

    if (empty($_POST["goalamount"]))
    {
      $_SESSION["goalamtErr"] = "* Goal amount is required";
    }
    else
    {
      $goalamount = test_input($_POST["goalamount"]);
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
      die("Connection failed: ".$conn->connect_error);
  }
  $username = $_SESSION['currentUser'];
  $sql = "select id from users where username='$username'";
  $result = $conn->query($sql);
  $r = $result->fetch_array();
  $user_id = $r['id'];

  $sql = "INSERT INTO goals1(user_id, goaltype, startdate, enddate, goalamount) VALUES('$user_id', '$goaltype','$startdate','$enddate','$goalamount')";
  if ($conn->query($sql) === TRUE) {
      $_SESSION['successMsg'] = "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  $_SESSION['load'] = 'abcd';
  header("Location: ../userDashboard.php");

?>

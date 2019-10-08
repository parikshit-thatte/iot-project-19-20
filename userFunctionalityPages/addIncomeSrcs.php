<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="inc/main.css">
  </head>
  <body>
    <div class="form-group">
      <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="row">
          <div class="col-25">
              <label for="name">Name :</label>
          </div>
          <div class="col-75">
              <input type="text" name="name" placeholder="Enter name of your income source">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
              <label for="recurrence">Recurrence(in months) :</label>
              <small>Enter 0 for one-time income</small>
          </div>
          <div class="col-75">
              <input type="text" name="recurrence" placeholder="Enter the period">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
              <label for="amount">Amount :</label>
          </div>
          <div class="col-75">
              <input type="text" name="amount" placeholder="Enter the amount">
          </div>
        </div>
        <div style="width: 30px; margin: 0 auto;">
            <button  class="button btnFade btnBlueGreen" type="submit" name="button">Submit</button>
        </div>
      </form>
    </div>
  </body>
</html>

<?php
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["name"]))
    {
      $_SESSION["nameErr"] = "* name is required";
    }
    else
    {
      $name = test_input($_POST["name"]);
    }

    if (empty($_POST["recurrence"]))
    {
      $_SESSION["recurErr"] = "* recurrence is required";
    }
    else
    {
      $recurrence = test_input($_POST["recurrence"]);
    }

    if (empty($_POST["amount"]))
    {
      $_SESSION["amtErr"] = "* amount is required";
    }
    else
    {
      $amount = test_input($_POST["amount"]);
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

  $sql = "insert into income_srcs(name, recurrence, amount, user_id) values('$name', '$recurrence', '$amount', '$user_id')";
  $conn->query($sql);
  $_SESSION['successMsg'] = "Added successfully!";

?>

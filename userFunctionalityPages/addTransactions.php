<?php
  session_start();

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
  echo $user_id;
  $sql2 = "SELECT t.t_id, t.name, b.recurrence FROM transactions t, bills b ON t.t_id = b.t_id WHERE user_id='$user_id'";
  $result2 = $conn->query($sql2);
  echo $result2;
  echo "rvsd";
  $conn->close();
  echo "sgraynjhwr";
?>

<div class="card shadow1" id="abcd">
  <table class="table">
    <tr>
      <th>Source name</th>
      <th>Recurrence</th>
      <th>Amount</th>
    </tr>
      <?php foreach ($result2 as $res) { ?>
        <tr>
        <td>
          <?php echo $res['name']; ?>
        </td>
        <td>
          <?php echo $res['recurrence']; ?>
        </td>
        <td>
          <?php echo $res['amount']; ?>
        </td>
      </tr>
      <?php } ?>
  </table>
</div>

<form class="form" action="<?php echo htmlspecialchars('userFunctionalityPages/addIncomeToDB.php'); ?>" method="post" id="defg">
  <h3>Add a new income source</h3>
  <div class="row">
    <div class="col-25">
        <label for="name" class="side-label">Name :</label>
    </div>
    <div class="col-75">
        <input type="text" name="name" class="input-side">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
        <label for="recurrence" class="side-label">Recurrence :</label>
        <!-- <small>Enter 0 for one-time income</small> -->
    </div>
    <div class="col-75">
        <input type="text" name="recurrence" placeholder="in months" class="input-side">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
        <label for="amount" class="side-label">Amount :</label>
    </div>
    <div class="col-75">
        <input type="text" name="amount" class="input-side">
    </div>
  </div>
  <div style="width: 30px; margin: 0 auto;">
      <button  class="button btnFade btnBlueGreen" type="submit" name="button">Submit</button>
  </div>
</form>

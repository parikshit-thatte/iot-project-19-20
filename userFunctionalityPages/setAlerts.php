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

  $sql2 = "SELECT * FROM alerts WHERE user_id='$user_id'";
  $result2 = $conn->query($sql2);

  $alertamount = 0;
  foreach ($result2 as $res) {
    $alertamount += $res['alertamount'] ;
  }
  $conn->close();
?>

<div class="card shadow1" id="abcd">
  <h2>Your Total Monthly Reminder Amount Is</h2>
  <p><?php echo "<h3>$alertamount ₹</h3>"; ?></p>
  <table class="table">
    <tr>
      <th>Reminder</th>
      <th>Recurrence</th>
      <th>Alert Date</th>
      <th>Amount(in ₹)</th>
    </tr>
      <?php foreach ($result2 as $res) { ?>
        <tr>
        <td>
          <?php echo $res['reminder']; ?>
        </td>
        <td>
          <?php echo $res['recurrence']; ?>
        </td>
        <td>
          <?php echo $res['alertdate']; ?>
        </td>
        <td>
          <?php echo $res['alertamount']; ?>
        </td>
      </tr>
      <?php } ?>
  </table>
</div>
<form class="form" action="<?php echo htmlspecialchars('userFunctionalityPages/addremindertoDB.php'); ?>" method="post" id="defg">
<h3>Set New Reminder</h3>
<div class="row">
<div class="col-25">
    <label for="reminder">reminder</label>
</div>
<div class="col-75">
<input type="text" name="reminder" list="reminder" required/>
    <datalist id="reminder">
      <option value="Electricity Bills">Electricity Bills</option>
      <option value="Water Bill">Water Bill</option>
      <option value="Mahanagar Gas Bill">Mahanagar Gas Bill</option>
      <option value="House Rent">House Rent</option>
      <option value="Home Maintenance Bill">Home Maintenance Bill</option>
      <option value="Classes Fee Payment">Classes Fee Payment</option>
      <option value="Mobile Recharge Bill">Mobile Recharge Bill</option>
      <option value="Internet Connection">Internet Connection</option>
      <option value="TV Channel Subscriptions">TV Channel Subscriptions</option>
      <option value="Netflix Subscriptions">Netflix Subscriptions</option>
      <option value="Amazon Prime Membership">Amazon Prime Membership</option>
    </datalist>
  </div>
</div>
<div class="row">
<div class="col-25">
    Recurrence (in months):
    <!-- <label for="recurrence" class="side-label">Recurrence(months):</label> -->
    <!-- <small>Enter 0 for one-time income</small> -->
</div>
<div class="col-75">
    <input type="number" name="recurrence" placeholder="in months" class="input-side" required>
</div>
</div>
<div class="row">
<div class="col-25">
    <label for="alertdate" class="side-label">Alert Date:</label>
    <!-- <small>Enter 0 for one-time income</small> -->
</div>
<div class="col-75">
    <input type="date" min="2018-01-01" name="alertdate" placeholder="dd/mm/yy" class="input-side" required>
</div>
</div>
<div class="row">
<div class="col-25">
    <label for="alertamount" class="side-label">Amount:</label>
</div>
<div class="col-75">
    <input type="text" name="alertamount" class="input-side" required>
</div>
</div>
<div style="width: 30px; margin: 0 auto;">
  <table>
    <tr>
      <td>
          <button  class="button btnFade btnBlueGreen" type="submit" name="delete">Submit</button>
      </td>
      <td>
          <button  class="button btnFade btnBlueGreen" type="reset" name="reset">Reset</button>
      </td>
  </table>
</tr>
</div>

</form>
<!-- delete a previous goals -->
<form class="form" action="<?php echo htmlspecialchars('userFunctionalityPages/deletereminder.php'); ?>" method="post" id="defg">
<h3>Delete Reminder</h3>
<div class="row">
<div class="col-25">
    <label for="reminder">reminder title:</label>
</div>
<div class="col-75">
<input type="text" name="reminder" list="reminder" required/>
    <datalist id="reminder">
      <option value="Electricity Bills">Electricity Bills</option>
      <option value="Water Bill">Water Bill</option>
      <option value="Mahanagar Gas Bill">Mahanagar Gas Bill</option>
      <option value="House Rent">House Rent</option>
      <option value="Home Maintenance Bill">Home Maintenance Bill</option>
      <option value="Classes Fee Payment">Classes Fee Payment</option>
      <option value="Mobile Recharge Bill">Mobile Recharge Bill</option>
      <option value="Internet Connection">Internet Connection</option>
      <option value="TV Channel Subscriptions">TV Channel Subscriptions</option>
      <option value="Netflix Subscriptions">Netflix Subscriptions</option>
      <option value="Amazon Prime Membership">Amazon Prime Membership</option>
    </datalist>
  </div>
</div>
<div style="width: 30px; margin: 0 auto;">
  <table>
    <tr>
      <td>
          <button  class="button btnFade btnBlueGreen" type="submit" name="delete">Delete</button>
      </td>
      <td>
          <button  class="button btnFade btnBlueGreen" type="reset" name="reset">Reset</button>
      </td>
  </table>
</tr>
</div>
</form>
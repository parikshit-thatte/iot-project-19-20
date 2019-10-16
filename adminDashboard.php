<?php
  session_start();
  if(!isset($_SESSION['currentUser']))
  {
    $msg = "Please login!";
    $_SESSION['unauthorisedAccess'] = $msg;
    header("Location: loginPage.php");
  }
?>
<?php
  if(isset($_SESSION['currentUser'])){
    $dest = 'adminDashboard.php';
  }
  else {
    $dest = 'landingPage.php';
  }
?>

<?php include 'inc\base.php' ?>
<script type="text/javascript">
  function loadForm(){
    $("#here").load("addTrendings.php #abcd");
  }
</script>
<div class="topnavbar">
  <nav>
    <ul>
      <li><a href="<?php echo $dest ?>"><img src="logo-3.png" alt="ExpenseAnalyzer" width="50" height="50"></a></li>
      <div style="float:right;padding-right:20px;padding-top:20px;">
        <li><a href="#" id="link4" onclick="loadForm()">Add trendings</a></li>
        <li><button class="button btnFade btnBlueGreen" id="logout"><i class="fa fa-sign-out" aria-hidden="true">Log Out</button></i></li>
      </div>
    </ul>
  </nav>
</div>
<div id="here">

</div>
<?php include 'inc/footer.php' ?>
<script type="text/javascript">
      document.getElementById("logout").onclick = function () {
      location.href = "logout.php";
  };
</script>

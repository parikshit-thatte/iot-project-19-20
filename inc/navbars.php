<?php
  if(isset($_SESSION['currentUser'])){
    $dest = 'userDashboard.php';
  }
  else {
    $dest = 'landingPage.php';
  }
?>

<div class="topnavbar">
  <nav>
    <ul>
      <li><a href="<?php echo $dest ?>"><img src="logo-3.png" alt="ExpenseAnalyzer" width="40" height="40"></a></li>
      <div style="float:right;padding-right:20px;padding-top:20px;">
        <li><a href="#" id="link2">Transaction History</a></li>
        <li><a href="#" id="link4">Analyze Your Expenses</a></li>
        <li><a href="#" id="link4">Graphs and Charts</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">About</a></li>
        <li><button class="button btnFade btnBlueGreen" id="logout"><i class="fa fa-sign-out" aria-hidden="true">Log Out</button></i></li>
      </div>
    </ul>
  </nav>
</div>
<div class="main-content">
  <span>
    <div class="sidenavbar">
      <nav>
        <ul>
          <li><a href="#" id="link1">Add income sources</a></li>
          <li><a href="#">Add transactions</a></li>
          <li><a href="#" id="link3">Set Goals</a></li>
          <li><a href="#">Set alerts</a></li>
        </ul>
      </nav>
    </div>
    <input type="hidden" name="mysession" id="mysession">
  </span>
  <span>
      <div style="text-align: center;">
        <div id="content1" style="display: block;">

        </div>
      </div>
  </span>
  <span>
    <aside>
      <div id="here" class="form-group-side" >

      </div>
    </aside>
  </span>
</div>


<script type="text/javascript">
      document.getElementById("logout").onclick = function () {
      location.href = "logout.php";
  };
</script>


<script type="text/javascript">
  $("#link1").click(function(){
  $("#content1").load("userFunctionalityPages/addIncomeSrcs.php #abcd");
  $("#here").load("userFunctionalityPages/addIncomeSrcs.php #defg");
  // location.reload();
  });
  $("#link3").click(function(){
  $("#here").load("userFunctionalityPages/setGoals.php");
  });
</script>

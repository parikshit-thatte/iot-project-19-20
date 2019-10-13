<?php
  if(isset($_SESSION['currentUser'])){
    $dest = 'userDashboard.php';
  }
  else {
    $dest = 'landingPage.php';
  }
?>
<script type="text/javascript">
  function loadForm(key){
    if(key == '1'){
      $("#content1").load("userFunctionalityPages/addIncomeSrcs.php #abcd");
      $("#here").load("userFunctionalityPages/addIncomeSrcs.php #defg");
    }
    else if (key == '2'){
      $("#content1").load("userFunctionalityPages/addTransactions.php #abcd");
      $("#here").load("userFunctionalityPages/addTransactions.php #defg");
    }
    else if (key == '3'){
      $("#content1").load("userFunctionalityPages/addIncomeSrcs.php #abcd");
      $("#here").load("userFunctionalityPages/addIncomeSrcs.php #defg");
    }
    else if (key == '4'){
      $("#content1").load("userFunctionalityPages/addIncomeSrcs.php #abcd");
      $("#here").load("userFunctionalityPages/addIncomeSrcs.php #defg");
    }

  }
</script>

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
          <li><a href="#" id="link1" onclick="loadForm('1')">Add income sources</a></li>
          <li><a href="#" id="link2" onclick="loadForm('2')">Add transactions</a></li>
          <li><a href="#" id="link3" onclick="loadForm('3')">Set Goals</a></li>
          <li><a href="#" id="link4" onclick="loadForm('4')">Set alerts</a></li>
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

<?php
  if(isset($_SESSION['load'])){
    echo "<script type='text/javascript'>",
          "loadForm();",
          "</script>";
  }
  unset($_SESSION['load']);
?>

<script type="text/javascript">
      document.getElementById("logout").onclick = function () {
      location.href = "logout.php";
  };
</script>

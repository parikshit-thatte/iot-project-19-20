<div class="topnavbar">
  <nav>
    <ul>
      <li><a href="landingPage.php"><img src="logo-3.png" alt="ExpenseAnalyzer" width="40" height="40"></a></li>
      <div style="float:right;padding-right:20px;padding-top:20px;">
        <li><a href="#">News</a></li>
        <li><a href="#">About</a></li>
        <li><button class="button btnFade btnBlueGreen" id="logout"><i class="fa fa-sign-out" aria-hidden="true">Log Out</button></i></li>
      </div>
    </ul>
  </nav>
</div>
<div class="main-content">
  <div class="sidenavbar">
    <nav>
      <ul>
        <li><a href="#" id="link1">Add income sources</a></li>
<<<<<<< Updated upstream
        <li><a href="#" id="link2">Track Spendings</a></li>
        <li><a href="#" id="link3">Set Goals</a></li>
        <li><a href="#" id="link4">Graphs and Charts</a></li>
=======
        <li><a href="#">Add transactions</a></li>
        <li><a href="#">Set goals</a></li>
        <li><a href="#">Set alerts</a></li>
>>>>>>> Stashed changes
      </ul>
    </nav>
  </div>
  <input type="hidden" name="mysession" id="mysession">
</div>
<div id="here" style="width:50%; margin: auto;">

</div>

<script type="text/javascript">
      document.getElementById("logout").onclick = function () {
      location.href = "logout.php";
  };
</script>


<script type="text/javascript">
  $("#link1").click(function(){
  $("#here").load("userFunctionalityPages/addIncomeSrcs.php");
  // location.reload();
  });
  $("#link3").click(function(){
  $("#here").load("userFunctionalityPages/setGoals.php");
  });
</script>

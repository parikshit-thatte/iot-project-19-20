<div class="topnavbar">
  <nav>
    <ul>
      <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
      <div style="float:right;padding-right:20px;">
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
        <li><a href="#">Link 2</a></li>
        <li><a href="#">Link 3</a></li>
        <li><a href="#">Link 4</a></li>
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
  });
</script>

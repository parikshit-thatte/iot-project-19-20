<!DOCTYPE HTML>
<html>

<?php
  session_start();
  $month = $year = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $month = $_POST['month'];
    $year = $_POST['year'];

    switch ($month) {
    case "jan":
        $val = 01;
        break;
    case "feb":
        $val = 02;
        break;
    case "march":
        $val = 03;
        break;
    case "april":
        $val = 04;
        break;
    case "may":
        $val = 05;
        break;
    case "june":
        $val = 06;
        break;
    case "july":
        $val = 07;
        break;
    case "aug":
        $val = 8;
        break;
    case "sept":
        $val = 9;
        break;
    case "oct":
        $val = 10;
        break;
    case "nov":
        $val = 11;
        break;
    case "dec":
        $val = 12;
        break;
      }
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

  $sql1 = "SELECT SUM(amount) as total FROM transactions where type='bill' and user_id='$user_id' and MONTH(date_time)='$val' and YEAR(date_time)='$year'";
  $result1 = $conn->query($sql1);
  $r1 = $result1->fetch_array();
  $bill = $r1['total'];
  // echo $bill;

  $sql1 = "SELECT SUM(amount) as total FROM transactions where type='policy' and user_id='$user_id' and MONTH(date_time)='$val' and YEAR(date_time)='$year'";
  $result1 = $conn->query($sql1);
  $r1 = $result1->fetch_array();
  $policy = $r1['total'];
  // echo $policy;

  $sql1 = "SELECT SUM(amount) as total FROM transactions where type='loan' and user_id='$user_id' and MONTH(date_time)='$val' and YEAR(date_time)='$year'";
  $result1 = $conn->query($sql1);
  $r1 = $result1->fetch_array();
  $loan = $r1['total'];
  // echo $loan;

  $sql1 = "SELECT SUM(amount) as total FROM transactions where type='food' and user_id='$user_id' and MONTH(date_time)='$val' and YEAR(date_time)='$year'";
  $result1 = $conn->query($sql1);
  $r1 = $result1->fetch_array();
  $food = $r1['total'];
  // echo $food;

  $sql1 = "SELECT SUM(amount) as total FROM transactions where type='travel' and user_id='$user_id' and MONTH(date_time)='$val' and YEAR(date_time)='$year'";
  $result1 = $conn->query($sql1);
  $r1 = $result1->fetch_array();
  $travel = $r1['total'];
  // echo $travel;

  $sql1 = "SELECT SUM(amount) as total FROM transactions where type='health' and user_id='$user_id' and MONTH(date_time)='$val' and YEAR(date_time)='$year'";
  $result1 = $conn->query($sql1);
  $r1 = $result1->fetch_array();
  $health = $r1['total'];
  // echo $health;

  $sql1 = "SELECT SUM(amount) as total FROM transactions where type='other' and user_id='$user_id' and MONTH(date_time)='$val' and YEAR(date_time)='$year'";
  $result1 = $conn->query($sql1);
  $r1 = $result1->fetch_array();
  $other = $r1['total'];
  // echo $other;

  $conn->close();
?>
<head>
<script type="text/javascript">
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		title:{
			text: "Category-wise expenditure"
		},
		legend: {
			maxWidth: 10000,
			itemWidth: 120
		},
		data: [
		{
			type: "pie",
			showInLegend: true,
      toolTipContent: "{y} - #percent %",
			legendText: "{indexLabel}",
			dataPoints: [
				{ y:<?php echo $bill; ?> , indexLabel: "Bills" },
				{ y:<?php echo $policy; ?> , indexLabel: "Policies" },
				{ y:<?php echo $loan; ?> , indexLabel: "Loans" },
				{ y:<?php echo $food; ?> , indexLabel: "Food"},
				{ y:<?php echo $travel; ?> , indexLabel: "Travel" },
				{ y:<?php echo $health; ?> , indexLabel: "Health & Medicine"},
				{ y:<?php echo $other; ?> , indexLabel: "Others"}
			]
		}
		]
	});
	chart.render();
}
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>
</html>

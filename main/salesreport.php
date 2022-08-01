<html>
<head>
<title>
POS
</title>
<?php
	require_once('auth.php');
?>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>



 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	


</head>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	
	<div class="contentheader">
			<i class="icon-bar-chart"></i> Sales Report
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Sales Report</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<button  style="float:right;" class="btn btn-success btn-mini"><a href="javascript:Clickheretoprint()"> Print</button></a>
</div>
<form action="salesreport.php">
	<center><strong>From : <input type="date" style="width: 223px; height: 35px; color:#222;" name="fromdate" value="<?php if(isset($_GET['fromdate'])){echo $_GET['fromdate']; } ?>"/> To:<input type="date" style="width: 223px; height: 35px; color:#222;" name="todate" value="<?php if(isset($_GET['todate'])){echo $_GET['fromdate']; } ?>"/> <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit">Search</button> </center>
</form>
	<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="13%"> Employee Name </th>
			<th width="13%"> Customer Car Number Plates </th>
			<th width="13%"> Amount </th>
		</tr>
	</thead>
	<tbody>
		<?php
			include('../dbcon.php');
			global $amount;
			//global $amptotal;
			global $totalamount;
			// $sql = "SELECT e,emp_id, SUM(amount) AS total FROM customer GROUP BY emp_id";
			// $result = mysqli_query($con,$sql);
			// if(mysqli_num_rows($result) > 0){
			// 	while($row = mysqli_fetch_assoc($result)){
			// 		$emp_name = $row['emp_name'];
			// 		$emp_id = $row['emp_id'];
			// 		//$amount = $row['total'];
			// 		//$totalamount += $amount;
			// 		//echo $amount;
			// 	}
			// }
		


			if(isset($_GET['fromdate']) && isset($_GET['todate'])){
			$d1 = $_GET['fromdate'];
			$d2 = $_GET['todate'];

			$query = "SELECT emp_name,emp_id,car_plates,amount FROM customer WHERE serv_date BETWEEN '$d1' AND '$d2'";
			$query_run = mysqli_query($con, $query);
			if(mysqli_num_rows($query_run) > 0 ){
				foreach($query_run as $row){
					$totalamount +=$row['amount']; 

			?>
			<tr class="record">
			<td><?php echo $row['emp_name']; ?></td>
			<td><?php echo $row['car_plates']; ?></td>
			<td><?php echo $row['amount'];}?></td>
			</tr>
			<tr class="record">
			<th width="18%" border="none">Total Profit
				<th><td style="font-weight: 900;">
				<?php
				echo $totalamount;
				?></td></th>
			</th>
			</tr>
		<?php
		  
		}else {
			echo "No result found";
		}
	}
		?>

	</tbody>
</table>
</div>
</div>
</body>
<?php include('footer.php');?>
</html>

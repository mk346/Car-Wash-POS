<?php include 'header.php'; ?>
<?php include('navfixed.php');?>
    <div class="container-fluid">
      <div class="row-fluid">
	
	
	<div class="contentheader">
			<i class    ="icon-dashboard"></i> Dashboard
			</div>
			<ul class="breadcrumb">
			<li class="active">Dashboard</li>
			</ul>
			<font style=" font:bold 25px 'Aleo'; color:#0489bd;"><center>CarWash POS</center></font>
<div id="mainmain">
	<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='Cashier') {
?>
<a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i><br>Reports</a>   
<a href="customer.php"><i class="icon-group icon-2x"></i><br> Customers</a>  

<a href="../index.php"><i class="icon-signout icon-2x"></i><br>Logout</a>   
<?php
}
if($position=='admin') {
?>

<a href="employees.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-group icon-2x"></i><br> Employees</a>               
<!-- <a href="employeetasks.php"><i class="icon-list-alt icon-2x"></i><br>Employee Tasks Data</a>                 -->
<a href="cat.php"><i class="icon-list-alt icon-2x"></i><br>Task Categories</a>     
<a href="customer.php"><i class="icon-group icon-2x"></i><br> Customers</a>     
<!-- <a href="supplier.php"><i class="icon-group icon-2x"></i><br> Suppliers</a>      -->
<a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i><br>Reports</a>     
<a href="admin-settings.php"><i class="icon-flag icon-2x"></i><br> User Manager</a>  
<?php 
    }                   
    ?>
<div class="clearfix"></div>
</div>
</div>
</div>
</body>
<?php include('footer.php'); ?>
</html>

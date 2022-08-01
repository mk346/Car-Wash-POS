<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM tasks WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditemptask.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Employee Task</h4></center><hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Employee Name </span><input type="text" style="width:265px; height:30px;" name="employee" value="<?php echo $row['em_name']; ?>" /><br>
<span>Task Done </span><input type="text" style="width:265px; height:30px;" name="job" value="<?php echo $row['job']; ?>" /><br>
<span>Date </span><input type="date" style="width:265px; height:30px;" name="task_date" value="<?php echo $row['task_date']; ?>" /><br>
<span>Customer Name </span><input type="text" style="width:265px; height:30px;" name="customer" value="<?php echo $row['cust_name']; ?>" /><br>
<span>Amount </span><input type="text" style="width:265px; height:30px;" name="amount" value="<?php echo $row['amount']; ?>" /><br>
<span>Employee ID </span><input type="number" style="width:265px; height:30px;" name="empl_id" value="<?php echo $row['emp_id']; ?>" /><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>
<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM employees WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditemployee.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Employee</h4></center><hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Employee Name </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['emp_name']; ?>" /><br>
<span>Date of Joining </span><input type="date" style="width:265px; height:30px;" name="doj" value="<?php echo $row['DOJ']; ?>" /><br>
<span>ID Number </span><input type="text" style="width:265px; height:30px;" name="id_no" value="<?php echo $row['ID_NO']; ?>" /><br>
<span>Contact No. </span><input type="text" style="width:265px; height:30px;" name="phone" value="<?php echo $row['phone']; ?>" /><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>
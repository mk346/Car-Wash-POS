<?php
include('../dbcon.php');
$options1 = "";
$options2="";
$options3="";
$sql1 = "SELECT emp_name,id FROM employees";
$result = mysqli_query($con, $sql1);
if (mysqli_num_rows($result)>0){
        //while loop for looping through all the data in the employees table;
        while($rows = mysqli_fetch_assoc($result)){
            $options1 = $options1."<option>".$rows["emp_name"]."</option>";
            $options2 = $options2."<option>".$rows["id"]."</option>";
        }
}
$sql2 = "SELECT cat_name FROM category";
$result2 = mysqli_query($con, $sql2);
if (mysqli_num_rows($result2)>0){
    while($row = mysqli_fetch_assoc($result2)){
        $options3 = $options3."<option>".$row["cat_name"]."</option>";
    }
}
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM customer WHERE customer_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditcustomer.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Customer</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" required/>
<span>Car Number Plates </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['car_plates']; ?>" required/><br>
<span>Employee Name </span>
<select name="emp_name" required style="width:265px; height:30px;">
    <option value="<?php $options1 ?>">
        <?php echo $options1 ?>
    </option>
</select>
<span>Employee ID </span>
<select name="emp_id" required style="width:265px; height:30px;">
    <option value="<?php $options2 ?>">
        <?php echo $options2 ?>
    </option>
</select>
<span>Service Offered </span>
<select name="prod_name" required style="width:265px; height:30px;">
    <option value="<?php $options3 ?>">
        <?php echo $options3 ?>
    </option>
</select>
<span>Date </span><input type="date" style="width:265px; height:30px;" name="serv_date" value="<?php echo $row['serv_date']; ?>" required/><br>
<span>Amount Paid </span><input type="number" style="width:265px; height:30px;" name="amount" value="<?php echo $row['amount']; ?>" required/><br>
<span>Paid Using </span><input type="text" style="width:265px; height:30px;" name="note" value="<?php echo $row['note'];?>"/><br>
<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>
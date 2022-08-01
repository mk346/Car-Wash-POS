<?php
include('../dbcon.php');
//declare variables
$options1 = "";
$options2 = "";
$options3 = "";
$options4 = "";
//sql query to fetch data
$sql1 = "SELECT emp_name, id FROM employees";
$result = mysqli_query($con, $sql1);
if (mysqli_num_rows($result)>0){
        //while loop for looping through all the data in the database;
        while($rows = mysqli_fetch_assoc($result)){
            $options1 = $options1."<option>".$rows["emp_name"]."</option>";
            $options4 = $options4."<option>".$rows["id"]."</option>";
        }
}

$sql2 = "SELECT customer_name FROM customer";
$result2 = mysqli_query($con, $sql2);
if (mysqli_num_rows($result2)>0){
    while($rows = mysqli_fetch_assoc($result2)){
        $options2 = $options2."<option>".$rows["customer_name"]."</option>";
    }
}

$sql3 = "SELECT cat_name FROM category";
$result3 = mysqli_query($con, $sql3);
if (mysqli_num_rows($result3)>0){
    while($rows = mysqli_fetch_assoc($result3)){
        $options3 = $options3."<option>".$rows["cat_name"]."</option>";
    }
}
?>

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savetask.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add New Employee Task</h4></center>
<hr>
<div id="ac">
<span>Employee Name </span>
<select name="employee" required style="width:265px; height:30px;">
    <option value="<?php $options1 ?>">
        <?php echo $options1 ?>
    </option>
</select>
<span>Task Done </span>
<select name="job" required style="width:265px; height:30px;">
    <option value="<?php $options3 ?>">
        <?php echo $options3 ?>
    </option>
</select>
<br>
<span>Date </span><input type="date" style="width:265px; height:30px;" name="task_date" required/><br>
<span>Customer Name </span>
<select name="customer" required style="width:265px; height:30px;">
    <option value="<?php $options2 ?>">
        <?php echo $options2 ?>
    </option>
</select>
<span>Amount </span><input type="number" style="width:265px; height:30px;" name="amount" required/><br>
<span>Employee ID </span>
<select name="empl_id" required style="width:265px; height:30px;">
    <option value="<?php $options4 ?>">
        <?php echo $options4 ?>
    </option>
</select>
<br>
<div style="float:right; margin-right:10px;">
<input type="submit" id="loginbtn" class="btn btn-success btn-block btn-large" name="loginbtn" value="Submit" style="width:267px;" />
<!-- <button type="submit" class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button> -->
</div>
</div>
</form>
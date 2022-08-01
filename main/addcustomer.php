<?php
include('../dbcon.php');
$options1 = "";
$options2="";
$options3="";
$sql1 = "SELECT emp_name, id FROM employees";
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
?>

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savecustomer.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Customer</h4></center>
<hr>
<div id="ac">
<span>Car Number Plates </span><input type="text" style="width:265px; height:30px;" name="name" placeholder="KCD 456S" required/><br>
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
<span>Date </span><input  type="date" placeholder="date" style="width:265px; height:30px;" name="serv_date" required/><br>
<span>Amount Paid </span><input type="number" style="width:265px; height:30px;" name="amount" placeholder="Total"/><br>
<span>Mode of Payment  
</span>
<select style="width:265px; height:30px;" name="note" required>
    <option value="">Select One</option>
    <option value="Mpesa">Mpesa</option>
    <option value="Cash">Cash</option>
</select><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i>Save</button>
</div>
</div>
</form>
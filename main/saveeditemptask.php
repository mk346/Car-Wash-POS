<?php
// database connection intialization
include('../connect.php');

// new data capture
$id = $_POST['memi'];
$a = $_POST['employee'];
$b = $_POST['job'];
$c =$_POST['task_date'];
$d = $_POST['customer'];
$e = $_POST['amount'];
$f =$_POST['empl_id'];
// query to update the data in the database
$sql = "UPDATE tasks 
        SET em_name=?, job=?,task_date=?,cust_name=?, amount=?,emp_id=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$id));
header("location: employeetasks.php");
?>
<?php
// configuration
include('../connect.php');

// new data to update
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['emp_name'];
$c = $_POST['emp_id'];
$d = $_POST['prod_name'];
$e = $_POST['serv_date'];
$f = $_POST['amount'];
$g = $_POST['note'];
// query to update the table in the db
$sql = "UPDATE customer 
        SET car_plates=?,emp_name=?,emp_id=?,prod_name=?,serv_date=?,amount=?,note=?
		WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$id));
header("location: customer.php");

?>
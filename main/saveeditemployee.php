<?php
// database connection intialization
include('../connect.php');

// new data capture
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['doj'];
$c = $_POST['id_no'];
$d = $_POST['phone'];
// query to update the data in the database
$sql = "UPDATE employees 
        SET emp_name=?,DOJ=?, ID_NO=?, phone=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$id));
header("location: employees.php");

?>
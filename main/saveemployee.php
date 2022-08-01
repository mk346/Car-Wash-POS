<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['doj'];
$c = $_POST['id_no'];
$d = $_POST['phone'];
// query
$sql = "INSERT INTO employees (emp_name,DOJ,ID_NO,phone) VALUES (:a,:b,:c,:d)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d));
header("location: employees.php");
?>
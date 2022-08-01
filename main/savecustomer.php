<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['emp_name'];
$c = $_POST['emp_id'];
$d = $_POST['prod_name'];
$e = $_POST['serv_date'];
$f = $_POST['amount'];
$g = $_POST['note'];
// query
$sql = "INSERT INTO customer (car_plates,emp_name,emp_id,prod_name,serv_date,amount,note) VALUES (:a,:b,:c,:d,:e,:f,:g)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g));
header("location: customer.php");
?>
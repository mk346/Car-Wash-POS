<?php
session_start();
include('../dbcon.php');
if(isset($_POST['loginbtn'])){
   $employee = $_POST['employee'];
   $position = $_POST['job'];
   $task_date = $_POST['task_date'];
   $customer = $_POST['customer'];
   $amount = $_POST['amount'];
   $empl_id = $_POST['empl_id'];


   $query = "INSERT INTO tasks (em_name,job,task_date,cust_name,amount,emp_id) VALUES('$employee','$position','$task_date','$customer','$amount','$empl_id')";
   if(mysqli_query($con, $query)){
    header("location: employeetasks.php");


   } else {
    echo 'query error'.mysqli_error($con);
   }
}
header("location: employeetasks.php");








?>
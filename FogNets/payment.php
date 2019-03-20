<?php
 $host="localhost";	 $user = "root";  $pass = "";  $db = "FogNets";
 $con = mysqli_connect($host,$user,$pass,$db);
$ar=file_get_contents("php://input");  //reads the received json array 
$arr=json_decode($ar,true); //converts the json array to php array

/* insert data into orders table  */
$userid=$arr['uid'];  
$odate = date("Y-m-d H:i:s");
$query = "insert into  orders (userid, odate) values ('$userid','$odate')";
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));

/* loop through the orders array and insert data into ordersproduct table  */
// Returns the auto generated id used in the last query. Returns zero if there were no update
$oid=mysqli_insert_id($con); 
foreach ($arr['orders'] as $k => $row) 
{ $id=$row['id']; $pid=$row['pid']; $qty=$row['qty']; $price=$row['price'];
  $query = "insert into  ordersproduct (oid, pid, qty, price) values($oid, $pid, $qty, $price)";															
  $result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));
}

$arr1['a']= "order is inserted";
echo json_encode($arr1);

function errorHandler($q,$err) 
{$arr1['a']= "Error in query: $q. $err";
echo json_encode($arr1); 
}
?>
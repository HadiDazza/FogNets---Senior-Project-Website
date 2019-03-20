<?php 
 $host="localhost";	 $user = "root";  $pass = "";  $db = "FogNets";
 $con = mysqli_connect($host,$user,$pass,$db);
// orders(oid, odate  pid  qty  price userid  stat varchar)
$userid='1001';
//if (isset($_REQUEST['userid'])) { $userid = $_REQUEST['userid'];}
$query = "SELECT o.oid, odate, op.pid, pname, qty, op.price, qty*op.price as subtot, uname, stat FROM products p, orders o, ordersproduct op, users u where p.pid=op.pid and u.uid=o.userid and op.oid=o.oid and o.userid='$userid' order by o.oid"; 
$result=mysqli_query($con, $query) or die ("Error in query: $query. ".mysqli_error($con));
while($row = mysqli_fetch_assoc($result)) 	{$arr[] = $row;}
echo json_encode($arr);


/*
contactUs(id, cuName, cuEmail, cuSubject, cuMessage)
users(userid, password, uname, address)
products(id, pid, pname, pdesc, pimg, price, cat)
orders(oid, odate, userid, stat)
ordersproduct(oid, pid, qty, price)";
*/
?>
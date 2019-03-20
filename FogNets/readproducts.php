<?php 
 $host="localhost";	 $user = "root";  $pass = "";  $db = "FogNets";
 $con = mysqli_connect($host,$user,$pass,$db);
//$cat='all';
$cat = $_REQUEST['cat'];
if($cat=='all') $condition=""; else $condition=" where cat='$cat'";

$query = "SELECT * FROM products $condition"; 
$result=mysqli_query($con, $query) or die ("Error in query: $query. ".mysqli_error($con));
while($row = mysqli_fetch_assoc($result)) 	{$arr[] = $row;}
echo json_encode($arr);
?>

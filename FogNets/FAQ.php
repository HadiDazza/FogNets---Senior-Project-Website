<?php
$host="localhost";	 $user = "root";  $pass = "";  $db = "FogNets";
 $con = mysqli_connect($host,$user,$pass,$db);
/*        read data from a table  */
$query = "select * from FAQ"; 
$result=mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));
$Arr = array();  
while($row = mysqli_fetch_assoc($result)) 	{$Arr[] = $row;}
echo json_encode($Arr);
/*        error handler   */
function errorHandler($q,$err) {echo "Error in query: $q. $err";};
?>


<?php
 $host="localhost";	 $user = "root";  $pass = "";  $db = "FogNets";
 $con = mysqli_connect($host,$user,$pass,$db);
 $cuName= $_REQUEST['cuName'];   $cuEmail= $_REQUEST['cuEmail'];    
 $cuSubject= $_REQUEST['cuSubject'];   $cuMessage= $_REQUEST['cuMessage'];    
// $cuName= 'Rami';   $cuEmail= 'aa@bb.com'; $cuSubject='bad service'; $cuMessage='Employee XX treated us badly';    
  
 $query = "insert into contactus (cuName,cuEmail,cuSubject,cuMessage)values('$cuName' , '$cuEmail', '$cuSubject', '$cuMessage')"; 
 $result = mysqli_query($con, $query) or die ("Error in query: $query. ".mysqli_error($con));

 $r["created"]= "yes";  $r["mes"]= "Success";
 $arr[]=$r;
 echo json_encode($arr);

?>


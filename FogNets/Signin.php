<?php
 $host="localhost";	 $user = "root";  $pass = "";  $db = "FogNets";
 $con = mysqli_connect($host,$user,$pass,$db);
  $uid= $_REQUEST['uid']; 
  $pass= $_REQUEST['pass'];   
//  $uid= 'A'; $pass='A';    
  $query = "SELECT * FROM users where uid= '$uid' and pass='$pass'"; 
  $result = mysqli_query($con, $query) or die ("Error in query: $query. ".mysqli_error($con));
//count number of records
  if(mysqli_num_rows($result)==0) {$r["found"]= "no"; $r["uname"]= "Username/password does not exist! Try another one!";}
  else{$row= mysqli_fetch_assoc($result); $r["found"]= "yes"; $r["uname"]= $row["uname"];} 
         
  $arr[]=$r;
  echo json_encode($arr);
?>
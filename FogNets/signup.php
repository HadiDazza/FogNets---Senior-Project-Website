<?php
 $host="localhost";	 $user = "root";  $pass = "";  $db = "FogNets";
 $con = mysqli_connect($host,$user,$pass,$db);
  $uid= $_REQUEST['uid'];   $pass= $_REQUEST['pass']; $address= $_REQUEST['address']; $uname= $_REQUEST['uname']; $email=$_REQUEST['email']; $phone=$_REQUEST['phone'];  
 // $uid= 'X' ; $pass= 'A'; $uname='samir'; $address='beirut';    
  
  $query = "SELECT * FROM users where uid= '$uid'"; 
  $result = mysqli_query($con, $query) or die ("Error in query: $query. ".mysqli_error($con));

  if(mysqli_num_rows($result)>0 )   {$r["created"]= "no";  $r["mes"]= "User-ID already taken! Try another one!";}
  else{ 
        $query = "insert into users values('$uid' , '$pass', '$uname', '$address','$email','$phone')"; 
        $result = mysqli_query($con, $query) or die ("Error in query: $query. ".mysqli_error($con));
        $r["created"]= "yes";  $r["mes"]= "Success";
	  };
  
  $arr[]=$r;
  echo json_encode($arr);

?>

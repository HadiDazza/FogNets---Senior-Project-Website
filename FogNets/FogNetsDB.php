<?php 
 $host="localhost";	 $user = "root";  $pass = "";  $db = "FogNets";
 $con = mysqli_connect($host,$user,$pass);
$query = "drop database if exists FogNets"; 
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));

/*        create database              */
$query = "create database FogNets"; 
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));

/*        create connection string to database           */
$con = mysqli_connect($host,$user,$pass,"FogNets");

/*        create table              */
$query ="create table users(uid varchar(8), pass varchar(8), uname varchar(15), address varchar(30), phone varchar(30),email varchar(30))";
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));

/*        insert data to table  */
$query = "insert into  users  values ('1001', 'A', 'Ahmad', 'Amchite','03434543','a@gmail.com'), ('1002', 'B', 'Bilal', 'Byblos','71234567','b@gmail.com'), ('1003', 'C', 'Carla', 'Hamra','78923941','c@gmail.com'), ('1004', 'S', 'Samer', 'Dbayeh','70324111','s@gmail.com')";															
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));

$query ="create table products(id int primary key auto_increment,   pid varchar(10),   pname varchar(50),  pdesc varchar(100), pimg varchar(10),  price decimal, cat varchar(10), stock int)";
$result = mysqli_query($con, $query) or die ("Error in query: $query. ".mysqli_error($con));

$query = "insert into  products (pid, pname, pdesc, pimg, price,cat,stock) values
( '1', '1000L Package', '1,000 Liters of Water', '1000l.jpg',20.00,'3rd Tier',20000),
( '2', '3000L Package', '3,000 Liters of Water', '3000l.jpg',60.00,'3rd Tier',20000),
( '3', '5000L Package', '5,000 Liters of Water + Double Card Points  ', '5000l.jpg',100.00,'2nd Tier',40000),
( '4', '10000L Package', '10,000 Liters of Water + Double Card Points + 1000 Liters extra ', '10000l.jpg',200.00,'1st Tier',80000)";
$result = mysqli_query($con, $query) or die ("Error in query: $query. ".mysqli_error($con));

$query ="create table contactus(id int primary key auto_increment, cuName varchar(20), cuEmail varchar(20),  cuSubject varchar(20), cuMessage varchar(2000))";
$result = mysqli_query($con, $query) or die ("Error in query: $query. ".mysqli_error($con));

$query ="create table orders(oid int primary key auto_increment, odate date, userid varchar(8), stat varchar(8))";
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));

$query ="create table ordersproduct(oid int, pid int, qty int, price double)";
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));

/*        insert data to table  */
$query = "insert into  orders (oid,userid, odate) values 
           (1,'1001','2018-03-30'),(2,'1002','2018-12-25'), 
		   (3,'1002','2018-04-23'),(4,'1002','2018-04-28'),
           (5,'1003','2018-03-30'),(6,'1004','2018-04-01'),
		   (7,'1001','2018-12-25'),(8,'1004','2018-04-28') ";															
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));

$query = "insert into  ordersproduct (oid, pid, qty, price) values 
           (1,1,3,60),(1,2,3,180),(1,3,3,300),
           (2,1,3,60),(2,3,3,300),(2,4,3,600),
           (3,4,3,600),(3,2,3,180),(3,1,3,60),
           (4,2,2,120),(4,1,3,60),(4,1,3,60),
           (5,3,4,400),(5,4,3,600),(5,4,1,200),
           (6,2,2,120),(6,4,3,600),(6,2,3,180),
           (7,3,3,300),(7,1,3,60),(7,3,3,300),
           (8,1,3,60),(8,1,3,60),(8,3,3,300) ";															
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));

//shippingAddress(oid, city, street, building, details, tel, expectDelDate, ActualDelDate, status)
$query ="create table shippingAddress(oid int, city varchar(20), street varchar(20),building varchar(20), details varchar(100), tel varchar(10), expectDelDate date,  ActualDelDate date, status varchar(20) )";
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));

/*        insert data to table  */
$query = "insert into  shippingAddress  values 
  (2,'Byblos','Souk St', 'Tika Bldg', '2nd floor','71234567', '2018-12-25', '2018-12-25', 'delivered'), 
  (7,'Amchite','Amchite St', 'Sika Bldg', '3rd floor','03434543', '2018-12-25', '2018-12-25', 'delivered')"; 
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));

// AuthPay(authID, AuthDate, cName, ccNo, expDate, cvv, cur, amt)
$query ="create table AuthPay(authID int primary key auto_increment, AuthDate date, CName varchar(20), ccNo varchar(20), expDate varchar(20), cvv varchar(4), cur varchar(10), amt double)";
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));

/*        insert data to table  */
$query = "insert into  AuthPay  values
  (1001,'2018-12-25','Ahmad', '12345678901234', '2021 December', '1234', 'usd', 960),
  (1002,'2018-12-25','Bilal',  '12345678934564', '2020 December', '4321', 'usd', 960)"; 
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));



$query ="create table FAQ(Q varchar(2000), A varchar(2000) ) ";
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));

$query = "insert into  FAQ (Q,A) values
('What is fog?', 'Fog is the same as a cloud except that it touches the ground, whereas a cloud has a base that is above the ground. When a cloud is moved by the wind and flows over and around a mountain, fog is present wherever the cloud touches the terrain. To a meteorologist, fog is present when the visibility is less than 1000 ft (about 300 m). What is important in the fog collection process is that fog is composed of tiny liquid water droplets from 1 to 40 micrometers in diameter. A typical droplet diameter is 10 µm.'),
('How much water is in fog?', 'There is typically from 0.05 to 0.5 grams of liquid water in a cubic meter of fog.'),
('Delivery time', 'Procedures take place once order is done. Delivery is done on the same day, but duration depends on distance from water station to client house. '),
('Water Availibility','Sometimes orders cannot be fulfilled due to water shortages. This depends on the amount of water harvested from fogs during a day. An announcement shall be displayed once water is not available to deliever.'),
('Delivery addresses','Orders can only be placed from Lebanon and are delivered to the whole of Lebanon.') ,
('How does a fog collection project get started?','The projects usually start with an assessment of whether suitable conditions might be present at a location. If we feel this is the case, the community is willing to contribute to the project, there is funding for the project, and we have an effective local partner, we will do an evaluation with small fog collectors to see how much water is available and in what seasons. The suitable locations are usually hills with frequent cloud movement over their surfaces forming fog. This may well be at night. If the evaluation shows good water production, and the community is motivated to assist with the project and use the water, then large fog collectors can be built.'),
('What are the costs for a fog collection project?','Costs are variable depending on location, access and whether all labor costs are donated. The small fog collectors for the evaluation cost $75 to $200 US each to build. The large 40 m2 fog collectors cost about $1000 to $1500 US each and can last 10 years. A village project producing about 2000 L a day will cost about $15,000 US.'),
('Is the fog water clean?','Fog water chemistry has been studied and found to meet World Health Organization drinking water standards. Because it is produced in remote areas few sources of potential contamination are present. Normally bacterial contamination would also not be an issue since it is very unlikely that there would be harmful bacteria in the fog. The mesh itself rapidly cleans itself from any dust that may have settled on it during a dry period. Once the water is produced by the fog collector the same precautions and considerations apply as for any other water source.'),
('Looking for Gold Card Support?','For Gold Card queries, please contact our Customer Services Team at customerservice@fognets.com.lb'),
('Any Questions regarding FogNets products and services?','Please ask your questions via our Contact Us page and we will help you with any inqueries'),
('Our Cookie Policy', 'We use cookies on our site to give you the best experience on our website')";
$result = mysqli_query($con, $query) or die (errorHandler($query, mysqli_error($con)));


/*        error handler   */
function errorHandler($q,$err) {echo "Error in query: $q. $err";};

?>

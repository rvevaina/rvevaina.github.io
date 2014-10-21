<?php

/*$time = $_GET['time'];
$eventID = $_GET['eventID'];*/

$con = mysqli_connect('flop.atleusdigital.com','flopper','flopper123','flopmysql');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
//get this prepped
mysqli_select_db($con, flopmysql);
//$string = /*SQL QUERY IN A STRING*/"SELECT b.* FROM eventTime a, response b WHERE a.eventID=b.eventID and a.userID= '".$q."'";
/*$string= "INSERT INTO eventtime (datetime,eventID)
VALUES('".$time."','".$eventID."')";*/
$string= "INSERT INTO test (name) VALUES('name1')";
$result = mysqli_query($con,$string);


//mysqli_fetch_array($result);

?>
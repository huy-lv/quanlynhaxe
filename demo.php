<?php

include("config.php");
 $page = $_GET['page']; 
global $conn;
 $sql = "SELECT * FROM tuyenxe INNER JOIN lotrinh ON tuyenxe.MATUYENXE = lotrinh.MATUYENXE";
 
 //getting result 
 $r = mysqli_query($conn,$sql);
 
 //pushing result to an array 
 $result = array();
 $row = mysqli_fetch_array($r);
 while($row = mysqli_fetch_array($result)){
 array_push($result,array(
 "DIEMDI"=>$row['DIEMDI'],
 "GIA"=>$row['GIA'],
  "TENTUYENXE"=>$row['TENTUYENXE'],

 "TONGKM"=>$row['TONGKM'],
 "THOIGIANBATDAU"=>$row['THOIGIANBATDAU'],
 "TONGKM"=>$row['TONGKM'],
 "DIEMDEN"=>$row['DIEMDEN'])

		
 );
 }
 //displaying in json format 
 echo json_encode($result);
 
 mysqli_close($conn);
?>














		
 
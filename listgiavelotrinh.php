<?php

include("config.php");
global $conn;
//$page = $_GET['page']; 
$sql="SELECT * FROM tuyenxe INNER JOIN lotrinh ON tuyenxe.MATUYENXE = lotrinh.MATUYENXE";
$result=mysqli_query($conn,$sql);
if($result){
	while ($row=mysqli_fetch_array($result)) {
		$flag[]=$row;
		
	}
print(json_encode($flag,JSON_UNESCAPED_UNICODE));
}


mysqli_close($conn);

 

 
 

?>

<<?php 

include_once("config.php");
global $conn;
$sql="SELECT * FROM lotrinh";
$result=mysqli_query($conn,$sql);
if($result){
	while ($row=mysqli_fetch_array($result)) {
		$flag[]=$row;
		# code...
	}
print(json_encode($flag,JSON_UNESCAPED_UNICODE));
}


mysqli_close($conn);






 ?>
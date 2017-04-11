<?php 
include_once("config.php");

	global $conn;

	$truyvancha="SELECT * from lotrinh";
 $ketqua = mysqli_query($conn,$truyvancha);
 $chuoijson = array();

echo "{";
		echo "\"LOTRINH\":";
		if($ketqua){
			while ($dong=mysqli_fetch_array($ketqua)) {
				
				array_push($chuoijson, array("MATUYENXE"=>$dong["MATUYENXE"],"DIEMDI"=>$dong["DIEMDI"],'DIEMDEN' => $dong["DIEMDEN"],'GIA' => $dong["GIA"],'TENLOTRINH' => $dong["TENLOTRINH"]));
				
			}

			echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);
		}
		echo "}";

		




 
?>






 
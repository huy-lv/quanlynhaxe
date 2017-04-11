<?php 
include_once("config.php");

	global $conn;

	$truyvancha="SELECT * from phancong";
 $ketqua = mysqli_query($conn,$truyvancha);
 $chuoijson = array();

echo "{";
		echo "\"PHANCONG\":";
		if($ketqua){
			while ($dong=mysqli_fetch_array($ketqua)) {
				
				array_push($chuoijson, array("MACONGVIEC"=>$dong["MACONGVIEC"],'BIENSOXE' => $dong["BIENSOXE"],'MATUYENXE' => $dong["MATUYENXE"],'MANV' => $dong["MANV"],'TENCONGVIEC' => $dong["TENCONGVIEC"],'NGAYLAMVIEC' => $dong["NGAYLAMVIEC"]));
				
			}

			echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);
		}
		echo "}";
 
?>






 
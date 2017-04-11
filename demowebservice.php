<?php
include("config.php");
$truyvan="SELECT * FROM chinhanhnhaxe";
$ketqua=mysqli_query($conn,$truyvan);
$chuoijson=array();
if($ketqua){
	while ($dong=mysqli_fetch_array($ketqua)) {
		array_push($chuoijson,array("TENCHINHANH"=> $dong["TENCHINHANH"],"MACHINHANH"=>$dong["MACHINHANH"],"SDTKHACH"=>$dong["SDTKHACH"],"DIACHICHINHANH"=>$dong["DIACHICHINHANH"],"MATINH"=>$dong["MATINH"]));

	}
	echo json_encode($chuoijson);
}

?>
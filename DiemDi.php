<?php 
include_once("config.php");

	
		$ham = $_GET["ham"];

		switch ($ham) {

			case 'LayDiemDi':
				$ham(); 
				break;

			case 'LayDiemDen':
				$ham(); 
				break;
          }


   function LayDiemDi(){
global $conn;



	$truyvancha="SELECT DISTINCT DIEMDI FROM lotrinh";
 $ketqua = mysqli_query($conn,$truyvancha);
 $chuoijson = array();

echo "{";
		echo "\"CACDIADIEM\":";
		if($ketqua){
			while ($dong=mysqli_fetch_array($ketqua)) {
				
				array_push($chuoijson, array("DIADIEM"=>$dong["DIEMDI"]));
				
			}

			echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);
		}
		echo "}";	

}


 function LayDiemDen(){
global $conn;



	$truyvancha="SELECT DISTINCT DIEMDEN FROM lotrinh";
	// $truyvancha ="SELECT DISTINCT DIEMDEN FROM lotrinh WHERE DIEMDI = ".$diemdi;
	echo $truyvancha;
 $ketqua = mysqli_query($conn,$truyvancha);
 $chuoijson = array();

echo "{";
		echo "\"CACDIADIEM\":";
		if($ketqua){
			while ($dong=mysqli_fetch_array($ketqua)) {
				
				array_push($chuoijson, array("DIADIEM"=>$dong["DIEMDEN"]));
				
			}

			echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);
		}
		echo "}";	

}




 
?>

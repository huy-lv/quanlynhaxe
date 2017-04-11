<?php

	include_once("config.php");
			
        $ham = $_POST["ham"];
         switch ($ham) {

				case 'DangKyThanhVien':
				$ham(); 
				break;

				case 'KiemTraDangNhap':
				$ham(); 
				break;
			}
           function DangKyThanhVien(){
			global $conn;
			if(isset($_POST["sdt"])|| isset($_POST["maphuongthuc"]) || isset($_POST["email"])  || isset($_POST["matkhaukh"])  || isset($_POST["emaildocquyen"]) || isset($_POST["cmnd"]) || isset($_POST["tenkhdv"])    ){
			
				$sdt = $_POST["sdt"]; 
				$maphuongthuc = $_POST["maphuongthuc"];
				$email = $_POST["email"];
				$matkhaukh = $_POST["matkhaukh"];
				$emaildocquyen = $_POST["emaildocquyen"];
			    $cmnd = $_POST["cmnd"];

               	$tenkhdv = $_POST["tenkhdv"];
			    
				
			}
			

			$truyvan = "INSERT INTO taikhoandv (SDT,MAPHUONGTHUC,EMAIL,MATKHAUKH,EMAILDOCQUYEN,TENKHDV,CMND) VALUES ('".$sdt."','".$maphuongthuc."','".$email."','".$matkhaukh."','".$emaildocquyen."','".$tenkhdv."','".$cmnd."') ";

			if(mysqli_query($conn,$truyvan)){
				echo "{ ketqua : true }";
			}else{
				echo "{ ketqua : false }".mysqli_error($conn);
			}

			mysqli_close($conn);


		   }

		   function KiemTraDangNhap(){
			global $conn;
			if(isset($_POST["sdt"]) || isset($_POST["matkhaukh"])){
				$sdt = $_POST["sdt"];
				$matkhaukh = $_POST["matkhaukh"];
			}

			$truyvan = "SELECT * FROM taikhoandv WHERE SDT='".$sdt."' AND MATKHAUKH ='".$matkhaukh."'";
			$ketqua = mysqli_query($conn,$truyvan);
			$demdong = mysqli_num_rows($ketqua);
			if($demdong >=1){
				$tenkhdv = "";
				while ($dong = mysqli_fetch_array($ketqua)) {
					$tennv = $dong["TENKHDV"];
				}
				echo "{ ketqua : true, tenkhdv : \"".$tenkhdv."\" }";
			}else{
				echo "{ ketqua : false }";
			}

		}
?>
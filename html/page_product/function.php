<?php
include("../../config.php");

$ham = $_POST["action"];
switch ($ham) {
	case 'ThemChiNhanhNhaXe':
	    $ham();
		break;
	

		case 'LayDanhSachChiNhanhNhaXe':
	    $ham();
		break;

		case 'XoaChiNhanhNhaXeTheoMa_Ajax':
	    $ham();
		break;

		default:
			# code...
			break;
}






function XoaChiNhanhNhaXeTheoMa_Ajax(){
		global $conn;
		$mangmachinhanh = $_POST["mangmachinhanh"];
		
		for($i=0; $i < count($mangmachinhanh); $i++){
			
			XoaBangLienQuanDenMaChiNhanh($mangmachinhanh[$i]);
			
		}
		echo "Xoa Thanh Cong!";
		
	}





	function XoaBangLienQuanDenMaChiNhanh($machinhanh){
		XoaTuyenXeTheoMaChiNhanh($machinhanh);
		XoaNhanVienTheoMaChiNhanh($machinhanh);
		XoaBangChiNhanhNhaXeTheoMaChiNhanh($machinhanh);

	}







function XoaBangChiNhanhNhaXeTheoMaChiNhanh($machinhanh){
	global $conn;
    $truyvan = "DELETE FROM chinhanhnhaxe WHERE MACHINHANH=".$machinhanh;
		$ketqua = mysqli_query($conn,$truyvan);
}

function XoaTuyenXeTheoMaChiNhanh($machinhanh){
	global $conn;
		$truyvan = "DELETE FROM tuyenxe WHERE MACHINHANH=".$machinhanh;
		 mysqli_query($conn,$truyvan);
		
}

function XoaNhanVienTheoMaChiNhanh($machinhanh){
	global $conn;
		$truyvan = "DELETE FROM nhanvien WHERE MACHINHANH=".$machinhanh;
		 mysqli_query($conn,$truyvan);
		
}



















function LayDanhSachChiNhanhNhaXe(){
		global $conn;
	$sotrang=$_POST["sotrang"];
		$limit=($sotrang-1)*8;
		$truyvan = "SELECT * FROM chinhanhnhaxe LIMIT ".$limit.",8";
		$ketqua = mysqli_query($conn,$truyvan);
		if($ketqua){
			while ($dong = mysqli_fetch_array($ketqua)) {
				echo "<tr>";
				echo '<th><div class="checkbox3 checkbox-round checkbox-check checkbox-light">
							<input name="cb-mang[]" data-id="'.$dong["MACHINHANH"].'" type="checkbox" id="cb-'.$dong["MACHINHANH"].'"/>
							<label for="cb-'.$dong["MACHINHANH"].'" ></label>
						</div></th>';
				echo '<th>'.$dong["TENCHINHANH"].'</th>';
				echo '<th>'.$dong["MACHINHANH"].'</th>';
				echo '<th>'.$dong["SDTKHACH"].'</th>';
				echo '<th>'.$dong["DIACHICHINHANH"].'</th>';
				echo '<th>'.$dong["MATINH"].'</th>';
				echo "</tr>";
			


			}
		}
	}


function ThemChiNhanhNhaXe(){
			global $conn;

			$tenchinhanh = $_POST["tenchinhanh"];
			$machinhanh = $_POST["machinhanh"];
	        $sdtkhach = $_POST["sdtkhach"];
	        $diachichinhanh = $_POST["diachichinhanh"];
	        $matinh = $_POST["matinh"];


		$loi = "Đã xảy ra lỗi trong quá trình thêm dữ liệu!";
		if($tenchinhanh == ""){
			echo $loi;
		}else{
			$truyvan = "INSERT INTO chinhanhnhaxe(TENCHINHANH,MACHINHANH,SDTKHACH,DIACHICHINHANH,MATINH) VALUES('".$tenchinhanh."','".$machinhanh."','".$sdtkhach."','".$diachichinhanh."','".$matinh."')";
			$ketqua = mysqli_query($conn,$truyvan);
			if($ketqua){
				echo "<h4 style='color:red'>Thêm thành công !<h4>";
			}else{
				echo $loi;
			}
		}

	};

	
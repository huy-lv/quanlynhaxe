	<?php

	include_once("config.php");
         $ham = $_GET["ham"];

	      switch ($ham) {

			case 'LayDanhSachKhuyenMai':
				$ham(); 
				break;
			}
      function LayDanhSachKhuyenMai(){
	
			global $conn;
			$chuoijson = array();

			$ngayhientai = date("Y/m/d");
			$truyvan = "SELECT * FROM khuyenmai km  WHERE DATEDIFF(km.NGAYKETTHUC,'".$ngayhientai."') >=0 LIMIT 0 , 20";
			$ketqua = mysqli_query($conn,$truyvan);

		echo "{";
			echo "\"DANHSACHKHUYENMAI\":";

			if($ketqua){
				while ($dong = mysqli_fetch_array($ketqua)) {
					
					$truyvanchitietkhuyemai = "SELECT * FROM chitietkhuyenmai ctkm, lotrinh lt WHERE ctkm.MAKM = '".$dong["MAKM"]."' AND ctkm.MALOTRINH = lt.MALOTRINH";
					$ketquakhuyenmai = mysqli_query($conn,$truyvanchitietkhuyemai);

					$chuoijsondanhsachsanpham = array();

					if($ketquakhuyenmai){
						while ( $dongkhuyenmai = mysqli_fetch_array($ketquakhuyenmai) ) {
							$chuoijsondanhsachsanpham[] = $dongkhuyenmai;
						}
					}

					array_push($chuoijson, array("MAKM"=>$dong["MAKM"],"TENKM"=>$dong["TENKM"],"HINHKHUYENMAI"=>$dong["HINHKHUYENMAI"],"DANHSACHSANPHAM"=>$chuoijsondanhsachsanpham));

				}
			}

			echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);

			
		}
		
?>
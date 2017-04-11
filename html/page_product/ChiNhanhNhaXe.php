
<div id="col-right">

<div class="card">
<input type="button" class="btn btn-default" id="btn-xoachinhanhnhaxe" value="Xóa" />

<div class="col-right">
				<table class="timkiem">
					<tr>
						<td><input type="text" class="form-control" id="txt-timtenchinhanh" placeholder="Nhập tên chi nhánh cần tìm"/></td>
						<td><button id="btn-timkiemchinhanh" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button></td>
					</tr>
				</table>
				
				
			</div>
<table class="table">
<thead>

<tr>

<th>
	                        <div class="checkbox3 checkbox-round checkbox-check checkbox-light">
								<input type="checkbox" id="cb-chontatca" value="Thêm"/>
								<label for="cb-chontatca" >Tất cả</label>
							</div>
</th>

<th>
	Tên Chi Nhánh
</th>
<th>
    Mã Chi Nhánh
</th>
<th>
     Số Điện Thoại
</th>
<th>
     Địa Chỉ 
</th>
<th>
  Mã Tỉnh
</th>
<th>
 Hình Ảnh
</th>
</tr>
</thead>
<tbody>
	<?php 
	LayDanhSachChiNhanhNhaXe(0);
	?>
</tbody>

</table>
<?php 
HienThiPhanTrang();
			?>
</div>

</div>



<div id="col-left">

<div class="page-title form-style">
		<span class="title">Chi Nhánh Nhà Xe</span>
		<div class="description"> Quản Lý Liên Quan Đến Các Chi Nhánh Nhà Xe</div>
		<div class="form-group">
		<label for="id-tenchinhanhnhaxe">Tên Chi Nhánh Nhà Xe</label>
		<input type="text" id="id-tenchinhanhnhaxe" class="form-control" placeholder="Nhập Tên Chi Nhánh">
		<label for="id-machinhanh" >Mã Chi Nhánh</label>
		<input type="text" id="id-machinhanh" class="form-control" placeholder="Nhập Mã Chi Nhánh">
		<label for="id-sdtchinhanh" >Số Điện Thoại</label>
		<input type="text" id="id-sdtchinhanh" class="form-control" placeholder="Nhập SĐT Chi Nhánh">
		<label for="id-diachichinhanh" >Địa Chỉ Chi Nhánh</label>
		<input type="text" id="id-diachichinhanh" class="form-control" placeholder="Nhập Địa Chỉ Chi Nhánh">
		<label >Mã Tỉnh</label>
		<select id="id-selectmatinh">
	     <optgroup label="Mã Tỉnh">
			<?php
		 hienthimatinh();
		?>
		</optgroup>
		</select>
		</br>
		<input type="button" class ="btn btn-success" id="btn-themchinhanh" value="Thêm">
        <div class="thongbaoloi"></div>
		</div>
</div>
</div>
<?php
function HienThiPhanTrang(){
		global $conn;
		$truyvan = "SELECT * FROM chinhanhnhaxe";
		$ketqua = mysqli_query($conn,$truyvan);
		$tongsotrang = ceil(mysqli_num_rows($ketqua)/8);
		echo '<nav>
	            <ul class="pagination">
	                <li>
	                    <a href="#" aria-label="Previous">
	                        <span aria-hidden="true">&laquo;</span>
	                    </a>
	                </li>'	;
		for($i=1;$i<=$tongsotrang;$i++){
			if($i==1){
				echo '<li class="active"><a href="#">'.$i.'</a></li>';
			}else{
				echo '<li><a href="#">'.$i.'</a></li>';
			}
		}

		echo '<li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
               </li>
            </ul>
        </nav>';
	}

function LayDanhSachChiNhanhNhaXe($limit){
		global $conn;
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

function hienthimatinh(){
		global $conn;
		$truyvan = "SELECT * FROM tinh";
		$ketqua = mysqli_query($conn,$truyvan);
		echo count($ketqua);
		if($ketqua){
			while ($dong = mysqli_fetch_array($ketqua)) {
				echo "<option value='".$dong["MATINH"]."'>".$dong["MATINH"]."</option>";


			}
		}
	};
?>
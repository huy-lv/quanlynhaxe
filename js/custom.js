$(document).ready(function(){
	//xu lý thêm chi nhánh nhà xe
$("#btn-themchinhanh").click(function(){
	        var tenchinhanh = $("#id-tenchinhanhnhaxe").val();
		    var machinhanh = $("#id-machinhanh").val();
			var sdtkhach = $("#id-sdtchinhanh").val();
	        var diachichinhanh = $("#id-diachichinhanh").val();
	        var matinh = $("#id-selectmatinh").val();
       

		$.ajax({
			url : "../html/page_product/function.php", //đường dẫn của trang xử lý code gữi qua
			type : "POST",
			// datatype: ""
			data : {
				action : "ThemChiNhanhNhaXe",
				tenchinhanh : tenchinhanh ,
				machinhanh : machinhanh,
				sdtkhach : sdtkhach,
				diachichinhanh : diachichinhanh,
				matinh : matinh
			},
			success:function(data){
				$(".thongbaoloi").empty();
				$(".thongbaoloi").append(data);
			}
		});
	});
	//xử lý phân trang
	$("nav").delegate("ul.pagination>li","click",function(){
	var sotrang = $(this).text();
	$("ul.pagination>li").removeClass("active");
	$(this).addClass("active");
	$.ajax({
		url : "../html/page_product/function.php", //đường dẫn của trang xử lý code gữi qua
		type : "POST",
		// datatype: ""
		data : {
			action : "LayDanhSachChiNhanhNhaXe",
			sotrang: sotrang ,
		
		},
		success:function(data){
			
			$("table.table").find("tbody").empty();
			$("table.table").find("tbody").append(data);
		
		}
		});
	    });


	// xử lý check tất cả
	$("#cb-chontatca").change(function(){
		var allcheckbox = $(this).closest("table").find("tbody input:checkbox");
		if($(this).is(":checked")){
			allcheckbox.prop("checked",true);
		}else{
			allcheckbox.prop("checked",false);
		}
	});



// xu lý xóa chi nhánh
$("#btn-xoachinhanhnhaxe").click(function(){
var mangcheckbox = [];

$("input[name='cb-mang[]']:checked").each(function(){
			var macn = $(this).attr("data-id");
			mangcheckbox.push(macn);

		});
     $.ajax({
			url : "../html/page_product/function.php", //đường dẫn của trang xử lý code gữi qua
			type : "POST",
			// datatype: ""
			data : {
				action : "XoaLoaiSanPhamTheoMa_Ajax",
				mangmachinhanh : mangcheckbox,
			
			},
				success:function(data){
					$.ajax({
						url : "../html/page_product/function.php", //đường dẫn của trang xử lý code gữi qua
						type : "POST",
						// datatype: ""
						data : {
							action : "LayDanhSachChiNhanhNhaXe",
							sotrang : 1,
						
						},
						success:function(dulieu){
							$("table.table").find("tbody").empty();
							$("table.table").find("tbody").append(dulieu);
						}
					});

				}

	});

});
});

/*
$("#btn-xoachinhanhnhaxe").click(function(){
		var mangcheckbox = [];
		$("input[name='cb-mang[]']:checked").each(function(){
			var machinhanh = $(this).attr("data-id");
			mangcheckbox.push(machinhanh);
		});

		$.ajax({
			url : "../html/page_product/function.php", //đường dẫn của trang xử lý code gữi qua
			type : "POST",
			// datatype: ""
			data : {
				action : "XoaLoaiSanPhamTheoMa_Ajax",
				mangmachinhanh : mangcheckbox,
			
			},
			success:function(data){

				//load lại nội dung của loại sản phẩm khi xóa
				$.ajax({
						url : "../html/page_product/function.php", //đường dẫn của trang xử lý code gữi qua
						type : "POST",
						// datatype: ""
						data : {
							action : "LayDanhSachChiNhanhNhaXe",
							sotrang : 1,
						
						},
						success:function(dulieu){
							$("table.table").find("tbody").empty();
							$("table.table").find("tbody").append(dulieu);
						}
					});

				
			}
		});
	});
	*/
    

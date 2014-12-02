<!DOCTYPE html>
<html>
<head>
	<title>Khách hàng</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="{asset_url()}css/style.css">
	<script type="text/javascript" src="{asset_url()}js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript">
	{literal}
	function getds(){
		$.ajax({
        type: "POST",
{/literal}
        url: "{base_url('khachhangController/dsKhachHang')}",
{literal}
        success: function(data) {

          $('#dsContainer>table').append(data);
        }
      });
	}
	$(document).ready(function(){
			getds();
			$('#btnThem').click(function(){
				var tenkh=$("#tenkh").val();
				var diachi=$("#diachi").val();
				var dienthoai=$("#dienthoai").val();
				var cmnd=$("#cmnd").val();
				var tongtien=$("#tongtien").val();
				var dataString = 'tenkh=' + tenkh+'&diachi='+diachi+'&dienthoai='+dienthoai+'&cmnd='+cmnd+'&tongtien='+tongtien;
				$.ajax({
			        type: "POST",
			{/literal}
			        url: "{base_url('khachhangController/themKhachHang')}",
			{literal}
					data: dataString,
			        success: function() {
			        	
			        }
			    });

			});

			$(document).on('click','.xoaButton',function(){
				var makh=$(this).attr('rel');
				var doiTuong=$(this).parent().parent();
				$.ajax({
				   type: "POST",
				{/literal}
			        url: "{base_url('khachhangController/xoaKhachHang')}",
				{literal}
				   data:'makh='+makh,
				   success: function(){
				     doiTuong.fadeOut('slow');
				   }
				});
			});
			$(document).on('click','.suaButton',function(){
				var parent=$(this).parent().parent();
				$("#tenkhSua").val(parent.find('.ten').html());
				$("#diachiSua").val(parent.find('.dc').html());
				$("#dienthoaiSua").val(parent.find('.dt').html());
				$("#cmndSua").val(parent.find('.cmnd').html());
				$("#tongtienSua").val(parent.find('.tt').html());
				$("#makhSua").val($(this).attr('rel'));
				$('#suaContainer').show();
				
			});

			$('#btnSua').click(function(){
				var makh=$("#makhSua").val();
				var tenkh=$("#tenkhSua").val();
				var diachi=$("#diachiSua").val();
				var dienthoai=$("#dienthoaiSua").val();
				var cmnd=$("#cmndSua").val();
				var tongtien=$("#tongtienSua").val();
				var dataString = 'makh=' + makh+'&tenkh=' + tenkh+'&diachi='+diachi+'&dienthoai='+dienthoai+'&cmnd='+cmnd+'&tongtien='+tongtien;
				$.ajax({
				   type: "POST",
				{/literal}
			        url: "{base_url('khachhangController/suaKhachHang')}",
				{literal}
				   data:dataString,
				   success: function(){
				     location.reload();
				   }
				});
			});
	});
	{/literal}
	</script>
</head>
<body>
	<div class="container">
		<FIELDSET>
			<legend>
				Thêm khách hàng
			</legend>
				<input type="text" placeholder="Tên khách hàng..." name="tenkh" id="tenkh"><br>
				<input type="text" placeholder="Địa chỉ..." name="diachi" id="diachi"><br>
				<input type="text" placeholder="Điện thoại..." name="dienthoai" id="dienthoai"><br>
				<input type="text" placeholder="Chứng minh..." name="cmnd" id="cmnd"><br>
				<input type="text" placeholder="Tổng tiền..." name="tongtien" id="tongtien"><br>
				<button id="btnThem">Thêm</button>
		</FIELDSET>
		<div id="suaContainer" style="display:none;">
			<FIELDSET>
				<legend>
					Sửa khách hàng
				</legend>
					<input type="hidden" id="makhSua"><br>
					<input type="text" placeholder="Tên khách hàng..." name="tenkhSua" id="tenkhSua"><br>
					<input type="text" placeholder="Địa chỉ..." name="diachiSua" id="diachiSua"><br>
					<input type="text" placeholder="Điện thoại..." name="dienthoaiSua" id="dienthoaiSua"><br>
					<input type="text" placeholder="Chứng minh..." name="cmndSua" id="cmndSua"><br>
					<input type="text" placeholder="Tổng tiền..." name="tongtienSua" id="tongtienSua"><br>
					<button id="btnSua">Sửa</button>
			</FIELDSET>
		</div>
		<div id="dsContainer">
			<table border="1">
				<tr>
					<th>Mã khách hàng</th>
					<th>Tên khách hàng</th>
					<th>Địa chỉ </th>
					<th>Điện thoại </th>
					<th>Chứng minh</th>
					<th>Tổng tiền</th>
					<th>Action</th>
				</tr>
			</table>

		</div>
	</div>
</body>
</html>
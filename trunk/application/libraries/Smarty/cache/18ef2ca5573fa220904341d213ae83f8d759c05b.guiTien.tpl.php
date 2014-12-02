<?php /*%%SmartyHeaderCode:3113547d728a21b753-30916295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18ef2ca5573fa220904341d213ae83f8d759c05b' => 
    array (
      0 => 'application\\views\\templates\\guiTien.tpl',
      1 => 1417507031,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3113547d728a21b753-30916295',
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_547d728a3bb806_87162103',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547d728a3bb806_87162103')) {function content_547d728a3bb806_87162103($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="http://localhost:81/QLNganHang/assets/css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="http://localhost:81/QLNganHang/assets/css/style.css">
	<script type="text/javascript" src="http://localhost:81/QLNganHang/assets/js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="http://localhost:81/QLNganHang/assets/js/jquery-ui.js"></script>
  <script type="text/javascript" src="http://localhost:81/QLNganHang/assets/js/jquery.price_format.2.0.min.js"></script>
	<script>
   
  function getTongTien(makh){
    $.ajax({
              type: "POST",
      
              url: "http://localhost:81/QLNganHang/khachhangController/layTongTien",
      
          data: 'makh='+makh,
              success: function(data) {
                $('#result').append('<p>Số tiền trong tài khoản khách hàng '+makh+' hiện tại là: <span class="money">'+data+'</span></p>');
                $('.money').priceFormat({
                    centsLimit: 3,
                    prefix: '',
                    suffix: 'đ'
                });
              }
          });
  }

  function getGiaoDich(makh){
    $.ajax({
              type: "POST",
      
              url: "http://localhost:81/QLNganHang/giaodichController/tinhTrangGiaoDich",
      
          data: 'makh='+makh,
              success: function(data) {
                $('#result').append(data);
              }
          });
  }

  function tgianThucThi(time){
    $('#result').append('<h2 style="color:red">Thời gian thực thi: '+time+' giây</h2>');
  }

  $(document).ready(function() {

    $('#tabs').tabs({
      activate: function(event, ui) {
         $('#result').empty();
         $('input').val("");
      }
    });

    $("#btnGuiTien").click(function(){
    	var makh=$("#makhGui").val();
    	var sotien=$("#sotienGui").val();
    	if(makh==""||sotien==""){
    		alert("Vui lòng nhập mã khách hàng gửi và số tiền gửi");
    	}else{
        var dataString = 'makh='+makh+'&sotien='+sotien;
        $.ajax({
              type: "POST",
              dataType: 'json',
      
              url: "http://localhost:81/QLNganHang/giaodichController/guiTien",
      
          data: dataString,
              success: function(data) {
                $('#result').empty();
                if(data.data1==1){
                  $('#result').append('<h1>Gửi tiền thành công</h1>');
                  getTongTien(makh);
                  getGiaoDich(makh);
                  tgianThucThi(data.data2);
                }else if(data.data1==2){
                  $('#result').append('<h1>Không tồn tại khách hàng '+makh+'</h1>');
                }else if(data.data1==3){
                  $('#result').append('<h1>Mã khách hàng không phù hợp</h1>');
                }else{
                  $('#result').append('<h1>Có lỗi xảy ra, vui lòng thực hiện lại</h1>');
                }
              }
          });
    	}
    });

    $("#btnRutTien").click(function(){
    	var makh=$("#makhRut").val();
    	var sotien=$("#sotienRut").val();
    	if(makh==""||sotien==""){
    		alert("Vui lòng nhập mã khách hàng rút và số tiền rút");
    	}else{
        var dataString = 'makh='+makh+'&sotien='+sotien;
        $.ajax({
              type: "POST",
              dataType: 'json',
      
              url: "http://localhost:81/QLNganHang/giaodichController/rutTien",
      
          data: dataString,
              success: function(data) {
                $('#result').empty();
                if(data.data1==1){
                  $('#result').append('<h1>Rút tiền thành công</h1>');
                  getTongTien(makh);
                  getGiaoDich(makh);
                  tgianThucThi(data.data2);
                }else if(data.data1==2){
                  $('#result').append('<h1>Không tồn tại khách hàng '+makh+'</h1>');
                }else if(data.data1==3){
                  $('#result').append('<h1>Mã khách hàng không phù hợp</h1>');
                }else if(data.data1==5){
                  $('#result').append('<h1>Không đủ tiền rút</h1>');
                }else{
                  $('#result').append('<h1>Có lỗi xảy ra, vui lòng thực hiện lại</h1>');
                }
              }
          });
    	}
    });
    $("#btnChuyenTien").click(function(){
    	var makhChuyen=$("#makhChuyen").val();
    	var makhNhan=$("#makhNhan").val();
    	var sotien=$("#sotienChuyen").val();
    	if(makhChuyen==""||makhNhan==""||sotien==""){
    		alert("Vui lòng nhập mã khách hàng chuyển, mã khách hàng nhận và số tiền chuyển");
    	}else{
    		var dataString = 'makhGui='+makhChuyen+'&makhNhan='+makhNhan+'&sotien='+sotien;
        $.ajax({
              type: "POST",
              dataType: 'json',
      
              url: "http://localhost:81/QLNganHang/giaodichController/chuyenTien",
      
          data: dataString,
              success: function(data) {
                $('#result').empty();
                if(data.data1==1){
                  $('#result').append('<h1>Chuyển tiền thành công</h1>');
                  getTongTien(makhChuyen);
                  getGiaoDich(makhChuyen);
                  getTongTien(makhNhan);
                  getGiaoDich(makhNhan);
                  tgianThucThi(data.data2);
                }else if(data.data1==2){
                  $('#result').append('<h1>Không tồn tại khách hàng nhận</h1>');
                }else if(data.data1==3){
                  $('#result').append('<h1>Mã khách hàng nhận không phù hợp</h1>');
                }else if(data.data1==5){
                  $('#result').append('<h1>Không đủ tiền chuyển</h1>');
                }else if(data.data1==6){
                  $('#result').append('<h1>Không tồn tại khách hàng gửi</h1>');
                }else if(data.data1==7){
                  $('#result').append('<h1>Mã khách hàng gửi không đúng</h1>');
                }else{
                  $('#result').append('<h1>Có lỗi xảy ra, vui lòng thực hiện lại</h1>');
                }
              }
          });
    	}
    });
    $("#btnKiemTra").click(function(){
      var makh=$("#makhKT").val();
      $('#result').empty();
      getTongTien(makh);
      getGiaoDich(makh);
    });
  });

  </script>
  <meta charset="UTF-8">
  <title>CSDL PT QL NGÂN HÀNG</title>
</head>
<body>
	<div class="error"></div>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Gửi tiền</a></li>
    <li><a href="#tabs-2">Rút tiền</a></li>
    <li><a href="#tabs-3">Chuyển tiền</a></li>
    <li><a href="#tabs-4">Kiểm tra tài khoản</a></li>
  </ul>

  <div id="tabs-1">
      <div id="guiTien">
		<input type="text" placeholder="Mã khách hàng..." name="makhGui" id="makhGui"><br>
		<input type="text" placeholder="Số tiền gửi..." name="sotienGui" id="sotienGui"><br>
		<button id="btnGuiTien">Gửi tiền</button>
	</div>
  </div>

  <div id="tabs-2">
	    <div id="rutTien">
			<input type="text" placeholder="Mã khách hàng..." name="makhRut" id="makhRut"><br>
			<input type="text" placeholder="Số tiền rút..." name="sotienRut" id="sotienRut"><br>
			<button id="btnRutTien">Rút tiền</button>
		</div>
	</div>
  <div id="tabs-3">
    <div id="chuyenTien">
		<input type="text" placeholder="Mã khách hàng gửi..." name="makhChuyen" id="makhChuyen"><br>
		<input type="text" placeholder="Mã khách hàng nhận..." name="makhNhan" id="makhNhan"><br>
		<input type="text" placeholder="Số tiền..." name="sotienChuyen" id="sotienChuyen"><br>
		<button id="btnChuyenTien">Chuyển tiền</button>
	</div>
   </div>
   <div id="tabs-4">
      <div id="kiemTra">
      <input type="text" placeholder="Mã khách hàng..." name="makhKT" id="makhKT"><br>
      <button id="btnKiemTra">Kiểm tra</button>
    </div>
  </div>
</div>
	<div id="result"></div>

</body>
</html><?php }} ?>

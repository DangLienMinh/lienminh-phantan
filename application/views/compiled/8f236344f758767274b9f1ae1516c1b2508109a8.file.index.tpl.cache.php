<?php /* Smarty version Smarty-3.1.18, created on 2014-12-15 16:02:23
         compiled from "application\views\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1963548ef7ff3a5082-12650113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f236344f758767274b9f1ae1516c1b2508109a8' => 
    array (
      0 => 'application\\views\\templates\\index.tpl',
      1 => 1418655424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1963548ef7ff3a5082-12650113',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'guiTien' => 0,
    'khachHang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_548ef7ff572674_60980719',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548ef7ff572674_60980719')) {function content_548ef7ff572674_60980719($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel</title>
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo asset_url();?>
js/jquery-2.1.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="<?php echo asset_url();?>
js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo asset_url();?>
js/jquery.price_format.2.0.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>
css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>
css/sb-admin.css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>
font-awesome-4.1.0/css/font-awesome.min.css">
    <style type="text/css">
        .tab-content {
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }

        .nav-tabs {
            margin-bottom: 0;
        }
    </style>
    <script>
   
  function getTongTien(makh){
    $.ajax({
              type: "POST",
      
              url: "<?php echo base_url('khachhangController/layTongTien');?>
",
      
          data: 'makh='+makh,
              success: function(data) {
                $('#result').append('<p>Số tiền trong tài khoản khách hàng '+makh+' hiện tại là: '+data+'</p>');
              }
          });
  }

  function getGiaoDich(makh){
    $.ajax({
              type: "POST",
      
              url: "<?php echo base_url('giaodichController/tinhTrangGiaoDich');?>
",
      
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
    $("#sotienGui").priceFormat({prefix: '', suffix: ' đ', centsLimit: 0, thousandsSeparator: '.'});
    $("#sotienRut").priceFormat({prefix: '', suffix: ' đ', centsLimit: 0, thousandsSeparator: '.'});
    $("#sotienChuyen").priceFormat({prefix: '', suffix: ' đ', centsLimit: 0, thousandsSeparator: '.'});
    $("#btnGuiTien").click(function(){
        var makh=$("#makhGui").val();
        var sotien=$("#sotienGui").unmask();
        if(makh==""||sotien==""){
            alert("Vui lòng nhập mã khách hàng gửi và số tiền gửi");
        }else{
        var dataString = 'makh='+makh+'&sotien='+sotien;
        $.ajax({
              type: "POST",
              dataType: 'json',
      
              url: "<?php echo base_url('giaodichController/guiTien');?>
",
      
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
        var sotien=$("#sotienRut").unmask();
        if(makh==""||sotien==""){
            alert("Vui lòng nhập mã khách hàng rút và số tiền rút");
        }else{
        var dataString = 'makh='+makh+'&sotien='+sotien;
        $.ajax({
              type: "POST",
              dataType: 'json',
      
              url: "<?php echo base_url('giaodichController/rutTien');?>
",
      
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
        var sotien=$("#sotienChuyen").unmask();
        if(makhChuyen==""||makhNhan==""||sotien==""){
            alert("Vui lòng nhập mã khách hàng chuyển, mã khách hàng nhận và số tiền chuyển");
        }else{
            var dataString = 'makhGui='+makhChuyen+'&makhNhan='+makhNhan+'&sotien='+sotien;
        $.ajax({
              type: "POST",
              dataType: 'json',
      
              url: "<?php echo base_url('giaodichController/chuyenTien');?>
",
      
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
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">CSDLPT Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administrator <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['guiTien']->value;?>
"><i class="fa fa-fw fa-edit"></i> Nghiệp Vụ</a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['khachHang']->value;?>
"><i class="fa fa-fw fa-user"></i> QL Khách Hàng</a>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i>Thông Tin Nhóm</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Nghiệp Vụ Ngân Hàng
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Nghiệp Vụ
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                            <ul id="myTab" class="nav nav-tabs">
                           <li class="active">
                              <a href="#gui" data-toggle="tab">Gửi tiền</a>
                           </li>
                           <li><a href="#rut" data-toggle="tab">Rút tiền</a></li>
                          <li><a href="#chuyen" data-toggle="tab">Chuyển tiền</a></li>
                          <li><a href="#kiemtra" data-toggle="tab">Kiểm tra tài khoản</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                           <div class="tab-pane fade in active" id="gui">
                              <div class="form-group">
                                <label>Mã khách hàng</label>
                                <input class="form-control" id="makhGui" placeholder="Mã khách hàng">
                              </div>
                              <div class="form-group">
                                <label>Số tiền gửi</label>
                                <input class="form-control" id="sotienGui" placeholder="Số tiền gửi">
                              </div>
                              <button id="btnGuiTien" class="btn btn-default">Gửi tiền</button>
                           </div>
                          <div class="tab-pane fade in" id="rut">
                              <div class="form-group">
                                <label>Mã khách hàng</label>
                                <input class="form-control" id="makhRut" placeholder="Mã khách hàng">
                              </div>
                              <div class="form-group">
                                <label>Số tiền rút</label>
                                <input class="form-control" id="sotienRut" placeholder="Số tiền rút">
                              </div>
                              <button id="btnRutTien" class="btn btn-default">Rút tiền</button>
                           </div>
                           <div class="tab-pane fade in" id="chuyen">
                              <div class="form-group">
                                <label>Mã khách hàng gửi</label>
                                <input class="form-control" placeholder="Mã khách hàng gửi" id="makhChuyen">
                              </div>
                              <div class="form-group">
                                <label>Mã khách hàng nhận</label>
                                <input class="form-control" placeholder="Mã khách hàng nhận" id="makhNhan">
                              </div>
                              <div class="form-group">
                                <label>Số tiền</label>
                                <input class="form-control" placeholder="Số tiền" id="sotienChuyen">
                              </div>
                              <button id="btnChuyenTien" class="btn btn-default">Chuyển tiền</button>
                           </div>
                           <div class="tab-pane fade in" id="kiemtra">
                              <div class="form-group">
                                <label>Mã khách hàng</label>
                                <input class="form-control" placeholder="Mã khách hàng" id="makhKT">
                              </div>
                              <button id="btnKiemTra" class="btn btn-default">Kiểm tra</button>
                           </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-6">
                        <div id="result"></div>
                    </div>
            </div>

        </div>
    </div>
</body>

</html>
<?php }} ?>

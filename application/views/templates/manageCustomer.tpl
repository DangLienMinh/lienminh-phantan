<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel</title>
    <!-- jQuery -->
    <script type="text/javascript" src="{asset_url()}js/jquery-2.1.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="{asset_url()}js/bootstrap.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{asset_url()}css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{asset_url()}css/sb-admin.css">
    <link rel="stylesheet" type="text/css" href="{asset_url()}font-awesome-4.1.0/css/font-awesome.min.css">
    <style>
     table { table-layout: fixed; width:100%!important;}

    </style>
    <script type="text/javascript">
  {literal}
  function getds(){
    $.ajax({
        type: "POST",
{/literal}
        url: "{base_url('khachhangController/dsKhachHang')}",
{literal}
        success: function(data) {

          $('#reportContent').append(data);
        }
      });
  }
  $(document).ready(function(){
      getds();

      $(".btnReset").click(function(){
        $('input').val('');
        $("#suaContainer").hide();
        $("#themContainer").show();
      });

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
                location.reload();
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
        return false;
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
        $("#themContainer").hide();
        $("#suaContainer").show();
        return false;
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
                    <li >
                        <a href="{$guiTien}"><i class="fa fa-fw fa-edit"></i> Nghiệp Vụ</a>
                    </li>
                    <li class="active">
                        <a href="{$khachHang}"><i class="fa fa-fw fa-user"></i> QL Khách Hàng</a>
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
                            Quản Lý Khách Hàng
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Khách Hàng
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                  <h2>Thông tin Khách Hàng</h2>
                    <div>
                        <div class="table-responsive">
                            <table class="table table-bordered  table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">Mã KH</th>
                                        <th style="width: 20%">Tên KH</th>
                                        <th style="width: 20%">Địa chỉ</th>
                                        <th style="width: 10%">Điện thoại</th>
                                        <th style="width: 9%">Chứng minh</th>
                                        <th style="width: 10%">Tổng tiền</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="reportContent">
                                    <!-- {$results} -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="result"></div>
                </div>
                <!-- /.row -->
                <div class="row" id="themContainer">
                  <div class="col-lg-6">
                    <h2>Thêm khách hàng</h2>
                      <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input class="form-control" id="tenkh">
                      </div>
                      <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" id="diachi">
                      </div>
                      <div class="form-group">
                        <label>Điện thoại</label>
                        <input class="form-control" id="dienthoai">
                      </div>
                      <div class="form-group">
                        <label>Chứng minh</label>
                        <input class="form-control" id="cmnd">
                      </div>
                      <div class="form-group">
                        <label>Tổng tiền</label>
                        <input class="form-control" id="tongtien">
                      </div>
                      <button id="btnThem" class="btn btn-default">Thêm</button>
                      <button class="btn btn-default btnReset">Huỷ</button>
                  </div>
                </div>
                <div class="row" style="display:none" id="suaContainer">
                  <div class="col-lg-6">
                    <h2>Sửa khách hàng</h2>
                      <input type="hidden" id="makhSua">
                      <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input class="form-control" id="tenkhSua">
                      </div>
                      <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" id="diachiSua">
                      </div>
                      <div class="form-group">
                        <label>Điện thoại</label>
                        <input class="form-control" id="dienthoaiSua">
                      </div>
                      <div class="form-group">
                        <label>Chứng minh</label>
                        <input class="form-control" id="cmndSua">
                      </div>
                      <div class="form-group">
                        <label>Tổng tiền</label>
                        <input class="form-control" id="tongtienSua">
                      </div>
                      <button id="btnSua" class="btn btn-default">Sửa</button>
                      <button class="btn btn-default btnReset">Huỷ</button>
                  </div>
                </div>
                
        </div>
    </div>
</body>

</html>

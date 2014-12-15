<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
class GiaodichController extends CI_Controller {
    function index() {
    }

    function tinhTrangGiaoDich(){
        $makh = $_POST["makh"];
        $kq="<h2>Giao dịch ".$makh.'</h2><div class="table-responsive"><table class="table table-bordered  table-hover table-striped"><thead><tr><th style="width: 30px;">Mã CN</th><th style="width: 30px">Mã KH</th><th style="width: 25%">Ngày giao dịch</th><th style="width: 20%">Số tiền</th><th style="width: 20%">Loại giao dịch</th></tr></thead><tbody>';
        $em      = $this->doctrine->em;
        $giaodich    = new Entity\GiaodichDAO($em);
        $result  = $giaodich->tinhTrangGiaoDich($makh);
        foreach ($result as $k) {
            $kq.='<tr><td>'.$k['MACN'].'</td><td>'.$k['MAKH'].'</td><td>'.$k['NGAY'].'</td><td>'.number_format($k['SOTIENGD'],"0",",",".")." vnđ".'</td><td>'.$k['LOAIGD'].'</td></tr>';
        }
        $kq.="</tbody></table></div>";
        echo $kq;
    }

    public function guiTien(){
        $data['makh'] = $_POST["makh"];
        $data['sotien']  = $_POST["sotien"];

        $em      = $this->doctrine->em;
        $this->benchmark->mark('code_start');
        $gd    = new Entity\GiaodichDAO($em);
        $result=$gd->guiTien($data);
        $this->benchmark->mark('code_end');
        $tgian=$this->benchmark->elapsed_time('code_start', 'code_end');
        echo json_encode(array("data1" => $result,"data2" => $tgian));
    }
    
    public function rutTien(){
        $data['makh'] = $_POST["makh"];
        $data['sotien']  = $_POST["sotien"];

        $em      = $this->doctrine->em;
        $this->benchmark->mark('code_start');
        $gd    = new Entity\GiaodichDAO($em);
        $result=$gd->rutTien($data);
        $this->benchmark->mark('code_end');
        $tgian=$this->benchmark->elapsed_time('code_start', 'code_end');
        echo json_encode(array("data1" => $result,"data2" => $tgian));
    }

    public function chuyenTien(){
        $data['makhGui'] = $_POST["makhGui"];
        $data['makhNhan'] = $_POST["makhNhan"];
        $data['sotien']  = $_POST["sotien"];

        $em      = $this->doctrine->em;
        $this->benchmark->mark('code_start');
        $gd    = new Entity\GiaodichDAO($em);
        $result=$gd->chuyenTien($data);
        $this->benchmark->mark('code_end');
        $tgian=$this->benchmark->elapsed_time('code_start', 'code_end');
        echo json_encode(array("data1" => $result,"data2" => $tgian));
    }
}
?>
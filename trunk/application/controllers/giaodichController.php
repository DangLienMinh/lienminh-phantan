<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
class GiaodichController extends CI_Controller {
    function index() {
    }

    function tinhTrangGiaoDich(){
        $makh = $_POST["makh"];
        $kq="<h1>Giao dịch ".$makh."</h1><table border='1'><tr><th>Mã chi nhánh</th><th>Mã khách hàng</th><th>Ngày giao dịch</th><th>Số tiền</th><th>Loại giao dịch</th></tr>";
        $em      = $this->doctrine->em;
        $giaodich    = new Entity\GiaodichDAO($em);
        $result  = $giaodich->tinhTrangGiaoDich($makh);
        foreach ($result as $k) {
            $kq.='<tr><td>'.$k['MACN'].'</td><td>'.$k['MAKH'].'</td><td>'.$k['NGAYGD'].'</td><td>'.$k['SOTIENGD'].'</td><td>'.$k['LOAIGD'].'</td></tr>';
        }
        $kq.="</table>";
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
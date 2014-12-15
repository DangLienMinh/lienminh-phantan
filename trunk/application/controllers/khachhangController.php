<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
class KhachhangController extends CI_Controller {
    function index() {
    }
    
    /*public function kiemTra() {
        $em    = $this->doctrine->em;
        $khachhang  = new Entity\KhachhangDAO($em);
        echo $khachhang->layKhachhang('KH1001');
    }
*/
    public function dsKhachHang(){
    	$em      = $this->doctrine->em;
        $user    = new Entity\KhachhangDAO($em);
        $result  = $user->dsKhachhang();
        $ds = "";
        if (count($result) > 0) {
            foreach ($result as $k) {
                $ds .= '<tr><td class="ma">'.$k['makh'].'</td><td class="ten">'.$k['tenkh'].'</td><td class="dc">'.$k['diachi'].'</td><td class="dt">'.$k['dienthoai'].'</td><td class="cmnd">'.$k['cmnd'].'</td><td class="tt">'.$k['tongtien'].'</td><td><a class="suaButton" href="#" rel="'.$k['makh'].'"></a><a href="#" class="xoaButton" rel="'.$k['makh'].'"></a></td></tr>';
            }
        }
        echo $ds;
    }

    public function layTongTien(){
        $makh = $_POST["makh"];
        $em      = $this->doctrine->em;
        $user    = new Entity\KhachhangDAO($em);
        $result  = $user->layKhachhang($makh);
        foreach ($result as $k) {
            echo number_format($k['TONGTIEN'],"0",",",".")." vnđ";
        }
    }

    public function themKhachHang(){
    	$data['tenkh'] = $_POST["tenkh"];
        $data['diachi']  = $_POST["diachi"];
        $data['dienthoai']  = $_POST["dienthoai"];
        $data['cmnd'] = $_POST["cmnd"];
        $data['tongtien']  = $_POST["tongtien"];

        $em      = $this->doctrine->em;
        $user    = new Entity\KhachhangDAO($em);
        $user->themKhachhang($data);
    }

    public function suaKhachHang(){
    	$data['makh'] = $_POST["makh"];
    	$data['tenkh'] = $_POST["tenkh"];
        $data['diachi']  = $_POST["diachi"];
        $data['dienthoai']  = $_POST["dienthoai"];
        $data['cmnd'] = $_POST["cmnd"];
        $data['tongtien']  = $_POST["tongtien"];

        $em      = $this->doctrine->em;
        $user    = new Entity\KhachhangDAO($em);
        $user->suaKhachhang($data);
    }

    public function xoaKhachHang(){
    	$makh= $_POST["makh"];
        $em      = $this->doctrine->em;
        $user    = new Entity\KhachhangDAO($em);
        $user->xoaKhachhang($makh);
    }
    
}
?>
<?php
namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;

class KhachhangDAO
{
    private $em;
    function __construct($em) {
       $this->em=$em;
   }

    public function themKhachhang($data)
    {
        $cnn=$this->em->getConnection();
        $sth = $cnn->prepare("CALL themKhachHang(?,?,?,?,?)");
        $sth->bindValue(1,$data['tenkh']);
        $sth->bindValue(2,$data['diachi']);
        $sth->bindValue(3, $data['dienthoai']);
        $sth->bindValue(4, $data['cmnd']);
        $sth->bindValue(5,$data['tongtien']);
        $sth->execute();
    }

    public function suaKhachhang($data)
    {
        $khachhang = $this->em->getReference('Entity\Khachhang', $data['makh']);
        $khachhang->setTenkh( $data['tenkh']);
        $khachhang->setDiachi( $data['diachi']);
        $khachhang->setDienthoai( $data['dienthoai']);
        $khachhang->setCmnd( $data['cmnd']);
        $khachhang->setTongtien( $data['tongtien']);
        $this->em->merge($khachhang);
        $this->em->flush();
    }

    public function xoaKhachhang($makh)
    {
        $khachhang = $this->em->getReference('Entity\Khachhang', $makh);
        $this->em->remove($khachhang);
        $this->em->flush();
    }

    public function layKhachhang($makh)
    {
        $cn=-1;
        $cnn=$this->em->getConnection();
        $sth = $cnn->prepare("CALL kiemTraCN(?,?)");
        $sth->bindValue(1,$makh);
        $sth->bindParam(2,$cn);
        $sth->execute();
        $result="";
        if($cn==1){
            $sth = $cnn->prepare("SELECT tongtien from khachhang where makh=?");
            $sth->bindValue(1, $makh);
            $sth->execute();
            $result = $sth->fetchAll();
        }else{
            $sth = $cnn->prepare('SELECT tongtien from hien_nh.khachhang@"DBL_CN2" where makh=?');
            $sth->bindValue(1, $makh);
            $sth->execute();
            $result = $sth->fetchAll();
        }
        return $result;
    }

    public function dsKhachhang()
    {
        $query = $this->em->createQuery("SELECT p.makh,p.tenkh,p.diachi,p.dienthoai,p.cmnd,p.tongtien FROM Entity\Khachhang p order by p.makh");
        $result=$query->getResult();
        return $result;
    }
}
?>

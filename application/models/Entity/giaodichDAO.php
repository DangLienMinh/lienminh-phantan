<?php
namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;
class GiaodichDAO
{
    private $em;
    function __construct($em) {
       $this->em=$em;
   }

    public function guiTien($data)
    {
        $kq=-1;
        $cnn=$this->em->getConnection();
        $sth = $cnn->prepare("CALL GuiTien(?,?,?)");
        $sth->bindValue(1,$data['makh']);
        $sth->bindValue(2,$data['sotien']);
        $sth->bindParam(3,$kq);
        $sth->execute();
        return $kq;
    }

    public function tinhTrangGiaoDich($makh)
    {
        $cn=-1;
        $cnn=$this->em->getConnection();
        $sth = $cnn->prepare("CALL kiemTraCN(?,?)");
        $sth->bindValue(1,$makh);
        $sth->bindParam(2,$cn);
        $sth->execute();
        $result="";
        if($cn==1){
            $sth = $cnn->prepare("SELECT macn,makh,sotiengd,to_char(ngaygd, 'dd/mm/yyyy hh:mi:ss am') ngay,loaigd FROM Giaodich where makh=? order by ngaygd DESC");
            $sth->bindValue(1, $makh);
            $sth->execute();
            $result = $sth->fetchAll();
        }else{
            $sth = $cnn->prepare('SELECT macn,makh,sotiengd,to_char(ngaygd, "dd/mm/yyyy hh:mi:ss am") ngay,loaigd FROM hien_nh.Giaodich@"DBL_CN2" where makh=? order by ngaygd DESC');
            $sth->bindValue(1, $makh);
            $sth->execute();
            $result = $sth->fetchAll();
        }
        return $result;

    }

    public function rutTien($data)
    {
        $kq=-1;
        $cnn=$this->em->getConnection();
        $sth = $cnn->prepare("CALL RutTien(?,?,?)");
        $sth->bindValue(1,$data['makh']);
        $sth->bindValue(2,$data['sotien']);
        $sth->bindParam(3,$kq);
        $sth->execute();
        return $kq;
    }

    public function chuyenTien($data)
    {
        $kq=-1;
        $cnn=$this->em->getConnection();
        $sth = $cnn->prepare("CALL ChuyenTien(?,?,?,?)");
        $sth->bindValue(1,$data['makhGui']);
        $sth->bindValue(2,$data['makhNhan']);
        $sth->bindValue(3,$data['sotien']);
        $sth->bindParam(4,$kq);
        $sth->execute();
        return $kq;
    }
}
?>
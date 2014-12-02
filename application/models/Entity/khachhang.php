<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="khachhang")
 */
class Khachhang
{
     /**
     * @Id
     * @Column(type="string")
     */
    protected $makh;

    /**
     * @Column(type="string")
     */
    protected $tenkh;

    /**
     * @Column(type="string")
     */
    protected $diachi;

    /**
     * @Column(type="string")
     */
    protected $dienthoai;

    /**
     * @Column(type="string")
     */
    protected $cmnd;

    /**
     * @Column(type="integer")
     */
    protected $tongtien;
    public function getMakh()
    {
        return $this->makh;
    }
    
    public function setMakh($makh)
    {
        $this->makh = $makh;
        return $this;
    }
    public function getTenkh()
    {
        return $this->tenkh;
    }
    
    public function setTenkh($tenkh)
    {
        $this->tenkh = $tenkh;
        return $this;
    }
    public function getDiachi()
    {
        return $this->diachi;
    }
    
    public function setDiachi($diachi)
    {
        $this->diachi = $diachi;
        return $this;
    }
    public function getDienthoai()
    {
        return $this->dienthoai;
    }
    
    public function setDienthoai($dienthoai)
    {
        $this->dienthoai = $dienthoai;
        return $this;
    }
    public function getCmnd()
    {
        return $this->cmnd;
    }
    
    public function setCmnd($cmnd)
    {
        $this->cmnd = $cmnd;
        return $this;
    }
    public function getTongtien()
    {
        return $this->tongtien;
    }
    
    public function setTongtien($tongtien)
    {
        $this->tongtien = $tongtien;
        return $this;
    }

}
?>
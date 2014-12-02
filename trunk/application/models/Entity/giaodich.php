<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="giaodich")
 */
class Giaodich
{
     /**
     * @Id
     * @ManyToOne(targetEntity="khachhang")
     * @JoinColumn(name="makh", referencedColumnName="makh")
     **/
    protected $makh;

     /**
     * @Id
     * @ManyToOne(targetEntity="chinhanh")
     * @JoinColumn(name="macn", referencedColumnName="macn")
     **/
    protected $macn;

    /**
     * @Column(type="integer")
     */
    protected $sotiengd;

    /**
     * @Column(type="datetime")
     */
    protected $ngaygd;

    /**
     * @Column(type="string")
     */
    protected $loaigd;

    public function getMakh()
    {
        return $this->makh;
    }
    
    public function setMakh($makh)
    {
        $this->makh = $makh;
        return $this;
    }
    public function getMacn()
    {
        return $this->macn;
    }
    
    public function setMacn($macn)
    {
        $this->macn = $macn;
        return $this;
    }
    public function getSotiengd()
    {
        return $this->sotiengd;
    }
    
    public function setSotiengd($sotiengd)
    {
        $this->sotiengd = $sotiengd;
        return $this;
    }
    public function getNgaygd()
    {
        return $this->ngaygd;
    }
    
    public function setNgaygd($ngaygd)
    {
        $this->ngaygd = $ngaygd;
        return $this;
    }
    public function getLoaigd()
    {
        return $this->loaigd;
    }
    
    public function setLoaigd($loaigd)
    {
        $this->loaigd = $loaigd;
        return $this;
    }
	
}
?>
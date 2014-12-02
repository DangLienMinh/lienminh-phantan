<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="chinhanh")
 */
class Chinhanh
{
     /**
     * @Id
     * @Column(type="string", nullable=false)
     */
    protected $macn;

    /**
     * @Column(type="string")
     */
    protected $tencn;

    /**
     * @Column(type="string")
     */
    protected $diachi;

    /**
     * @Column(type="string")
     */
    protected $dienthoai;

    public function getMacn()
    {
        return $this->macn;
    }
    
    public function setMacn($macn)
    {
        $this->macn = $macn;
        return $this;
    }
    public function getTencn()
    {
        return $this->tencn;
    }
    
    public function setTencn($tencn)
    {
        $this->tencn = $tencn;
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



}
?>
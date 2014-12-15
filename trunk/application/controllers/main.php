<?php

class Main extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	/*function guiTien()
	{
		$this->smarty->view('guiTien');
	}

	function khachHang()
	{
		$this->smarty->view('QLKhachHang');
	}*/

	function guiTien()
	{
		$this->smarty->assign('guiTien',site_url('main/guiTien'));
		$this->smarty->assign('khachHang',site_url('main/khachHang'));
		$this->smarty->view('index');
	}
	function khachHang()
	{
		$this->smarty->assign('guiTien',site_url('main/guiTien'));
		$this->smarty->assign('khachHang',site_url('main/khachHang'));
		$this->smarty->view('manageCustomer');
	}

	
}
?>
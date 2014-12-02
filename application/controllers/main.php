<?php

class Main extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	function guiTien()
	{
		$this->smarty->view('guiTien');
	}

	function khachHang()
	{
		$this->smarty->view('QLKhachHang');
	}

	
}
?>
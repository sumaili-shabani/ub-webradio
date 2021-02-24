<?php 
defined('BASEPATH') OR exit('No direct script access allowed');  
class language  extends CI_controller
{

	function french(){
		$this->session->unset_userdata("lang");
		$this->session->set_userdata("lang", "french");
		redirect(base_url(),'refresh');
	}

	function english(){
		$this->session->unset_userdata("lang");
		$this->session->set_userdata("lang", "english");
		redirect(base_url(),'refresh');
	}
}



 ?>
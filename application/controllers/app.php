<?php  
	class app extends CI_Controller{

		function index(){
			$this->template->load('template_user','user/index');
		}
		function news(){
			$this->template->load('template_user','user/news');
		}
		function recomend(){
			$this->template->load('template_user','user/recomend');
		}
	}

?>
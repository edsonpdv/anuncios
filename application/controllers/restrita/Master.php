<?php
/*    
|---------------------------------------------------------------------------
|   Controller responsavel por gerenciar a categorias principais (Master)
|---------------------------------------------------------------------------
*/

defined('BASEPATH') or exit('Ops! Ação não permitida, consulte o administrador.');

class Master extends CI_Controller{

	public function __construct()
	{
		parent::__construct();


		//definir se há uma sessão valida 



		//definir se o usuario é admin
	}

	public function index()	{

		$data = array(

			'titulo' => 'Categorias Principais Cadastradas',

			'styles' => array(
				'assets/plugins/datatables/css/jquery.datatables.min.css',
				'assets/plugins/datatables/css/jquery.datatables_themeroller.css',
				'assets/plugins/bootstrap-datepicker/css/datepicker3.css',
				'assets/plugins/offcanvasmenueffects/js/snap.svg-min.js',
				'assets/plugins/datatables/css/jquery.datatables.min.css',
				'assets/plugins/datatables/css/jquery.datatables_themeroller.css',
				'assets/plugins/bootstrap-datepicker/css/datepicker3.css',
				'assets/plugins/offcanvasmenueffects/js/snap.svg-min.js',
			),

			'scripts' => array(
				'assets/plugins/datatables/js/jquery.datatables.min.js',
				'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
				'assets/js/pages/table-data.js',
				'assets/plugins/summernote-master/summernote.min.js',
				'assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js',
				'assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js',
				'assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
			),

			'masters' => $this->core_model->get_all('categorias_pai'),


		);

		//echo '<pre>';
		//print_r($data['masters']);
		//exit();

		$this->load->view('restrita/layout/header', $data);
		$this->load->view('restrita/master/index');
		$this->load->view('restrita/layout/footer');
	}
}	

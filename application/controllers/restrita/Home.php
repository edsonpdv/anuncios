<?php
    
//Controller responsavel pela Home da pagina restrita o projeto
 
defined('BASEPATH') OR exit('Ação não permitida');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();


        //definir se há uma sessão valida 



        //definir se o usuario é admin
    }

    public function index() {
		
        $this->load->view('restrita/layout/header');
        $this->load->view('restrita/home/index');
        $this->load->view('restrita/layout/footer');
	}

}







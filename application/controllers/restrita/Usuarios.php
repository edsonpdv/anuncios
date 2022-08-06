<?php
/*    
|----------------------------------------------------------------------
|   Controller responsavel pela página de usuários
|----------------------------------------------------------------------
*/

defined('BASEPATH') or exit('Ops! Ação não permitida, consulte o administrador.');

class Usuarios extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();


		//definir se há uma sessão valida 



		//definir se o usuario é admin
	}

	public function index()
	{

		$data = array(

			'titulo' => 'Usuários Cadastrados',

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

			'usuarios' => $this->ion_auth->users()->result(),


		);

		//echo '<pre>';
		//print_r($data);
		//exit;

		$this->load->view('restrita/layout/header', $data);
		$this->load->view('restrita/usuarios/index');
		$this->load->view('restrita/layout/footer');
	}



	public function core($usuario_id = null)
	{

		//Esse metdo será responsável pela edição e criação de usuarios

		$usuario_id = (int) $usuario_id;

		if (!$usuario_id) {

			//cadastra um novo usuario 

			$this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[3]|max_length[40]');
			$this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[3]|max_length[40]');
			$this->form_validation->set_rules('user_cpf', 'CPF', 'trim|required|exact_length[14]|callback_valida_cpf');
			$this->form_validation->set_rules('phone', 'Telefone', 'trim|required|min_length[14]|max_length[15]|callback_valida_telefone');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[150]|callback_valida_email');
			$this->form_validation->set_rules('user_cep', 'CEP', 'trim|required|exact_length[9]');
			$this->form_validation->set_rules('user_endereco', 'Endereço', 'trim|required|max_length[45]');
			$this->form_validation->set_rules('user_numero_endereco', 'Número', 'trim|max_length[45]');
			$this->form_validation->set_rules('user_bairro', 'Bairro', 'trim|required|min_length[2]|max_length[45]');
			$this->form_validation->set_rules('user_cidade', 'Cidade', 'trim|required|min_length[2]|max_length[45]');
			$this->form_validation->set_rules('user_uf', 'Estado', 'trim|required|exact_length[2]');
			$this->form_validation->set_rules('user_foto', 'Avatar', 'trim|required');
			$this->form_validation->set_rules('password', 'Senha', 'trim|min_length[6]|max_length[200]');
			$this->form_validation->set_rules('confirma_senha', 'Confirmar Senha', 'trim|matches[password]');


			if ($this->form_validation->run()) {

				//echo '<pre>';
				//print_r($this->input->post());
				//exit();

				// Sucesso... formulário foi validado... damos sequencia
				

				$username = $this->input->post('first_name') . '-' . $this->input->post('last_name');
    			$password = $this->input->post('password');
    			$email = $this->input->post('email');

				$additional_data = elements(
					array(
						'first_name',
						'last_name',
						'user_cpf',
						'phone',
						'user_cep',
						'user_endereco',
						'user_numero_endereco',
						'user_bairro',
						'user_cidade',
						'user_uf',
						'active',
						'user_foto',
					),	$this->input->post()
				);

    			
   			 	$group = array($this->input->post('perfil')); // Sets user to admin.

    			if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
					$this->session->set_flashdata('sucesso', 'Usuário criado com sucesso');
				} else {

					$this->session->set_flashdata('erro', $this->ion_auth->errors());
				}

				redirect('restrita/' . $this->router->fetch_class());
			} else {

				//Erro de validação

				$data = array(

					'titulo' => 'Cadastrar Usuário',
					'scripts' => array(
						'assets/mask/jquery.mask.min.js',
						'assets/mask/custom.js',
						'assets/js/usuarios.js',
					),

					'subtitulo' => 'Cadastrando Usuários',
					'grupos' => $this->ion_auth->groups()->result(),

				);



				$this->load->view('restrita/layout/header', $data);
				$this->load->view('restrita/usuarios/core');
				$this->load->view('restrita/layout/footer');
			}
		} else {

			//verifica se o usuario_id existe no banco de dados 

			if (!$usuario = $this->ion_auth->user($usuario_id)->row()) {
				$this->session->set_flashdata('erro', 'Usuário não foi encontrado');
				redirect('restrita/' . $this->router->fetch_class());
			} else {

				// Maravilha... usuario encontrado... agora passamos para as validações 

				$this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[3]|max_length[40]');
				$this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[3]|max_length[40]');
				$this->form_validation->set_rules('user_cpf', 'CPF', 'trim|required|exact_length[14]|callback_valida_cpf');
				$this->form_validation->set_rules('phone', 'Telefone', 'trim|required|min_length[14]|max_length[15]|callback_valida_telefone');
				$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[150]|callback_valida_email');
				$this->form_validation->set_rules('user_cep', 'CEP', 'trim|required|exact_length[9]');
				$this->form_validation->set_rules('user_endereco', 'Endereço', 'trim|required|max_length[45]');
				$this->form_validation->set_rules('user_numero_endereco', 'Número', 'trim|max_length[45]');
				$this->form_validation->set_rules('user_bairro', 'Bairro', 'trim|required|min_length[2]|max_length[45]');
				$this->form_validation->set_rules('user_cidade', 'Cidade', 'trim|required|min_length[2]|max_length[45]');
				$this->form_validation->set_rules('user_uf', 'Estado', 'trim|required|exact_length[2]');
				$this->form_validation->set_rules('user_foto', 'Avatar', 'trim|required');
				$this->form_validation->set_rules('password', 'Senha', 'trim|min_length[6]|max_length[200]');
				$this->form_validation->set_rules('confirma_senha', 'Confirmar Senha', 'trim|matches[password]');


				if ($this->form_validation->run()) {


					// Sucesso... formulário foi validado... damos sequencia

					$data = elements(
						array(
							'first_name',
							'last_name',
							'password',
							'user_cpf',
							'phone',
							'email',
							'user_cep',
							'user_endereco',
							'user_numero_endereco',
							'user_bairro',
							'user_cidade',
							'user_uf',
							'active',
							'user_foto',
						),
						$this->input->post()
					);

					//removo do array $data o password caso o mesmo não seja informado, pois não é obrigatório 

					if (!$data['password']) {
						unset($data['password']);
					}

					//echo '<pre>';
					//print_r($data);
					//exit();

					//populamos o id com o ID d objeto (é mais seguro)

					$id = $usuario->id;

					if ($this->ion_auth->update($id, $data)) {

						$perfil = (int) $this->input->post('perfil'); //atualizamos o grupo de acesso do usuário
						$this->ion_auth->remove_from_group(NULL, $id);
						$this->ion_auth->add_to_group($perfil, $id);

						$this->session->set_flashdata('sucesso', 'Usuário atualizado o sucesso');
					} else {
						$this->session->set_flashdata('erro', $this->ion_auth->errors());
					}

					redirect('restrita/' . $this->router->fetch_class());
				} else {

					//Erro de validação

					$data = array(

						'titulo' => 'Editando Usuário',
						'scripts' => array(
							'assets/mask/jquery.mask.min.js',
							'assets/mask/custom.js',
							'assets/js/usuarios.js',
						),

						'subtitulo' => 'Dados dos Usuários',
						'usuario' => $usuario,
						'perfil' => $this->ion_auth->get_users_groups($usuario->id)->row(),
						'grupos' => $this->ion_auth->groups()->result(),

					);



					$this->load->view('restrita/layout/header', $data);
					$this->load->view('restrita/usuarios/core');
					$this->load->view('restrita/layout/footer');
				}
			}
		}
	}

	public function valida_cpf($cpf)
	{

		if ($this->input->post('usuario_id')) { //editando usuario

			$usuario_id = $this->input->post('usuario_id');

			if ($this->core_model->get_by_id('users', array('id !=' => $usuario_id, 'user_cpf' => $cpf))) {
				$this->form_validation->set_message('valida_cpf', 'O campo {field} já existe, ele deve ser único');
				return FALSE;
			}
		} else { //cadastrando usuario
			if ($this->core_model->get_by_id('users', array('user_cpf' => $cpf))) {
				$this->form_validation->set_message('valida_cpf', 'O campo {field} já existe, ele deve ser único');
				return FALSE;
			}
		}

		$cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
		// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
		if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {

			$this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
			return FALSE;
		} else {
			// Calcula os números para verificar se o CPF é verdadeiro
			for ($t = 9; $t < 11; $t++) {
				for ($d = 0, $c = 0; $c < $t; $c++) {
					$d += $cpf[$c] * (($t + 1) - $c); //Se PHP version < 7.4, $cpf{$c}
				}
				$d = ((10 * $d) % 11) % 10;
				if ($cpf[$c] != $d) { //Se PHP version < 7.4, $cpf{$c}
					$this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
					return FALSE;
				}
			}
			return TRUE;
		}
	}

	public function valida_telefone($phone)
	{

		$usuario_id = $this->input->post('usuario_id');
		if (!$usuario_id) {
			# Cadastrando 
			if ($this->core_model->get_by_id('users', array('phone' => $phone))) {
				$this->form_validation->set_message('valida_telefone', 'Este telefone já existe');
				return false;
			} else {
				return true;
			}
		} else {
			# Editando
			if ($this->core_model->get_by_id('users', array('phone' => $phone, 'id !=' => $usuario_id))) {
				$this->form_validation->set_message('valida_telefone', 'Este telefone já existe');
				return false;
			} else {
				return true;
			}
		}
	}

	public function valida_email($email)
	{

		$usuario_id = $this->input->post('usuario_id');
		if (!$usuario_id) {
			# Cadastrando 
			if ($this->core_model->get_by_id('users', array('email' => $email))) {
				$this->form_validation->set_message('valida_email', 'Este E-mail já existe');
				return false;
			} else {
				return true;
			}
		} else {
			# Editando
			if ($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))) {
				$this->form_validation->set_message('valida_email', 'Este E-mail já existe');
				return false;
			} else {
				return true;
			}
		}
	}

	public function preenche_endereco()
	{

		if (!$this->input->is_ajax_request()) {
			exit('Ops! Você não permição para acessar essa página.');
		}

		$this->form_validation->set_rules('user_cep', 'CEP', 'trim|required|exact_length[9]');

		$retorno = array(); //retornará os dados para o jascript usuarios.js


		if ($this->form_validation->run()) {
			//cep validado quanto ao seu formato o próximo passo é fazer a requisição

			$cep = str_replace("-", "", $this->input->post('user_cep'));

			$url = "https://viacep.com.br/ws/";
			$url .= $cep;
			$url .= "/json/";

			$cr = curl_init();
			curl_setopt($cr, CURLOPT_URL, $url);
			curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
			$resultado_requisicao = curl_exec($cr);
			curl_close($cr);

			//transformando o resultado em objeto para facilitar o acesso aos seus atributos

			$resultado_requisicao = json_decode($resultado_requisicao);

			//verificamos se o CEP informad existe caso contrario retornamos para o js que o CEP é inválido

			if (isset($resultado_requisicao->erro)) {
				$retorno['erro'] = 3;
				$retorno['user_cep'] = 'Informe um CEP válido';
				$retorno['mensagem'] = 'Informe um CEP válido';
			} else {
				//Sucesso na requisição CEP existe na base do via CEP
				$retorno['erro'] = 0;
				$retorno['user_endereco'] = $resultado_requisicao->logradouro;
				$retorno['user_bairro'] = $resultado_requisicao->bairro;
				$retorno['user_cidade'] = $resultado_requisicao->localidade;
				$retorno['user_uf'] = $resultado_requisicao->uf;
				$retorno['mensagem'] = 'CEP encontrado';
			}
		} else {

			$retorno['erro'] = 3;
			$retorno['user_cep'] = form_error('user_cep', '<div class="text-danger">', '</div>');
			$retorno['mensagem'] = validation_errors();
		}

		//retorno os dados contido no $retorno
		echo json_encode($retorno);
	}

	public function upload_file()
	{
		$config['upload_path'] = './uploads/usuarios/';
		$config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JPEG';
		$config['encrypt_name'] = true;
		$config['max_size'] = 1024;
		$config['max_width'] = 512;
		$config['max_height'] = 500;
		$config['min_width'] = 350;
		$config['min_height'] = 340;

		$this->load->library('upload', $config); //Carregando a biblioteca upload e passando como parâmetro o config

		if ($this->upload->do_upload('user_foto_file')) {
			$data = array(
				'erro' => 0,
				'foto_enviada' => $this->upload->data(),
				'user_foto' => $this->upload->data('file_name'),
				'mensagem' => 'Foto enviada com sucesso!',
			);

			//Fazendo um resize da foto
			$config['image_library']  = 'gd2';
			$config['source_image'] = './uploads/usuarios/' . $this->upload->data('file_name');
			$config['new_image'] = './uploads/usuarios/small/' . $this->upload->data('file_name');
			$config['width'] = 300;
			$config['height'] = 280;

			$this->load->library('image_lib', $config);

			if (!$this->image_lib->resize()) {
				$data['erro'] = 3;
				$data['mensagem'] = $this->image_lib->display_errors('<span class="text-danger">', '</span>');
			}
		} else {
			//Erros no upload da imagem 
			$data = array(
				'erro' => 3,
				'mensagem' => $this->upload->display_errors('<span class="text-danger">', '</span>'),
			);
		}
		echo json_encode($data);
	}

	public function delete($usuario_id = NULL) {

		$usuario_id = (int) $usuario_id;

		if (!$usuario_id || !$usuario = $this->ion_auth->user($usuario_id)->row()) {
			$this->session->set_flashdata('erro', 'Usuário não foi encontrado');
			redirect('restrita/' . $this->router->fetch_class());
		} 

		if ($this->ion_auth->is_admin($usuario->id)) {
			$this->session->set_flashdata('erro', 'Não é permitido excluir um administrador');
			redirect('restrita/' . $this->router->fetch_class());
		} 

		if ($this->ion_auth->delete_user($usuario->id)) {
			
			//Maravilha... excluimos o usuario... Agora passamos para a exclusão das imagens do mesmo diretorio uploads/usuarios/small

			$user_foto = $usuario->user_foto; //Recuperamos o nome da imagem 

			$imagem_grande = FCPATH . 'uploads/usuarios/' . $user_foto;
			$imagem_pequena = FCPATH . 'uploads/usuarios/small/' . $user_foto;

			if(file_exists($imagem_grande)) {
				unlink($imagem_grande);
			}

			if(file_exists($imagem_pequena)) {
				unlink($imagem_pequena);
			}

			$this->session->set_flashdata('sucesso', 'Usuário excluído com sucesso!');

		} else {

			//Não foi possivel excluir

			$this->session->set_flashdata('erro', $this->ion_auth->errors());

		}

		redirect('restrita/' . $this->router->fetch_class());
	}
}

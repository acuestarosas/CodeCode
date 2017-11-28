<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

/* -------------------------------- REGISTRO -------------------------------- */
	public function index(){
		$this->load->model("main_model");
		$data["fetch_data"] = $this->main_model->fetch_data();
		$this->load->view("main_view", $data);
	}

	public function form_validation() {
	//echo 'OK';
	$this->load->library('form_validation');
	$this->form_validation->set_rules("first_name", "First Name", 'required|alpha');
	$this->form_validation->set_rules("last_name", "Last Name", 'required|alpha');

	if($this->form_validation->run() ) {
		//true
		$this->load->model("main_model");
		$data = array( "first_name"	=>$this->input->post("first_name"), "last_name"		=>$this->input->post("last_name"), "telefono"=>$this->input->post("telefono"), "email"=>$this->input->post("email") 	);
		if($this->input->post("update")){
			$this->main_model->update_data($data, $this->input->post("hidden_id"));
			redirect(base_url() . "main/updated");
		}

		if($this->input->post("insert")) {
			$this->main_model->insert_data($data);
			redirect(base_url() . "main/inserted");
		}

	}

	else {
		//false
		$this->index();
	}
}

	public function inserted() {
		$this->index();
	}

	public function delete_data() {
		$id = $this->uri->segment(3);
		$this->load->model("main_model");
		$this->main_model->delete_data($id);
		redirect(base_url() . "main/enter");
	}

	public function deleted() {
		$this->index();
	}

	public function update_data(){
		$user_id = $this->uri->segment(3);
		$this->load->model("main_model");
		$data["user_data"] = $this->main_model->fetch_single_data($user_id);
		$data["fetch_data"] = $this->main_model->fetch_data();
		$this->load->view("main_view", $data);
	}

	public function updated() {
		$this->index();
	}


/* -------------------------------- LOGIN -------------------------------- */
	function login() {
		$this->load->view("login_view");
	}

	function login_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'NICKNAME', 'required');
		$this->form_validation->set_rules('password', 'CONTRASEÑA', 'required');

		if($this->form_validation->run() )
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('main_model');
			if($this->main_model->can_login($username, $password))
			{
				$session_data = array(
					'username'	=>	$username
				);
				$this->session->set_userdata($session_data);
				redirect(base_url() . 'main/enter');
			}
			else
			{
				$this->session->set_flashdata('error', 'El usuario y/0 contraseña son incorrectos.');
				redirect(base_url() . 'main/login');
			}
		}
		else
		{
			$this->login();
		}
	}


/* -------------------------------- LOGIN - VISTA DE ADMINISTRADOR -------------------------------- */
	function enter(){
/* ----------------- TABLA ----------------- */
		$this->load->model("main_model");
		$data["fetch_data"] = $this->main_model->fetch_data();
		$this->load->view("login_admin", $data);

/* -----------------  ----------------- */
		if($this->session->userdata('username') != '')
		{
			echo '<h1><small>Eres el Administrador:</small> <label class="text-primary" >'.$this->session->userdata('username').'</label></h1>';
			//echo '<center><button type="button" class="btn"> <a href="'.base_url().'main/logout"> Salir de Administrador </a></button>	';
			//echo '<button type="button" class="btn "> <a href="'.base_url().'main/image_upload"> Agregar Imagen </a></button></center>';

		}
		else
		{
			redirect(base_url() . 'main/login');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('username');
		redirect(base_url() . 'main/login');
	}


/* -------------------------------- SUBIR ARCHIVO -------------------------------- */
function image_upload()
	{
		$data['title'] = "Upload Image using Ajax JQuery in CodeIgniter";
		$this->load->view('image_upload', $data);
	}

	function ajax_upload()
	{
		if(isset($_FILES["image_file"]["name"]))
		{
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('image_file'))
			{
				echo $this->upload->display_errors();
				echo "string";
			}
			else
			{
				$data = $this->upload->data();
				echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
			}
		}
	}

/* -------------------------------- --------------------------- -------------------------------- */
}

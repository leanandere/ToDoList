<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		redirect("auth/login");
	}
	
	public function login(){
		$datos=array();
		$this->load->library('form_validation');

		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE){
            if($this->input->post()){
				$datos["OP"]="MAL";
			}
        }else{
			$this->load->model("usuarios_model");
			
			//recuperar del form
			$usuario=set_value("usuario"); //metodo form_validation (preferido)
			$password=$this->input->post("password"); //metodo input

			if($usuario_id=$this->usuarios_model->verificar($usuario,$password)){
				$u=$this->usuarios_model->obtener($usuario_id);

				$this->session->set_userdata("uid",$u["usuario_id"]);
				$this->session->set_userdata("usuario",$u["usuario"]);

				redirect("notas/principal"); 
			}else{
				//usuario incorrecto
				$datos["OP"]="INCORRECTO";
			}
                       
        }
		$this->load->view('login',$datos);
		
	}

	public function salir(){
		$this->session->sess_destroy();
		redirect("auth");
	}
}

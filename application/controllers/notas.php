<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notas extends CI_Controller {

	var $datos=array();
	
	public function __construct(){
		parent::__construct();		

		if(!$this->session->userdata("uid")){
			redirect("auth");
		}

		$this->datos["usuario_logueado"]=$this->session->userdata("usuario");

		$this->load->model("notas_model");

		$this->load->library("form_validation");

		$this->form_validation->set_rules("titulo","El titulo de la tarea","required");
		$this->form_validation->set_rules("contenido","La descripción","required");

		if($this->form_validation->run()===false){
			 //alguno error en campo
		}else{
			$titulo=set_value("titulo");
			$contenido=set_value("contenido");
			$this->notas_model->nueva($this->session->userdata("uid"),$titulo,$contenido);
			redirect("notas");
		}

	}

	public function eliminar($nota_id="")
	{
		$this->load->model("notas_model");
		$this->notas_model->borrar($nota_id);
		redirect("notas");
		
	}

	public function tachar($nota_id="")
	{
		$this->load->model("notas_model");
		$this->notas_model->tachar($nota_id);
		redirect("notas");
	}

	public function destachar($nota_id="")
	{
		$this->load->model("notas_model");
		$this->notas_model->destachar($nota_id);
		redirect("notas");
	}
	
	public function index()
	{
		redirect("notas/principal");
	}
	
	public function principal(){
		
		$this->datos["notas"]=$this->notas_model->listar();

		$this->load->view('notas/principal',$this->datos);
	} 



}

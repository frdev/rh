<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		$this->load->view('login');
	}

	public function signin(){
		$post    = $this->input->post();
		$usuario = $this->db->where('usuario', $post['usuario'])->where('senha', md5($post['senha']))->get('admin')->row_array();
		if(!empty($usuario)){
			$this->session->set_userdata('logado', ['id' => $usuario['id'], 'usuario' => $usuario['usuario']]);
			echo TRUE;
		} else {
			echo FALSE;
		}
	}

	public function signout(){
		$this->session->unset_userdata('logado');
		$this->session->sess_destroy();
		redirect(base_url());
	}

}

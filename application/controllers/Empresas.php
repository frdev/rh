<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('empresas_model');
    }

    public function index(){
        $dados['controller'] = $this->uri->segment(1);
        if(!empty($this->input->get())){
            $dados['filtros']['tipo']   = $this->input->get('tipo');
            $dados['filtros']['filtro'] = $this->input->get('filtro');
        } else {
            $dados['filtros'] = [];
        }
        $this->load->library('pagination');
        $limit_per_page      = 10;
        $start_index         = ($this->uri->segment(2)) ? ($this->uri->segment(2)-1) * $limit_per_page : 0;
        $total_records       = $this->empresas_model->getCountEmpresas($dados['filtros']);
        if($total_records > 0){
            $dados['empresas']            = $this->empresas_model->getEmpresas($dados['filtros'], $limit_per_page, $start_index);
            $config['base_url']           = base_url('empresas');
            $config['total_rows']         = $total_records;
            $config['per_page']           = $limit_per_page;
            $config["uri_segment"]        = 2;
            $config['num_links']          = 3;
            $config['use_page_numbers']   = TRUE;
            $config['reuse_query_string'] = TRUE;
            $config['first_link']         = '<<';
            $config['prev_link']          = '<';
            $config['next_link']          = '>';
            $config['last_link']          = '>>';
            $config['first_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['first_tag_close']    = '</span></li>';
            $config['last_tag_open']      = '<li class="page-item"><span class="page-link">';
            $config['last_tag_close']     = '</span></li>';
            $config['next_tag_open']      = '<li class="page-item"><span class="page-link">';
            $config['next_tag_close']     = '</span></li>';
            $config['prev_tag_open']      = '<li class="page-item"><span class="page-link">';
            $config['prev_tag_close']     = '</span></li>';
            $config['cur_tag_open']       = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']      = '</span></li>';
            $config['num_tag_open']       = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']      = '</span></li>';
            $this->pagination->initialize($config);
            $dados['links'] = $this->pagination->create_links();
        }
        $this->load->view('empresas', $dados);
    }

    public function getEmpresa(){
        $post = $this->input->post();
        echo json_encode($this->empresas_model->getEmpresa($post['id']));
    }

    public function save(){
        $post    = $this->input->post();
        $retorno = $this->empresas_model->save($post);
        echo json_encode($retorno);
    }

    public function deletar(){
        $this->db->where('id', $this->input->post('id'))->delete('empresas');
    }

}

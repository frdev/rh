<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getCountFuncionarios($filtros){
        if(!empty($filtros)){
            switch($filtros['tipo']){
                case 'empresa':
                    $this->db->like('e.rsocial', $filtros['filtro']);
                    break;
                case 'nome':
                    $this->db->like('f.nome', $filtros['filtro']);
                    break;
                case 'cpf':
                    $this->db->like('f.cpf', $filtros['filtro']);
                    break;
                case 'rg':
                    $this->db->like('f.rg', $filtros['filtro']);
                    break;                
            }
        }
        return $this->db->select('COUNT(id) qtd')->get('funcionarios')->row_array()['qtd'];
    }

    public function getFuncionarios($filtros, $limit, $offset){
        if(!empty($filtros)){
            switch($filtros['tipo']){
                case 'empresa':
                    $this->db->like('e.rsocial', $filtros['filtro']);
                    break;
                case 'nome':
                    $this->db->like('f.nome', $filtros['filtro']);
                    break;
                case 'cpf':
                    $this->db->like('f.cpf', $filtros['filtro']);
                    break;
                case 'rg':
                    $this->db->like('f.rg', $filtros['filtro']);
                    break;                
            }
        }
        return $this->db->select('f.*, e.fantasia empresa')
            ->join('empresas e', 'e.id = f.empresa_id')
            ->order_by('f.nome', 'ASC')->limit($limit, $offset)->get('funcionarios f')->result_array();
    }

    public function getAll(){
        return $this->db->select('f.*, e.fantasia empresa')
        ->join('empresas e', 'e.id = f.empresa_id')
        ->order_by('f.nome', 'ASC')->get('funcionarios f')->result_array();
    }

    public function getFuncionario($id){
        return $this->db->where('id', $id)->get('funcionarios')->row_array();
    }

    public function save($funcionario){
        try{
            $f = $funcionario;
            if(!empty($funcionario['id'])){
                $this->db->where('id !=', $funcionario['id']);
            }
            $existe = $this->db->like('cpf', $funcionario['cpf'], 'none')->get('funcionarios')->row_array();
            if(empty($existe)){
                unset($f['id']);
                $f['salario'] = str_replace('.', '',  $f['salario']);
                $f['salario'] = str_replace(',', '.', $f['salario']);
                $f['vr']      = str_replace('.', '',  $f['vr']);
                $f['vr']      = str_replace(',', '.', $f['vr']);
                $f['vt']      = str_replace('.', '',  $f['vt']);
                $f['vt']      = str_replace(',', '.', $f['vt']);
                if(!empty($funcionario['id'])){
                    $this->db->where('id', $funcionario['id'])->update('funcionarios', $f);
                    $retorno['sucesso']  = TRUE;
                    $retorno['mensagem'] = 'Funcionário atualizada.';
                } else {
                    $this->db->insert('funcionarios', $f);
                    $retorno['sucesso']  = TRUE;
                    $retorno['mensagem'] = 'Funcionário inserida.';
                }
            } else {
                $retorno['sucesso']  = FALSE;
                $retorno['mensagem'] = 'Funcionário já existente com esses dados.';
            }
            return $retorno;
        } catch (Exception $e){
            $retorno['sucesso']  = FALSE;
            $retorno['mensagem'] = 'Erro ao realizar ação.';
            return $retorno;
        }
    }

}

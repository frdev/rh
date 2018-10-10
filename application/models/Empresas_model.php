<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getCountEmpresas($filtros){
        if(!empty($filtros)){
            $this->db->like($filtros['tipo'], $filtros['filtro']);
        }
        return $this->db->select('COUNT(id) qtd')->get('empresas')->row_array()['qtd'];
    }

    public function getEmpresas($filtros, $limit, $offset){
        if(!empty($filtros)){
            $this->db->like($filtros['tipo'], $filtros['filtro']);
        }
        return $this->db->order_by('rsocial', 'ASC')->limit($limit, $offset)->get('empresas')->result_array();
    }

    public function getEmpresa($id){
        return $this->db->where('id', $id)->get('empresas')->row_array();
    }

    public function getAll(){
        return $this->db->order_by('rsocial', 'ASC')->get('empresas')->result_array();
    }

    public function save($empresa){
        try{
            $e = ['rsocial' => $empresa['rsocial'], 'fantasia' => $empresa['fantasia'], 'cnpj' => $empresa['cnpj']];
            if(!empty($empresa['id'])){
                $this->db->where('id !=', $empresa['id']);
            }
            $existe = $this->db->like('cnpj', $empresa['cnpj'], 'none')->get('empresas')->row_array();
            if(empty($existe)){
                if(!empty($empresa['id'])){
                    $this->db->where('id', $empresa['id'])->update('empresas', $e);
                    $retorno['sucesso']  = TRUE;
                    $retorno['mensagem'] = 'Empresa atualizada.';
                } else {
                    $this->db->insert('empresas', $e);
                    $retorno['sucesso']  = TRUE;
                    $retorno['mensagem'] = 'Empresa inserida.';
                }
            } else {
                $retorno['sucesso']  = FALSE;
                $retorno['mensagem'] = 'Empresa já existente com esses dados.';
            }
            return $retorno;
        } catch (Exception $e){
            $retorno['sucesso']  = FALSE;
            $retorno['mensagem'] = 'Erro ao realizar ação.';
            return $retorno;
        }
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class Funcionarios extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('empresas_model');
        $this->load->model('funcionarios_model');
    }

    public function index(){
        $dados['controller'] = $this->uri->segment(1);
        $dados['empresas']   = $this->empresas_model->getAll();
        if(!empty($this->input->get())){
            $dados['filtros']['tipo']   = $this->input->get('tipo');
            $dados['filtros']['filtro'] = $this->input->get('filtro');
        } else {
            $dados['filtros'] = [];
        }
        $this->load->library('pagination');
        $limit_per_page = 10;
        $start_index    = ($this->uri->segment(2)) ? ($this->uri->segment(2)-1) * $limit_per_page : 0;
        $total_records  = $this->funcionarios_model->getCountFuncionarios($dados['filtros']);
        if($total_records > 0){
            $dados['funcionarios']        = $this->funcionarios_model->getFuncionarios($dados['filtros'], $limit_per_page, $start_index);
            $config['base_url']           = base_url('funcionarios');
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
        $this->load->view('funcionarios', $dados);
    }

    public function getFuncionario(){
        $post                   = $this->input->post();
        $funcionario            = $this->funcionarios_model->getFuncionario($post['id']);
        $funcionario['salario'] = toReal($funcionario['salario']);
        $funcionario['vt']      = toReal($funcionario['vt']);
        $funcionario['vr']      = toReal($funcionario['vr']);
        echo json_encode($funcionario);
    }

    public function save(){
        $post    = $this->input->post();
        $retorno = $this->funcionarios_model->save($post);
        echo json_encode($retorno);
    }

    public function deletar(){
        $this->db->where('id', $this->input->post('id'))->delete('funcionarios');
    }

    public function exportar(){
        # Inicializa os objetos
        $spreadsheet  = new Spreadsheet();
        $excel_writer = new Xls($spreadsheet);
        # Seta a sheet inicial
        $activeSheet  = $spreadsheet->getActiveSheet();
        # Listagem dos Afiliados
        $funcionarios = $this->funcionarios_model->getAll();
        # Define o cabeçalho do arquivo
        $activeSheet->setCellValue('A1' , 'Empresa')->getStyle('A1')->getFont()->setBold(true);
        $activeSheet->setCellValue('B1' , 'Função')->getStyle('B1')->getFont()->setBold(true);
        $activeSheet->setCellValue('C1' , 'Sexo')->getStyle('C1')->getFont()->setBold(true);
        $activeSheet->setCellValue('D1' , 'Nome')->getStyle('D1')->getFont()->setBold(true);
        $activeSheet->setCellValue('E1' , 'CPF')->getStyle('E1')->getFont()->setBold(true);
        $activeSheet->setCellValue('F1' , 'RG')->getStyle('F1')->getFont()->setBold(true);
        $activeSheet->setCellValue('G1' , 'E-mail')->getStyle('G1')->getFont()->setBold(true);
        $activeSheet->setCellValue('H1' , 'Celular')->getStyle('H1')->getFont()->setBold(true);
        $activeSheet->setCellValue('I1' , 'Residencia')->getStyle('I1')->getFont()->setBold(true);
        $activeSheet->setCellValue('J1' , 'Logradouro')->getStyle('J1')->getFont()->setBold(true);
        $activeSheet->setCellValue('K1' , 'Número')->getStyle('K1')->getFont()->setBold(true);
        $activeSheet->setCellValue('L1' , 'Complemento')->getStyle('L1')->getFont()->setBold(true);
        $activeSheet->setCellValue('M1' , 'CEP')->getStyle('M1')->getFont()->setBold(true);
        $activeSheet->setCellValue('N1' , 'Cidade')->getStyle('N1')->getFont()->setBold(true);
        $activeSheet->setCellValue('O1' , 'Estado')->getStyle('O1')->getFont()->setBold(true);
        $activeSheet->setCellValue('P1' , 'Salário')->getStyle('P1')->getFont()->setBold(true);
        $activeSheet->setCellValue('Q1' , 'VR')->getStyle('Q1')->getFont()->setBold(true);
        $activeSheet->setCellValue('R1' , 'VT')->getStyle('R1')->getFont()->setBold(true);
        $activeSheet->setCellValue('S1' , 'Admissão')->getStyle('S1')->getFont()->setBold(true);
        $activeSheet->setCellValue('T1' , 'Demissão')->getStyle('T1')->getFont()->setBold(true);
        foreach($funcionarios as $key => $funcionario) { 
            $chave = $key+2;
            $activeSheet->setCellValue("A".$chave , $funcionario['empresa']);
            $activeSheet->setCellValue("B".$chave , $funcionario['funcao']);
            $activeSheet->setCellValue("C".$chave , $funcionario['sexo'] == 0 ? 'Masculino' : 'Feminino');
            $activeSheet->setCellValue("D".$chave , $funcionario['nome']);
            $activeSheet->setCellValue("E".$chave , $funcionario['cpf']);
            $activeSheet->setCellValue("F".$chave , $funcionario['rg']);
            $activeSheet->setCellValue("G".$chave , $funcionario['email']);
            $activeSheet->setCellValue("H".$chave , $funcionario['celular']);
            $activeSheet->setCellValue("I".$chave , $funcionario['residencia']);
            $activeSheet->setCellValue("J".$chave , $funcionario['logradouro']);
            $activeSheet->setCellValue("K".$chave , $funcionario['numero']);
            $activeSheet->setCellValue("L".$chave , $funcionario['complemento']);
            $activeSheet->setCellValue("M".$chave , $funcionario['cep']);
            $activeSheet->setCellValue("N".$chave , $funcionario['cidade']);
            $activeSheet->setCellValue("O".$chave , $funcionario['estado']);
            $activeSheet->setCellValue("P".$chave , toReal($funcionario['salario']));
            $activeSheet->setCellValue("Q".$chave , toReal($funcionario['vr']));
            $activeSheet->setCellValue("R".$chave , toReal($funcionario['vt']));
            $activeSheet->setCellValue("S".$chave , !empty($funcionario['admissao']) && $funcionario['admissao'] != '0000-00-00' ? date('d/m/Y', strtotime($funcionario['admissao'])) : '');
            $activeSheet->setCellValue("T".$chave , !empty($funcionario['demissao']) && $funcionario['demissao'] != '0000-00-00' ? date('d/m/Y', strtotime($funcionario['demissao'])) : '');
        }

        # Define os headers
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Relatorio RH.xls"'); /*-- $filename is  xsl filename ---*/
        # Limpa o objeto para poder realizar o download
        ob_end_clean(); 
        # Output do arquivo
        $excel_writer->save('php://output');
    }

}

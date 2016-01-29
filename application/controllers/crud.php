<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Controller
{

    /*
     * carregar helper library e model.
     */
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->library('table');
        $this->load->library('session');
        $this->load->model('crud_model','crud');
    }

	public function index(){
		$dados = array(
			'titulo' => 'Gestão',
			'tela' => '',
		);
		$this->load->view('crud',$dados);
	}

    public function create(){
        //validação do form
        $this->form_validation->set_rules('nome','NOME','trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('email','EMAIL','trim|required|max_length[50]|strtolower|valid_email|is_unique[ci.email]');
        $this->form_validation->set_message('is_unique','Este %s já está cadastrado no sistema');
        $this->form_validation->set_rules('login','LOGIN','trim|required|max_length[25]|strtolower|is_unique[ci.login]');
        $this->form_validation->set_rules('senha','SENHA','trim|required|strtolower');
        $this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('senha2','REPITA A SENHA','trim|required|strtolower|matches[senha]');

        if($this->form_validation->run()==TRUE):
            $dados = elements(array('nome','email','login','senha'),$this->input->post());
            $dados['senha'] = md5($dados['senha']);
            $this->crud->do_insert($dados);
        endif;

        $dados = array(
            'titulo' => 'Incluir',
            'tela' => 'create',
        );
        $this->load->view('crud',$dados);
    }


    public function retrieve(){
        $dados = array(
            'titulo' => 'Recuperar',
            'tela' => 'retrieve',
            'usuarios' => $this->crud->get_all()->result(),
        );
        $this->load->view('crud',$dados);
    }


    public function update(){
        //validação do form
        $this->form_validation->set_rules('nome','NOME','trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('senha','SENHA','trim|required|strtolower');
        $this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('senha2','REPITA A SENHA','trim|required|strtolower|matches[senha]');

        if($this->form_validation->run()==TRUE):
            $dados = elements(array('nome','senha'),$this->input->post());
            $dados['senha'] = md5($dados['senha']);
            $this->crud->do_update($dados,array('id'=>$this->input->post('idusuario')));
        endif;

        $dados = array(
            'titulo' => 'Editar',
            'tela' => 'update',
        );
        $this->load->view('crud',$dados);
    }

    public function delete(){
        if($this->input->post('idusuario')>0):
            $this->crud->do_delete(array('id'=>$this->input->post('idusuario')));
        endif;

        $dados = array(
            'titulo' => 'Deletar',
            'tela' => 'delete',
    );
        $this->load->view('crud',$dados);
    }

    public function upload_form(){

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if ( ! $this->crud->do_upload())
        {
            $error = array('error' => $this->crud->display_errors());

            $this->load->view('crud', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
        }

        $dados =  array(
            'titulo' => 'upload Imagens',
            'tela' => 'upload_form',
        );
        $this->load->view('crud',$dados);
    }
}

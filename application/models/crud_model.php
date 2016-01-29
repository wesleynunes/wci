<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model{

    /*
     * insert de usuario
     */
    public function do_insert($dados=NULL){
        if($dados!=NULL):
            $this->db->insert('ci',$dados);
            $this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso');
            redirect('crud/create');
        endif;
    }

    /*
     * update usuario
     */
    public function do_update($dados=NULL,$condicao=NULL){
        if($dados!=NULL && $condicao!=NULL):
            $this->db->update('ci',$dados,$condicao);
            $this->session->set_flashdata('edicaook','Cadastro alterado com sucesso');
            redirect(current_url());
        endif;
    }

    /*
     * deletar usuario
     */
    public function do_delete($condicao=NULL){
        if($condicao!=NULL):
            $this->db->delete('ci',$condicao);
            $this->session->set_flashdata('excluirok','Registro deletado com sucesso');
            redirect('crud/retrieve');
        endif;
    }

    /*
     * fazer o get para listar usuarios
     */
    public function get_all(){
        return $this->db->get('ci');
    }


    /*
     * fazer o get para o update
     */
    public function get_byid($id=NULL){
        if($id!=NULL):
            $this->db->where('id',$id);
            $this->db->limit(1);
            return $this->db->get('ci');
        else:
            return FALSE;
        endif;
    }


    function do_upload($data)
    {
        $this->db->insert('uploads',$data);
    }



}
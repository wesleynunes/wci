<html>
    <h3 style="text-align: center;" >Editar</h3>
</html>

<?php
$iduser = $this->uri->segment(3);
if($iduser==NULL) redirect('crud/retrieve');
$query = $this->crud->get_byid($iduser)->row();

echo form_open("crud/update/$iduser");
    echo form_label('Nome completo');
    echo form_input(array('name'=>'nome'),set_value('nome',$query->nome),'autofocus');
    echo form_label('Email');
    echo form_input(array('name'=>'email'),set_value('email',$query->email),'disabled="disabled"');
    echo form_label('Login');
    echo form_input(array('name'=>'login'),set_value('login',$query->login),'disabled="disabled"');
    echo form_label('Senha');
    echo form_password(array('name'=>'senha'),set_value('senha'));
    echo form_label('Repita a senha');
    echo form_password(array('name'=>'senha2'),set_value('senha2'));
    echo form_submit(array('name'=>'cadastrar'),'Alterar Dados');
    echo form_hidden('idusuario',$query->id);
    //seta a mensagens de cadastro com sucesso na pagina
    if($this->session->flashdata('edicaook')):
        echo '<p>'.$this->session->flashdata('edicaook').'</p>';
    endif;
    // seta a mensagens de cadastro com erro na paggina
    echo validation_errors('<p>','</p>');
echo form_close();























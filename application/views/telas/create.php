<html>
    <h3 style="text-align: center;" >Incluir</h3>
</html>

<?php
echo form_open('crud/create');
echo form_label('Nome completo');
echo form_input(array('name'=>'nome'),set_value('nome'),'autofocus');
echo form_label('Email');
echo form_input(array('name'=>'email'),set_value('email'));
echo form_label('Login');
echo form_input(array('name'=>'login'),set_value('login'));
echo form_label('Senha');
echo form_password(array('name'=>'senha'),set_value('senha'));
echo form_label('Repita a senha');
echo form_password(array('name'=>'senha2'),set_value('senha2'));
echo form_submit(array('name'=>'cadastrar'),'Cadastrar');
if($this->session->flashdata('cadastrook')):
    echo '<p>'.$this->session->flashdata('cadastrook').'</p>';
endif;
echo validation_errors('<p>','</p>');
echo form_close();
































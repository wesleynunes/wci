<html>
    <h3 style="text-align: center;" >Registros</h3>
</html>

<?php
if($this->session->flashdata('excluirok')):
    echo '<p>'.$this->session->flashdata('excluirok').'</p>';
endif;
$this->table->set_heading('ID','Nome','Email','Login','Operações');
foreach ($usuarios as $linha):
    $this->table->add_row($linha->id,$linha->nome,$linha->email,$linha->login,anchor("crud/update/$linha->id",'Editar').' - '.anchor("crud/delete/$linha->id",'Deletar'));
endforeach;
echo $this->table->generate();
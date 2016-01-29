<html>
	<head>
		<!-- Arquivos css -->
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
		<!-- arquivos js -->
		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/kendo.all.min.js"></script>
	</head>
</html>

<?php
$this->load->view('includes/header');
$this->load->view('includes/menu');
if($tela!='') $this->load->view('telas/'.$tela);
$this->load->view('includes/footer');




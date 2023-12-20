<?php $this->load->view('admin/template/header');?>
<body>
    
<div class="container-scroller">
<?php $this->load->view('admin/template/sidebar');?>
<div class="container-fluid page-body-wrapper">
<?php $this->load->view('admin/template/navbar');?>

    <?php echo $contents; ?>
</div>
</div>
<?php $this->load->view('admin/template/logout'); ?>
<?php $this->load->view('admin/template/footer');?>
</body>
</html>

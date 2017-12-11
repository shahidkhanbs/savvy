<?= $this->load->view('commons/header') ?>
<?= $this->load->view('commons/headHtml') ?>
             <div class="page-content-wrapper">
                <div class="page-content">                   
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?= base_url() ?>savvy1/Dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>savvy1/Student">Students</a>
                            </li>                            
                        </ul>                       
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">Students</span>
                                    </div>                                   
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">                                        
                                    </div>
                                     <?php if($this->session->flashdata('msg')){ ?>
                                       <div class="alert alert-success">
                                        <button class="close" data-dismiss="alert"></button>
                                        <strong> Success </strong> <?php echo $this->session->flashdata('msg'); ?>
                                        </div>
                                       <?php } ?>
                                    <div>
                                       <?= $this->load->view('student/student_table') ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
 <?= $this->load->view('commons/footHtml') ?>      
 <?= $this->load->view('commons/footer') ?>      
     
       
      
<?= $this->load->view('commons/header') ?>
<?= $this->load->view('commons/headHtml') ?>
             <div class="page-content-wrapper">
                <div class="page-content">                   
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?= base_url() ?>aims/Dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>aims/transportStudentPackage">Transport Student Package</a>
                            </li>                            
                        </ul>                       
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">Transport Student Package</span>
                                    </div>                                   
                                </div>
                                <div id="msgs"></div>
                                <div class="portlet-body">
                                    <div id="transport_stop_show">
                                       <?= $this->load->view('transport/transport_student_package/transport_student_package_table') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
 <?= $this->load->view('commons/footHtml') ?>      
 <?= $this->load->view('commons/footer') ?>      
 <?= $this->load->view('transport/transport_student_package/appJS') ?>
 <?= $this->load->view('transport/transport_student_package/modals') ?>
<style type="text/css">
    .modal-dialog{ width: auto !important;}
</style>
       
      
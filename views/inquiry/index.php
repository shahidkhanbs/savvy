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
                                <a href="<?= base_url() ?>savvy1/Inquiry">INQUIRY</a>
                            </li>                            
                        </ul>                       
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">  INQUIRY</span>
                                    </div>                                   
                                </div>
                                <div id="msgs"></div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group"> 
                                                    <a href="<?= base_url()?>savvy1/Inquiry/createInquiry">                                          
                                                        <button  class="btn sbold green"> Add Inquiry
                                                            <i class="fa fa-plus"></i>
                                                        </button>  
                                                    </a>      
                                                </div>
                                                <div class="btn-group"> 
                                                    <a href="<?= base_url()?>savvy1/Inquiry/createAdmissionForm">                                          
                                                        <button  class="btn sbold green"> Admission Form
                                                            <i class="fa fa-plus"></i>
                                                        </button>  
                                                    </a>      
                                                </div>
                                            </div>                                           
                                        </div>
                                    </div>
                                     <?php if($this->session->flashdata('msg')){ ?>
                                       <div class="alert alert-success">
                                        <button class="close" data-dismiss="alert"></button>
                                        <strong> Success </strong> <?php echo $this->session->flashdata('msg'); ?>
                                        </div>
                                       <?php } ?>
                                        <table class="table table-striped table-bordered table-hover " id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>Inquiry No</th>
                                                    <th>Name</th>
                                                    <th>Father Name</th>
                                                    <th>DOB</th>
                                                    <th>Student No.</th>
                                                    <th>Father No.</th>
                                                    <!-- <th>Program</th> -->
                                                    <th>Inquiry Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if($inquiries)                                           
                                            foreach ($inquiries as $inquiry) {                                              
                                            ?>             
                                                <tr>
                                                    <td><?=  $inquiry['TRNNO'] ?></td>
                                                    <td><?=  $inquiry['FIRST_NAME'] .' '.$inquiry['LAST_NAME'] ?></td>
                                                    <td><?=  $inquiry['FATHER_NAME'] ?></td>
                                                    <td><?=  $inquiry['DOB'] ?></td>
                                                    <td><?=  $inquiry['MOBILE_NO'] ?></td>
                                                    <td><?=  $inquiry['FATHER_MOBILE_NO'] ?></td>
                                                    <!-- <td><?=  $inquiry['PROGRAM_NAME'] ?></td> -->
                                                    <td><?=  $inquiry['ENT_DATE'] ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>savvy1/Inquiry/editInquiry/<?=  $inquiry['TRNNO'] ?>" title="Delete Inquiry"  class="btn btn-icon-only blue">
                                                          <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<?= base_url() ?>savvy1/Inquiry/printInquiry/<?=  $inquiry['TRNNO'] ?>" title="Print Inquiry"  class="btn btn-icon-only red">
                                                          <i class="fa fa-print"></i>
                                                        </a>  
                                                        <a href="<?= base_url() ?>savvy1/Inquiry/matureInquiry/<?=  $inquiry['TRNNO'] ?>" title="Admission Window"  class="btn btn-icon-only green">
                                                          <i class="m-icon-swapright m-icon-white"></i>
                                                        </a>  
                                                    </td>
                                                </tr>        
                                            <?php } ?>       
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
 <?= $this->load->view('commons/footHtml') ?>      
 <?= $this->load->view('commons/footer') ?>      
 <?= $this->load->view('inquiry/appJS') ?>      
       
      
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
                                <a href="<?= base_url() ?>savvy1/Admission">Admissions</a>
                            </li>                            
                        </ul>                       
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">Admissions</span>
                                    </div>                                   
                                </div>
                                <div id="msgs"></div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">                                        
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
                                                <th>Display Pic</th>
                                                <th>Name</th>
                                                <th>Father Name</th>
                                                <th>DOB</th>
                                                <th>Student No.</th>
                                                <th>Father No.</th>
                                                <th>Program</th>
                                                <th>Inquiry Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($admissions)                                           
                                        foreach ($admissions as $admission) {                                              
                                        ?>             
                                            <tr>
                                                <td><?=  $admission['TRNNO'] ?></td>
                                                <td>
                                                 <?php if($admission['PIC_PATH']=='') { ?>
                                                     <img src="<?= base_url() ?>uploads/default_pic.png" class="img-rounded" alt="Display_pic" width="100" height="100"> 
                                                 <?php } else{ ?>
                                                   <img src="<?= base_url() ?>uploads/students/<?=  $admission['PIC_PATH'] ?>" class="img-rounded" alt="Display_pic" width="100" height="100"> 
                                                 <?php } ?>             
                                                </td>
                                                <td><?=  $admission['FIRST_NAME'] .' '.$admission['LAST_NAME'] ?></td>
                                                <td><?=  $admission['FATHER_NAME'] ?></td>
                                                <td><?=  $admission['DOB'] ?></td>
                                                <td><?=  $admission['MOBILE_NO'] ?></td>
                                                <td><?=  $admission['FATHER_MOBILE_NO'] ?></td>
                                                <td><?=  $admission['PROGRAM_NAME'] ?></td>
                                                <td><?=  $admission['ENT_DATE'] ?></td>
                                                <td>
                                                    <a href="<?= base_url() ?>savvy1/Admission/editAdmission/<?=  $admission['TRNNO'] ?>" title="Delete Inquiry"  class="btn btn-icon-only blue">
                                                      <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url() ?>savvy1/Admission/printAdmission/<?=  $admission['TRNNO'] ?>" title="Print Inquiry"  class="btn btn-icon-only red">
                                                      <i class="fa fa-print"></i>
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
     
       
      
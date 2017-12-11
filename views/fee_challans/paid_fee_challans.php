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
                                <a href="<?= base_url() ?>savvy1/FeeInstallment">Unpaid Challans</a>
                            </li>                            
                        </ul>                       
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">  Unpaid Challans</span>
                                    </div>                                   
                                </div>
                                <?php if($this->session->flashdata('msg')){ ?>
                                   <div class="alert alert-success">
                                    <button class="close" data-dismiss="alert"></button>
                                    <strong> Success! </strong> <?php echo $this->session->flashdata('msg');  ?>
                                    </div>
                                   <?php } ?>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">  
                                                <a href="<?= base_url() ?>savvy1/FeeInstallment/createFeeChallan">                                         
                                                    <button   class="btn sbold green">Create Individual Challan
                                                        <i class="fa fa-plus"></i>
                                                    </button>  
                                                </a>      
                                                </div>
                                                 <div class="btn-group">  
                                                <a href="<?= base_url() ?>savvy1/FeeInstallment/createGroupChallan">                                         
                                                    <button   class="btn sbold green">Create Group Challan
                                                        <i class="fa fa-plus"></i>
                                                    </button>  
                                                </a>      
                                                </div>
                                            </div>                                           
                                        </div>
                                    </div>
                                     <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Student</th>
                                                <th>Fee Amount</th>
                                                <th>Challan Type</th>
                                                <th>From Month</th>
                                                <th>To Month</th>
                                                <th>Due Date</th>
                                                <th>Post/Due Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($fee_challans)                                           
                                        foreach ($fee_challans as $challan) {                                              
                                        ?>             
                                            <tr>
                                                <td><?=  $challan['TRNNO'] ?></td>
                                                <td><?=  $challan['STUDENT_NAME'] ?></td>
                                                <td><?=  $challan['AMOUNT'] ?></td>
                                                <td><?=  $challan['INS_TYPE_DESC'] ?></td>
                                                <td><?=  $challan['FROM_MONTH'] ?></td>
                                                <td><?=  $challan['TO_MONTH'] ?></td>
                                                <td><?=  $challan['DUE_DATE'] ?></td>
                                                <td>
                                                 <form action="<?= base_url() ?>savvy1/FeeInstallment/payFeeInstallment" onsubmit="return validateForm()"  method="post">
                                                    <input type="text" class="date date-picker" name="PAID_DATE" id="PAID_DATE" placeholder="dd-mm-yyyy" readonly>
                                                    <input type="hidden"  name="id" id="id" value="<?=  $challan['TRNNO'] ?>">
                                                     <button type="submit" class="btn green">
                                                      <i class="fa fa-plus"></i> Payment
                                                     </button>
                                                 </form>
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
 <?= $this->load->view('section/appJS') ?>      
 <?= $this->load->view('section/modals') ?>      
       
      
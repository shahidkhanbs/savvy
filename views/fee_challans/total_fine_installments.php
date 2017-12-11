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
                                <a href="<?= base_url() ?>savvy1/FineInstallment">Total Installments</a>
                            </li>                            
                        </ul>                       
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">  Total Installments</span>
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
                                                <a href="<?= base_url() ?>savvy1/FineInstallment/createFineInstallment">                                         
                                                    <button   class="btn sbold green">Create Installment
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
                                                <th>Fine Type</th>
                                                <th>Fine Amount</th>
                                                <th>Due Date</th>
                                                <th>Post/Due Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($fine_installments)                                           
                                        foreach ($fine_installments as $ins) {                                              
                                        ?>             
                                            <tr>
                                                <td><?=  $ins['TRNNO'] ?></td>
                                                <td><?=  $ins['FULL_NAME'] ?></td>
                                                <td><?=  $ins['FINE_TYPE_DESC'] ?></td>
                                                <td><?=  $ins['AMOUNT'] ?></td>
                                                <td><?=  $ins['DUE_DATE'] ?></td>
                                                <td>
                                                <?php if($ins['PAID_DATE']=='') { ?>
                                                 <form action="<?= base_url() ?>savvy1/FineInstallment/payFineInstallment" method="post">
                                                    <input type="text" class="date date-picker" name="PAID_DATE" id="PAID_DATE" placeholder="dd-mm-yyyy" readonly>
                                                    <input type="hidden"  name="id" id="id" value="<?=  $ins['TRNNO'] ?>">
                                                     <button type="submit" class="btn green">
                                                      <i class="fa fa-plus"></i> Payment
                                                     </button>
                                                 </form>
                                                <?php } else { echo "Paid"; } ?>                         
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
       
      
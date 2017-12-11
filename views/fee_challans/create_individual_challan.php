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
                <a href="<?= base_url() ?>savvy1/FeeChallan">Total Challans</a>
            </li>                            
        </ul>                       
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-list font-dark"></i>
                        <span class="caption-subject bold uppercase">  Challans</span>
                    </div>                                   
                </div>
                <?php if($this->session->flashdata('msg')){ ?>
               <div class="alert alert-danger">
                <button class="close" data-dismiss="alert"></button>
                <strong> Alert </strong> <?php echo $this->session->flashdata('msg');  ?>
                </div>
               <?php } ?>
                <div class="portlet-body form">
                    <form action="<?= base_url() ?>savvy1/FeeChallan/storeIndividualChallan"  method="post" class="form-horizontal">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Student</label>
                                <div class="col-md-4">                                
                                    <select class="form-control select2"  onchange="getpackages(this.value);" required="required" >
                                        <option>Select Student</option>
                                        <?php if($students)
                                                foreach ($students as $student) {                 
                                        ?>
                                        <option value="<?= $student['STUDENT_ID'].','.$student['PROGRAM_LINE_ID'].','.$student['CAMPAIGN_ID'] ?>"><?= $student['FULL_NAME'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="CAMPAIGN_ID" id="CAMPAIGN_ID">  
                            <input type="hidden" name="STUDENT_ID" id="STUDENT_ID">  
                            <input type="hidden" name="PROGRAM_LINE_ID" id="PROGRAM_LINE_ID">  
                            <div class="form-group">
                                <label class="col-md-3 control-label">Challan Type</label>
                                <div class="col-md-4">                                
                                      <select class="form-control" name="ins_type" id="ins_type" >                 
                                         <option value="2">Month Wise</option>
                                         <option value="4">Bi-Month Wise</option>
                                         <option value="6">Quarterly</option>
                                         <option value="8">Full Installment</option>                              
                                      </select>
                                </div>
                            </div>
                            <input type="hidden" name="FEE_ID" id="FEE_ID">  
                            <input type="hidden" name="tuition_amount" id="tuition_amount">  
                            <div class="form-group">
                                <label class="col-md-3 control-label">Amount</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Amount" required readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">First Date</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control date date-picker" name="first_date" id="first_date" placeholder="dd-mm-yyyy" readonly>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-md-3 control-label">Due Date</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control date date-picker" name="due_date" id="due_date" placeholder="dd-mm-yyyy" readonly>
                                </div>
                            </div>                                      
                            <div class="form-group">
                                <label class="col-md-3 control-label">Remarks</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" name="remarks" id="remarks" placeholder="Enter Fine Remarks"></textarea>
                                </div>
                            </div>                                                       
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Save</button>
                                    <button type="button" onclick="$('.form-horizontal')[0].reset();" class="btn default">Clear</button>
                                </div>
                            </div>
                        </div>
                    </form>                                       
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->load->view('commons/footHtml') ?>      
<?= $this->load->view('commons/footer') ?>   
<?= $this->load->view('fee_challans/appJS') ?>   

     
       
      
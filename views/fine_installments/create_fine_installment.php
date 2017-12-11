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
                        <span class="caption-subject bold uppercase">  Installments</span>
                    </div>                                   
                </div>
                <?php if($this->session->flashdata('msg')){ ?>
               <div class="alert alert-danger">
                <button class="close" data-dismiss="alert"></button>
                <strong> Alert </strong> <?php echo $this->session->flashdata('msg');  ?>
                </div>
               <?php } ?>
                <div class="portlet-body">                    
                    <div class="tab-pane active" id="tab_0">
                      <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">                                   
                                    <span class="caption-subject font-black-sunglo bold uppercase">Create Fine Installment </span>                  
                                </div>
                                <div class="actions">
                                    <div class="portlet-input input-inline input-small">                                            
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                   <form action="<?= base_url() ?>savvy1/FineInstallment/storeFineInstallment"  method="post" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Student</label>
                                            <div class="col-md-4">                                
                                                <select class="form-control select2"  onchange="getProgram(this.value);" required="required" >
                                                    <option>Select Student</option>
                                                    <?php if($students)
                                                            foreach ($students as $student) {                 
                                                    ?>
                                                    <option value="<?= $student['STUDENT_ID'].','.$student['PROGRAM_LINE_ID'] ?>"><?= $student['FULL_NAME'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="STUDENT_ID" id="STUDENT_ID">  
                                        <input type="hidden" name="PROGRAM_LINE_ID" id="PROGRAM_LINE_ID">  
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Fine</label>
                                            <div class="col-md-4">                                
                                                <select class="form-control select2" onchange="getFineFee(this.value);">
                                                    <option>Select Fine</option>
                                                    <?php if($fines)
                                                            foreach ($fines as $fine) {                 
                                                    ?>
                                                    <option value="<?= $fine['TEMPLATE_ID'].','.$fine['FINE_FEE'] ?>"><?= $fine['FINE_TYPE_DESC'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="FINE_ID" id="FINE_ID">  
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Amount</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="FINE_FEE" id="FINE_FEE" placeholder="Enter Amount" required readonly>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Due Date</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control date date-picker" name="DUE_DATE" id="DUE_DATE" placeholder="dd-mm-yyyy" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Discount</label>
                                            <div class="col-md-4">
                                                <input type="text" value="0" class="form-control" id="discount" name="discount" readonly>
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
    </div>
</div>
</div>
 <?= $this->load->view('commons/footHtml') ?>      
 <?= $this->load->view('commons/footer') ?>   
 <?= $this->load->view('fine_installments/appJS') ?>   

     
       
      
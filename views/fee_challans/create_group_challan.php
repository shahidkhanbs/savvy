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
                        <span class="caption-subject bold uppercase"> Create Group Challan</span>
                    </div>                                   
                </div>
                <?php if($this->session->flashdata('msg')){ ?>
               <div class="alert alert-success">
                <button class="close" data-dismiss="alert"></button>
                <strong> SUCCESS! </strong> <?php echo $this->session->flashdata('msg');  ?>
                </div>
               <?php } ?>
                <div class="portlet-body">
                    <div class="table-toolbar">                  
                        <div class="table-toolbar">
                        <div class="row">
                          <div class="col-md-3 mb-3">
                          <label class="control-label">Due Date</label>
                          <input type="text" class="form-control date-picker" placeholder="dd-mm-yyyy" name="due_date">
                       </div> 
                       <div class="col-md-3 mb-3">
                          <label class="control-label">First Challan Month</label>
                          <input type="text" class="form-control date-picker" onblur="sendValue(this.value);" placeholder="dd-mm-yyyy" id="first_month" name="first_month">
                       </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Program</label>
                              <select class="form-control" id="PROGRAM_ID" name="PROGRAM_ID" onchange="getProgramStudents(this.value);">
                                 <option value="">Select Program</option>
                                 <?php if($programs)
                                    foreach ($programs as $program) {                                               
                                    ?>
                                 <option value="<?= $program['PROGRAM_LINE_ID'] ?>"><?= $program['PROGRAM_LINE_NAME'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>                                         
                        </div>
                    </div>
                <form action="<?= base_url() ?>savvy1/FeeChallan/storeGroupChallan"  class="horizontal-form" method="post"> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                    <i class="fa fa-comments"></i>Students</div>                                    
                                </div>
                                <div id="group_list">                                
                                </div>                               
                            </div>
                        </div>                       
                    </div>
                    <div class="row">
                       <div class="col-md-3 mb-3">
                          <label class="control-label">Challan Type</label>
                          <select class="form-control" name="ins_type" id="ins_type" >                 
                             <option value="2">Month Wise</option>
                             <option value="4">Bi-Month Wise</option>
                             <option value="6">Quarterly</option>
                             <option value="8">Full Installment</option>                              
                          </select>
                       </div>                                                               
                    </div>
                    <input type="text" name="start_date" id="start_date">
                    <div class="modal-footer">
                        <button type="submit" id="" class="btn green">CREATE Challan</button>
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
     
       
             
      
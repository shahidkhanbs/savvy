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
                <a href="<?= base_url() ?>savvy1/AssignSection">Assign Section</a>
            </li>                            
        </ul>                       
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-list font-dark"></i>
                        <span class="caption-subject bold uppercase">  Assign Section</span>
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
                    <form action="<?= base_url() ?>savvy1/AssignSection/getStudents"  class="horizontal-form" method="post">
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Program</label>
                              <select class="form-control" id="PROGRAM_ID" name="PROGRAM_ID" onchange="getProgramSection(this.value);">
                                 <option value="">Select Program</option>
                                 <?php if($programs)
                                    foreach ($programs as $program) {                                               
                                    ?>
                                 <option value="<?= $program['PROGRAM_LINE_ID'] ?>"><?= $program['PROGRAM_LINE_NAME'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                          <div class="col-md-3 mb-3">
                              <label class="control-label">Section</label>
                              <select class="form-control" id="SECTION_ID" name="SECTION_ID">
                                 <option value="">Select Section</option>                        
                              </select>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Section Limit</label>
                              <input type="text" class="form-control" name="LIMIT" id="LIMIT" onblur="showList();" placeholder="Enter Limit">
                           </div>                
                        </div>
                    </form>
                    </div>
                    <form action="<?= base_url() ?>savvy1/AssignSection/assignSections"  class="horizontal-form" method="post"> 
                       <div class="row">
                            <div class="col-md-12">
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-comments"></i>Students</div>                                    
                                    </div>
                                    <div id="assign_show">
                                           <?= $this->load->view('assign_section/create_student_list') ?> 
                                    </div>                               
                                </div>
                            </div>                       
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="" class="btn green">CREATE SECTION</button>
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
 <?= $this->load->view('assign_section/appJS') ?>      
     
       
      
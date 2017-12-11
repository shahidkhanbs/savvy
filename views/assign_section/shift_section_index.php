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
                <a href="<?= base_url() ?>savvy1/Import">Assign Section</a>
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
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Program</label>
                              <select class="form-control" id="PROGRAM_ID" name="PROGRAM_ID" onchange="getProgramSectionStudents(this.value);">
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
                      <div id="show_shift_list"></div>                                   
                </div>
            </div>
        </div>
    </div>
</div>
</div>
 <?= $this->load->view('commons/footHtml') ?>      
 <?= $this->load->view('commons/footer') ?>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
 <?= $this->load->view('assign_section/appJS') ?>      
     
       
      
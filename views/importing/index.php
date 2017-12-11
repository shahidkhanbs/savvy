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
                <a href="<?= base_url() ?>savvy1/Import">Import</a>
            </li>                            
        </ul>                       
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-list font-dark"></i>
                        <span class="caption-subject bold uppercase">  Import</span>
                    </div>                                   
                </div>
                <div id="msgs"></div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">                                           
                                    
                                </div>
                            </div>                                           
                        </div>
                    </div>
                    <div class="tab-pane active" id="tab_0">
                      <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-equalizer font-red-sunglo"></i>
                                    <span class="caption-subject font-red-sunglo bold uppercase">Import Inquiry</span>
                  
                                </div>
                                <div class="actions">
                                    <div class="portlet-input input-inline input-small">
                                        <div class="input-icon right">
                                            <i class="icon-magnifier"></i>
                                            <input type="text" class="form-control input-circle" placeholder="search..."> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                   <form action="<?php echo base_url(); ?>savvy1/Import/ImportInquiryData" 
                                    method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">File</label>
                                            <div class="col-md-4">
                                                <input type="file" class="form-control" name="excelfile">
                                            </div>
                                        </div>                                                        
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn green">Submit</button>
                                                <button type="button" class="btn default">Cancel</button>
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
     
       
      
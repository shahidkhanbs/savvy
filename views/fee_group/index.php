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
                                <a href="<?= base_url() ?>savvy1/FeeGroup">FEE Group</a>
                            </li>                            
                        </ul>                       
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">  FEE Group</span>
                                    </div>                                   
                                </div>
                                <div id="msgs"></div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">                                           
                                                    <button  onclick="showAddFeeGroup();" class="btn sbold green"> Add New FEE Group
                                                        <i class="fa fa-plus"></i>
                                                    </button>                 
                                                    
                                                </div>
                                            </div>                                           
                                        </div>
                                    </div>
                                    <div id="fee_group_show">
                                       <?= $this->load->view('fee_group/fee_group_table') ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
 <?= $this->load->view('commons/footHtml') ?>      
 <?= $this->load->view('commons/footer') ?>      
 <?= $this->load->view('fee_group/appJS') ?>      
 <?= $this->load->view('fee_group/modals') ?>      
       
      
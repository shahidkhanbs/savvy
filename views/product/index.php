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
                                <a href="<?= base_url() ?>savvy1/Product"> product</a>
                            </li>                            
                        </ul>                       
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">  Product</span>
                                    </div>                                   
                                </div>
                                <div id="msgs"></div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">                                           
                                                    <button  onclick="showAddProduct();" class="btn sbold green"> Add New Product
                                                        <i class="fa fa-plus"></i>
                                                    </button>    
                                                </div>
                                            </div>                                           
                                        </div>
                                    </div>
                                    <div id="product_show">
                                       <?= $this->load->view('product/product_table') ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
 <?= $this->load->view('commons/footHtml') ?>      
 <?= $this->load->view('commons/footer') ?>      
 <?= $this->load->view('product/appJS') ?>      
 <?= $this->load->view('product/modals') ?>      
       
      
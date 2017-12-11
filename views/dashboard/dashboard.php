<?= $this->load->view('commons/header') ?>
<?= $this->load->view('commons/headHtml') ?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Dashboard</span>
                            </li>
                        </ul>                      
                    </div>
                    <h3 class="page-title"> Dashboard
                        <small>dashboard & statistics</small>
                    </h3>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="1349">0</span>
                                    </div>
                                    <div class="desc"> New Feedbacks </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="12,5">0</span>M$ </div>
                                    <div class="desc"> Total Profit </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="549">0</span>
                                    </div>
                                    <div class="desc"> New Orders </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> +
                                        <span data-counter="counterup" data-value="89"></span>% </div>
                                    <div class="desc"> Brand Popularity </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Site Visits</span>
                                        <span class="caption-helper">weekly stats...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn red btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">New</label>
                                            <label class="btn red btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Returning</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="site_statistics_loading">
                                        <img src="assets/global/img/loading.gif" alt="loading" /> </div>
                                    <div id="site_statistics_content" class="display-none">
                                        <div id="site_statistics" class="chart"> </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Revenue</span>
                                        <span class="caption-helper">monthly stats...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                                                <span class="fa fa-angle-down"> </span>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Q1 2014
                                                        <span class="label label-sm label-default"> past </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Q2 2014
                                                        <span class="label label-sm label-default"> past </span>
                                                    </a>
                                                </li>
                                                <li class="active">
                                                    <a href="javascript:;"> Q3 2014
                                                        <span class="label label-sm label-success"> current </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Q4 2014
                                                        <span class="label label-sm label-warning"> upcoming </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="site_activities_loading">
                                        <img src="assets/global/img/loading.gif" alt="loading" /> </div>
                                    <div id="site_activities_content" class="display-none">
                                        <div id="site_activities" style="height: 228px;"> </div>
                                    </div>
                                    <div style="margin: 20px 0 10px 30px">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-success"> Revenue: </span>
                                                <h3>$13,234</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-info"> Tax: </span>
                                                <h3>$134,900</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-danger"> Shipment: </span>
                                                <h3>$1,134</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-warning"> Orders: </span>
                                                <h3>235090</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                    </div>                  
                    
                </div>
            </div>
<!-- Footer and dashboard page assests -->
<a href="javascript:;" class="page-quick-sidebar-toggler">
    <i class="icon-login"></i>
</a>      
</div>
<div class="page-footer">
    <div class="page-footer-inner"> <?= Date('Y'); ?> &copy;  AIMS Team.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>   
<script src="<?= base_url() ?>assets1/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?= base_url() ?>assets1/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?= base_url() ?>assets1/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?= base_url() ?>assets1/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?= base_url() ?>assets1/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets1/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>     
       
      
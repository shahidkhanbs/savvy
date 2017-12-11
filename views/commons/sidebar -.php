<?php
 $sidebar = $this->Account_model->get_sidebar();
?>
 <div class="page-sidebar-wrapper">         
                <div class="page-sidebar navbar-collapse collapse">                 
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">                       
                        <li class="sidebar-toggler-wrapper hide">                           
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>                    
                        </li>                       
                        <li class="sidebar-search-wrapper">
                            <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                                <a href="javascript:;" class="remove">
                                    <i class="icon-close"></i>
                                </a>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                        </li>
                        <li class="nav-item start active open">
                            <a href="<?= base_url() ?>savvy1/Dashboard" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>                          
                        </li> 
                        <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/Session" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Session</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li>  
                        <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/Campaign" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Campaign</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li> 
                         <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/ProgramGroup" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Program Group</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li> 
                        <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/Program" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Program</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li>
                         <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/FeeTitle" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Fee Title</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li>  
                        <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/FeeTemplate" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Fee Template</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li> 
                        <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/FeeCoding" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Fee Coding</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li> 
                        <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/Product" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Product</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li>
                        <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/Section" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Section</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li>  
                        <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/Inquiry" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Inquiry</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li> 
                        <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/Admission" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Admission</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li>  
                         <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/Student" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Student</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li> 
                        <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/FeeGroup" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Fee Group</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li> 
                        <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/TransportStop" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Transport Stop</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li> 
                        <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/TransportTemplate" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Transport Template</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li>   
                        <li class="nav-item  ">
                            <a href="<?= base_url() ?>savvy1/FeeDiscountPolicy" class="nav-link nav-toggle">
                                <i class="icon-form"></i>
                                <span class="title">Discount Policy</span>
                                <span class="arrow"></span>
                            </a>                            
                        </li>              
                               
                    </ul>                  
                </div>
            </div>
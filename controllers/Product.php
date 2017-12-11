<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('Product_model');    
    }
    public function index(){ 
        $data['title']="Product";
        $data['products'] = $this->Product_model->getProducts();  
        $this->load->view('product/index', $data);    
    }
   
    public function store(){    
        $data = array(
        'PRODUCT_ID' =>   $this->Savvy_model->getNextId('PRODUCT_ID','PRODUCT','school_db'), 
        'PRODUCT_NAME' => strtoupper($this->input->post('name')), 
        'PRODUCT_SHORT_NAME' =>   strtoupper($this->input->post('short_name')),        
        'PRODUCT_PRICE' =>   $this->input->post('price'),  
        'UCODE' =>  $this->session->userdata('login_id'), 
       );       
       $this->Product_model->insertProduct($data);
        $data['products'] = $this->Product_model->getProducts();  
       print($this->load->view('product/product_table', $data)); 
    }
    public function toggle(){    
        $product_id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->Product_model->changeProduct($product_id,$status);
        $data['products'] = $this->Product_model->getProducts();  
        print($this->load->view('product/product_table', $data));
    }
    public function edit(){    
           $product_id = $this->input->post('id'); 
           $data = $this->Product_model->editProduct($product_id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->PRODUCT_ID;  
                $output['name'] = $row->PRODUCT_NAME;  
                $output['short_name'] = $row->PRODUCT_SHORT_NAME;  
                $output['price'] = $row->PRODUCT_PRICE;                
           }  
           echo json_encode($output); 
    }
    public function update(){    
        $update = array( 
        'PRODUCT_NAME' => strtoupper($this->input->post('name_edit')), 
        'PRODUCT_SHORT_NAME' =>   strtoupper($this->input->post('short_name_edit')), 
        'PRODUCT_PRICE' =>   $this->input->post('price_edit'),  
        'UCODE' =>  $this->session->userdata('login_id'),  
        'LAST_UPDATE_BY' => $this->session->userdata('login_id'),  
         );        
        $this->Product_model->updateProduct($update,$this->input->post('id'));
        $data['products'] = $this->Product_model->getProducts();  
        print($this->load->view('product/product_table', $data)); 
    }

  

}
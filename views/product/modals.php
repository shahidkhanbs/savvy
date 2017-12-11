<!-- add session modal -->
<div id="add_product_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add New Product</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="product_form">
               <div class="form-group">
                  <label class="col-md-4 control-label">Product Name</label>
                  <div class="col-md-8">
                     <input type="text"  name="name" id="name" class="form-control" placeholder="Enter Product Price"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Product Short Name</label>
                  <div class="col-md-8">
                     <input type="text" name="short_name" id='short_name' class="form-control" placeholder="Enter Product Price"> 
                  </div>
               </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Product Price</label>
                  <div class="col-md-8">
                     <input type="text" name="price" id='price' class="form-control" placeholder="Enter Product Price"> 
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="btn_loading">
            <button class="btn green"  id="save_product">Save</button>
            </span>
         </div>
      </div>
   </div>
</div>

<!-- add session modal -->
<div id="edit_product_modal" class="modal fade" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Product</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="edit_product_form">
              <input type="hidden"  name="id" id="id"> 
               <div class="form-group">
                  <label class="col-md-4 control-label">Product Name</label>
                  <div class="col-md-8">
                     <input type="text"  name="name_edit" id="name_edit" class="form-control" placeholder="Enter Product Price"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Product Short Name</label>
                  <div class="col-md-8">
                     <input type="text" name="short_name_edit" id='short_name_edit' class="form-control" placeholder="Enter Product Price"> 
                  </div>
               </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Product Price</label>
                  <div class="col-md-8">
                     <input type="text" name="price_edit" id='price_edit' class="form-control" placeholder="Enter Product Price"> 
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="update_btn_loading">
            <button class="btn green" id="edit_product">Update</button>
            </span>
         </div>
      </div>
   </div>
</div>
<!-- ADD MENU ITEM MODAL -->
<div class="modal fade" id="addmenumodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style='background-color: #e74c3c;'>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:white;">Add a new Menu Item</h4>
      </div>  
        <form id='add_menuitem' action="../process_data/add_menu_item.php" method="post" novalidate>
                <div class="modal-body">
                    
                     <div class="container-fluid">
                        <div class="alert" id="add_errormessage" role="alert">...</div>
                        <div class="row"> 
                            
                      
                          <div class="col-md-12">                        
                               
                                 <?php $categories->getDropDownAddItem(); ?>                   
                              
                          </div>
                            
                           
                        </div>
                         
                        <div class="row">
                            <div class="col-md-12">
                                <label for="menuitem_name" class="control-label">Item Name:</label>
                                <input type="text" class="form-control" name="menuitem_name" id="menuitem_name" required>
                               <!-- <input type="hidden" class="form-control" name="menuitem_category" id="menuitem_category" value="0">-->
                            </div>
                          
                        </div>
                         <br>
                        <div class="row">
                            <div class="col-md-12">
                                 <label for="menuitem_price" class="control-label">Price:</label>
                                <input type="number" step="any" class="form-control" name="menuitem_price" id="menuitem_price" required>
                            </div>
                        </div>
                         <br>
                        <div class="row">
                          <div class="col-md-12">
                                <label for="product_description" class="control-label">Description:</label>
                                <textarea class="form-control" style="width:100%;" name="menuitem_description" id="menuitem_description" required></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-sm-3 col-xs-6">
                                <input type="checkbox" name="vegetarian" id="vegetarian" value="1">
                                <label for="vegetarian" class="control-label">Vegetarian</label>
                          </div>
                          <div class="col-sm-3 col-xs-6">
                                <input type="checkbox" name="spicy" id="spicy" value="1">
                                <label for="spicy" class="control-label">Spicy</label>
                          </div>
                          <div class="col-sm-3 col-xs-6">
                                <input type="checkbox" name="gluten_free" id="gluten_free" value="1">
                                <label for="gluten_free" class="control-label">Gluten Free</label>
                          </div>
                          <div class="col-sm-3 col-xs-6">
                                <input type="checkbox" name="featured" id="featured" value="1">
                                <label for="featured" class="control-label">Featured</label>
                          </div>
                                                      
                        </div>
                      </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Add</button>
                </div>
      </form>
    </div>
  </div>
</div>
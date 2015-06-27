<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
  //error_reporting(0);
    
$_SESSION["current_page"] = "menu";
    
$title = "Review Booking |Sliema Pitch Restaurant & Lounge";
$desc = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate sit amet lectus eu scelerisque. Donec ullamcorper mi diam, vitae hendrerit metus aliquet nec. Fusce id vestibulum augue. Praesent elit orci, blandit eu placerat ut, egestas sit amet nibh. Aenean placerat sit amet nunc nec venenatis. Duis id orci rhoncus, congue nunc sit amet, porttitor magna. Etiam in convallis lorem. Quisque euismod dictum ante. Pellentesque tellus est, iaculis quis tellus at, dictum faucibus libero. Duis tincidunt diam quis turpis posuere malesuada. Nunc eu nisi a felis ultrices condimentum. Mauris quis nisl ornare turpis sollicitudin condimentum. Etiam at mauris tempor, scelerisque turpis at, vulputate nisi. Suspendisse hendrerit tincidunt ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur placerat consectetur. Cras vitae mauris tellus. Duis leo eros, eleifend sit amet magna quis, hendrerit malesuada purus. Proin rhoncus consequat augue et mollis. Nunc pretium porta nibh, in volutpat nunc bibendum ut. Nullam neque dolor, facilisis nec dignissim vitae, adipiscing nec turpis. Duis viverra facilisis risus id scelerisque. Aenean iaculis leo at elit gravida, eu tempor sem faucibus.
Sed viverra feugiat quam in suscipit. Vestibulum nec massa luctus risus tincidunt tristique eget vel augue. Aenean eu libero sed sem varius hendrerit. Proin eu erat tempus, rutrum eros eget, convallis turpis. Nam id tempor lorem. Suspendisse ultricies imperdiet libero, quis pellentesque elit iaculis id. Maecenas porta a lorem sed porta.
Suspendisse porttitor eleifend ornare. Nam enim dolor, tempor a tortor quis, sodales pulvinar est. Integer gravida lacinia accumsan. Maecenas quis magna id eros interdum sollicitudin. Proin eget consequat ipsum, sit amet luctus nulla. Quisque et porta nunc. Suspendisse eget justo ac lacus porttitor condimentum. Nunc vel quam tincidunt, euismod mi non, pretium libero. Integer facilisis neque volutpat, euismod leo ut, condimentum nibh.
Sed malesuada vitae neque eu viverra. Praesent turpis felis, vehicula a ipsum eu, lacinia tincidunt ante.";
$keywords = "Review, Sliema, Pitch, Food, Restaurant, Lounge, Italian";
if(!isset($_SESSION["loggedin"]))
{
    header("Location: login.php");
}

include 'backend_header.php';

$categories = new menu_category();
$menu = new menu_item();


//var_dump($menu); exit;
//echo $cat->category_name; exit;

?>
<div class="modal fade" id="addmenumodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style='background-color: #e74c3c;'>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:white;">Add a new Menu Item</h4>
      </div>  
        <form id='menu_form' action="../process_data/add_menu_item.php" method="post">
                <div class="modal-body">
                    
                     <div class="container-fluid">
                        <div class="row">                        
                          <div class="col-md-12">                        
                               
                                 <?php $categories->getDropDown(); ?>                   
                              
                          </div>
                            
                           
                        </div>
                         
                        <div class="row">
                            <div class="col-md-12">
                                <label for="menuitem_name" class="control-label">Item Name:</label>
                                <input type="text" class="form-control" name="menuitem_name" id="menuitem_name">
                                <input type="hidden" class="form-control" name="menuitem_category" id="menuitem_category" value="0">
                            </div>
                          
                        </div>
                         <br>
                        <div class="row">
                            <div class="col-md-12">
                                 <label for="menuitem_price" class="control-label">Price:</label>
                                <input type="number" step="any" class="form-control" name="menuitem_price" id="menuitem_price">
                            </div>
                        </div>
                         <br>
                        <div class="row">
                          <div class="col-md-12">
                                <label for="product_description" class="control-label">Description:</label>
                                <textarea class="form-control" style="width:100%;" name="menuitem_description" id="menuitem_description"></textarea>
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
                    <button type="submit" class="btn btn-primary" >Add</button>
                  
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    
                </div>
      </form>
    </div>
  </div>
</div>

<!-- MANAGE CATEGORIES --->
<div class="modal fade" id="menucategorymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style='background-color: #e74c3c;'>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:white;">Menu Categories Management</h4>
      </div>  
        
                <div class="modal-body">
                    
                     <div class="container-fluid">
                         <div id="menu_categories">
                           <?php echo $categories->getList(); ?>
                         </div>
                        <hr class="hidden-xs">
                        <form name="add_menucategory" id="add_menucategory" action="../process_data/add_menu_category.php" method="post">

                            <div class="row">
                                <div class="col-xs-9">

                                    <input type="text" placeholder="Add New Menu Category" class="form-control" name="menucategory_name" id="menucategory_name">

                                </div>
                                <div class="col-xs-3">
                                     <button class="btn btn-primary" type="submit"><span class="fa fa-plus"></span></button>  
                                </div>



                            </div>
                        </form>
                     </div>   
                     
                </div>
                <div class="modal-footer">
                  
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                 
                </div>
       
    </div>
  </div>
</div>





<div class="row_4">  
        <div class="container">
            <div class="row">
                
                <div class="row">
                    <div class="col-lg-10 col-sm-8 col-xs-12">
                        <h2 id="reservations">Menu Management</h2>
                    </div>
                    <div class="col-lg-2 col-sm-4 " >                        
                        <?php $categories->getDropDown(); ?>
                    </div>
                    
                </div>
                 
                <div id="showmenuitems"> 
                    <?php 
                    $menu->getMenuItems();
                   
                    ?>
                   <!--
                    <div class="menu_item" >
                    <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <h3 class="red booking-margin">Bruscetta</h3> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-6">
                                        <p class="booking-margin">$5.90</p> 
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3 col-xs-6">
                                        <p class="booking-margin">Starters</p> 
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-6">
                                        <a href="edit_menu_item.php?id=1" data-type="submit" class="btn btn-primary btn1">                                        
                                            <span class="glyphicon glyphicon-edit"></span> 
                                        </a>  
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-6">
                                        <a href="delete_menu_item.php?id=1" data-type="submit" class="btn btn-primary btn1">
                                           <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>       
                     </div>
                     <div class="row">
                                    <hr class="hidden-xs">
                                    <div class="hidden-xs col-sm-offset-8 col-sm-4"> 
                                         <p class="menu_item-details">Added on 21/11/1991 at 20:00</p> 
                                    </div>          
                     </div>
                 </div>
                -->
                </div>
                <div style="height:20px; width:100%;"></div>
                
                <div class="row">
                    <div id="form">
                        <form id="menu_item-form" class="menu_item-form" action="../process_data/add_menu_item.php" method="post">
                         
                        
                         <div class="col-sm-12">
                              <button class="btn btn-primary "  style="float:none;"id="managemenucategory_button" type="button" value="Manage Categories" data-toggle="modal" data-target="#menucategorymodal">Manage Categories</button>
                              
                              <button class="btn btn-primary" style="float:none;" id="addmenuitem_button" type="submit" value="Add Menu Item" data-toggle="modal" data-target="#addmenumodal">Add Menu Item</button>
                        </div>
                        
                     </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
                    
                           
 




            
         
         <?php
         include 'footer.php';
         ?>
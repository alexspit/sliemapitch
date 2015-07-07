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



<?php 

include 'modals/edit_menuitem_modal.php';
include 'modals/add_menuitem_modal.php';
include 'modals/manage_menucategory_modal.php';
?>




<div class="row_4">  
        <div class="container">
            <div class="row">
                
                <div class="row">
                    <div class="col-lg-10 col-sm-8 col-xs-12">
                        <h2 id="menu_management_title">Menu Management</h2>
                    </div>
                    <div class="col-lg-2 col-sm-4 " >                        
                        <?php $categories->getDropDown(); ?>
                    </div>
                    
                </div>
                 
                <div id="showmenuitems"> 
                    <?php 
                    echo $menu->getMenuItems();
                   
                    ?>     
                    
                </div>
            
                                          
               
                <div style="height:20px; width:100%;"></div>
                
                
                <div class="col-sm-2 hidden-xs pull-right" style="margin-bottom: 10px">
                            <select name="limit" id="pagination_limit">
                               <option disabled="" selected="" style="display:none;">Items:</option>
                               <option value="5">5</option>
                               <option value="10">10</option>
                               <option value="25">25</option>
                               <option value="50">50</option>
                            </select>
                </div>
                
                <div class="col-lg-6">
                 
                              <button class="btn btn-primary "  style="float:none;"id="managemenucategory_button" type="button" value="Manage Categories" data-toggle="modal" data-target="#menucategorymodal">Manage Categories</button>
                              
                              <button class="btn btn-primary" style="float:none;" id="addmenuitem_button" type="submit" value="Add Menu Item" data-toggle="modal" data-target="#addmenumodal">Add Menu Item</button>
                     
                     
                </div>
                    <div class="col-lg-6">
                         
                       
                    </div>
                    
                </div>
                
                
               
            </div>
        </div>
    </div>
                    
                           
 




            
         
         <?php
         include 'footer.php';
         ?>
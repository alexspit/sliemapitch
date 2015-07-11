<!-- MANAGE CATEGORIES --->
<div class="modal fade" id="menucategorymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style='background-color: #e74c3c;'>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:white;"> Menu Categories Management</h4>
      </div>  
        
                <div class="modal-body">
                    
                     <div class="container-fluid">
                         <ul class="list-group" id="menu_categories">
                           <?php echo $categories->getList(); ?>
                         </ul>
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
                        
                      
                        
                        <div id="uploader">
                            <div class="js-fileapi-wrapper">
                                <input type="file" name="files[]" />
                            </div>
                            <div data-fileapi="active.show" class="progress">
                                <div data-fileapi="progress" class="progress__bar"></div>
                            </div>
                        </div>
                        <script>
                            jQuery(function ($){
                                $('#uploader').fileapi({
                                    url: '../process_data/upload.php',
                                    autoUpload: true,
                                    accept: 'image/*',
                                    multiple: true,
                                    maxSize: FileAPI.MB*10, // max file size
                                    onFileComplete: function(e, ui){
                                        console.log(e);
                                        console.log(ui);
                                    }
                                });
                            });
                        </script>

                     </div>   
                     
                </div>
                <div class="modal-footer">
                  
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                 
                </div>
       
    </div>
  </div>
</div>


$(document).ready(function() {


 //$('#datetimepicker').datetimepicker();
 
 $('#datetimepicker').datetimepicker({
 datepicker:true,
 allowTimes:[
  '12:00', '13:00', '14:00', '15:00', '16:00',
  '19:00', '20:00', '21:00', '22:00'
 ],
 minDate:'0'
});


 $('#date_timepicker_start').datetimepicker({
  format:'Y/m/d',
  onShow:function( ct ){
   this.setOptions({
    maxDate:jQuery('#date_timepicker_end').val()?jQuery('#date_timepicker_end').val():false
   })
  },
  timepicker:false
 });
 $('#date_timepicker_end').datetimepicker({
  format:'Y/m/d',
  onShow:function( ct ){
   this.setOptions({
    minDate:jQuery('#date_timepicker_start').val()?jQuery('#date_timepicker_start').val():false
   })
  },
  timepicker:false
 });


if (!$.cookie('firstVisit'))
{
    setTimeout(
        function() 
            {
                $('#myModal').modal('show');
            }, 3000);
        $.cookie('firstVisit', 0, { expires: 365, path: '/' });
}

$('.animated').autosize();

try{
$("#tostick").sticky({ topSpacing: -75,
                       wrapperClassName: 'visible-lg'});
}catch(err){console.log(err);}
                   
if ($(location).attr('pathname') == "/GitHub/sliemapitch/contact.php" )
{
        $("#scrollto_map").on("click", function(e){
            e.preventDefault();
            $('#map').animatescroll({scrollSpeed:500,easing:'easeOutQuart'});

        });
        
        $("body").on("#scrollto_map", "click", function(e){
            e.preventDefault();
            $('#map').animatescroll({scrollSpeed:500,easing:'easeOutQuart'});

        });

        $("#scrollto_getintouch").on("click", function(e){
            e.preventDefault();
            $('#getintouch').animatescroll({scrollSpeed:500,easing:'easeOutQuart'});

        });

        $("#scrollto_faqs").on("click", function(e){
            e.preventDefault();
            $('#faqs').animatescroll({scrollSpeed:500,easing:'easeOutQuart'});

        });
}


//$('#booking_confirmation_form input[type="checkbox"]').change(function() {
//{
   // if (this.checked){
if ($('#cb1').is(':checked'))
{
     $('#booking_confirmation_form textarea').hide();
}
else
{
     $('#booking_confirmation_form textarea').removeClass('bounceOutRight').addClass('bounceInLeft').slideDown();
}

$('#cb1').change(function() {

  if (this.checked){
   
        $('#booking_confirmation_form textarea').addClass('bounceOutRight').slideUp();
       // setTimeout( function() {$('#booking_confirmation_form textarea').slideUp();}, 200 );
    }
    else
    {
        $('#booking_confirmation_form textarea').removeClass('bounceOutRight').addClass('bounceInLeft').slideDown();
    }
    
});

$('#filter').change(function(e) {
   $this = $(this);
   
   if ($this.val() == "Status")
   {
       $('#options').val('Pending');
       $('.status').show();
       $('.period').hide();
       $('.no_of_diners').hide();
       $('.side').hide();
       
       
   }
   else if ($this.val() == "Period")
   {
       $('#options').val('Lunch');

       $('.status').hide();
       $('.period').show();
       $('.no_of_diners').hide();
       $('.side').hide();
   }
   else if ($this.val() == "No. of Diners")
   {
        $('#options').val('2');
      
       $('.status').hide();
       $('.period').hide();
       $('.no_of_diners').show();
       $('.side').hide();
   }
   else if ($this.val() == "Side")
   {
       
       $('#options').val('Prime Side');
       $('.status').hide();
       $('.period').hide();
       $('.no_of_diners').hide();
       $('.side').show();
   }
   else if ($this.val() == "No Filter")
   {
       
       $('#options').val('');
       $('.status').hide();
       $('.period').hide();
       $('.no_of_diners').hide();
       $('.side').hide();
   }
   $('#options').change();
});

$('#form #contact-form').submit(function(event){
    event.preventDefault();
    
    var startdate = $('#date_timepicker_start').val();
    var enddate = $('#date_timepicker_end').val();   
    var filter = $('#filter').val();
    var option = $('#options').val();
    var orderby = $('#orderby').val();
    var url = $(this).attr('action');
    
    
    // Send the data using post
    var posting = $.post( url, { order: orderby, startdate: startdate, enddate: enddate, filter: filter, option: option } );
 
    // Put the results in a div
    posting.done(function(data) {
   
    $("#showreservations").fadeOut(400, function() {
        $("#showreservations").empty().hide().append(data).fadeIn(400);
    });
    
    
  });

    //$('body').html($(this).serialize());
});

$('#getintouch #contact-form').submit(function(event){
    event.preventDefault();
    
    var name = $('#name').val();
    var email = $('#email').val();   
    var number = $('#phone').val();
    var comment = $('#comment').val();
    
    var url = "process_data/message_process_ajax.php";
    
    
    // Send the data using post
    var posting = $.post( url, { name: name, email: email, number: number, comment: comment } );
 
    // Put the results in a div
    posting.done(function(data) {
   
    $("#getintouch").fadeOut(400, function() {
        $("#getintouch").empty().hide().append(data).fadeIn(400);
    });
    
    
  });

    //$('body').html($(this).serialize());
});

$('#date_timepicker_start').change(function(){
    $('#form #contact-form').submit();
    $('.xdsoft_datetimepicker').hide();
});

$('#date_timepicker_end').change(function(){
    $('#form #contact-form').submit();
     $('.xdsoft_datetimepicker').hide();
});

$('#orderby').change(function(){
    $('#form #contact-form').submit();
});

$('#options').change(function(){
    $('#form #contact-form').submit();
});





//Menu Item 
//Adding new menu item
var add_errormessage = $('#add_errormessage');
add_errormessage.hide();
var edit_errormessage = $('#edit_errormessage');
edit_errormessage.hide();

$('#add_menuitem').submit(function(e){
    add_errormessage.removeClass('alert-danger');
    
    $('#add_menuitem input, #add_menuitem select, #add_menuitem textarea').each(function(){
        $(this).removeClass('error');
        $(this).removeClass('success');
        
    });
    
    e.preventDefault();
    var $this = $(this);
    var data = $this.serialize();
    var url = $this[0].action;
    var type = $this[0].method;
    
    $.ajax({
             type: type,
             url: url,
             data: data,
             success: function(data){
                        console.log(data);
                        if(data.success){                           
                             $('#showmenuitems').append(data.menuitem_string); 
                             $('#menu_category_filter').val(data.menuitem.category.category_id);
                             $('#menu_category_filter').trigger('change');
                             $('#addmenumodal').modal('hide');
                        }
                        else{
                            //console.log(data.errors);                        
                            $.each(data.errors, function( index, value ) {
                                                              
                                if(value.error == "add")
                                {
                                    add_errormessage.text(value.message).addClass('alert-danger').show(); 
                                }
                                if(value.error == "category"){
                                    $('#menuitem_category').addClass('error');
                                } 
                                if(value.error == "name"){
                                    $('#menuitem_name').addClass('error');
                                } 
                                if(value.error == "price"){
                                    $('#menuitem_price').addClass('error');
                                }
                                if(value.error == "description"){
                                    $('#menuitem_description').addClass('error');
                                }
                                
                              });
                            
                        }
                      },
             failure: function(errMsg) {
                 console.log("TEST"); 
                         alert(errMsg);
                      },
            });
})

//delete menu item
$('body').on("click", "a.menuitem_deletebtn",  function(e){
    e.preventDefault();
    var url = $(this).attr('href');
    
   $.ajax({
             type: 'get',
             url: url,
             success: function(data){
                 var menuitem = "#menuitem_"+data.id;
                 $(menuitem).remove();
             },
             failure: function(error){
                 alert(error);
             }
         });
});

//load menu item modal for editing
$('body').on("click", "a.menuitem_editbtn",  function(e){
    
    var id = $(this).data('id');
        
    $.ajax({
             type: 'get',
             url: '../process_data/load_menu_item.php',
             data: {id: id},
             success: function(data){
                 console.log(data);
                 $('#edit_menuitem_name').val(data.name);
                 $('#edit_menuitem_category').val(data.category.category_id);
                 $('#edit_menuitem_price').val(data.price);
                 $('#edit_menuitem_description').val(data.description);
                 if(data.vegetarian == "1"){
                      $('#edit_vegetarian').prop('checked', true);
                 }
                 if(data.gluten_free == "1"){
                      $('#edit_gluten_free').prop('checked', true);
                 }
                 if(data.spicy == "1"){
                      $('#edit_spicy').prop('checked', true);
                 }
                 if(data.featured == "1"){
                      $('#edit_featured').prop('checked', true);
                 }
                
                 $('#edit_menuitem').append('<input type="hidden" id="edit_menuitem_id" name="menuitem_id" value="'+data.item_id+'">');
             },
             failure: function(error){
                 alert(error);
             }
         });
});

//edit menu item
$('#edit_menuitem').submit(function(e){
   
    e.preventDefault();
    var $this = $(this);
    var data = $this.serialize();
    var url = $this[0].action;
    var type = $this[0].method;
    
        $.ajax({
             type: type,
             url: url,
             data: data,
             success: function(data){
                        console.log(data);
                        $('#showmenuitems').html(data.items);
                        $('#editmenumodal').modal('hide');
                      },
             failure: function(errMsg) {
                 console.log("TEST"); 
                         alert(errMsg);
                      },
            });
    
  
})



//resetting modals
$('.modal').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
    $('#add_errormessage').hide();
    
     $('#add_menuitem input, #add_menuitem select, #add_menuitem textarea').each(function(){
        $(this).removeClass('error');
        $(this).removeClass('success');
    });
});

function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

//Menu Category Management
//Adding new menu category
$('#add_menucategory').submit(function(e){
    e.preventDefault();
    var $this = $(this);
    var data = $this.serialize();
    var url = $this[0].action;
    var type = $this[0].method;
    
    //console.log(url);
    //console.log(type);

    $.ajax({
             type: type,
             url: url,
             data: data,
             success: function(data){
                console.log(data);
                        if(data.success){             
                                                    
                                var listitem = '<li data-id="'+data.category.category_id+'" class="list-group-item" id="menucategory_'+data.category.category_id+'">\n\
                                                    <a href="../process_data/delete_menu_category.php?id='+data.category.category_id+'"><span class="fa fa-trash-o pull-right animated pulse"></span></a>\n\
                                                    <p class="list-group-item-text"><span class="fa fa-arrows"></span>   '+capitalize(data.category.category_name)+'</p> \n\
                                                </li>';
                                $('#menu_categories').append(listitem); 
                                $('#menu_category_filter').append($('<option>', {value:data.category.category_id, text:data.category.category_name.toUpperCase()}));
                                $('#menuitem_category').append($('<option>', {value:data.category.category_id, text:data.category.category_name.toUpperCase()}));
                                $('#edit_menuitem_category').append($('<option>', {value:data.category.category_id, text:data.category.category_name.toUpperCase()}));
                                
                                $('#menucategory_name').val("");
                                
                              
                                $('#menu_categories').sortable();
                            
                                console.log($('#menu_category_filter'));
                                
                               
                        }
                        else
                        {
                            alert(data.message);
                        }
                      },
             failure: function(errMsg) {
                         alert(errMsg);
                      },

            });
})

try{
$('#menu_categories').sortable();
$('#menu_categories').sortable().bind('sortupdate', function() 
{
   
    var dataIDList = $('#menu_categories li').map(function(){ 
        return $(this).data("id");
    }).get();

    $.ajax({
             type: 'post',
             url: '../process_data/reorder_menu_category.php',
             data: {reordered_list: dataIDList},
             success: function(data){
                            console.log(data);
                      },
             failure: function(errMsg) {
                         alert(errMsg);
                      },

            });
   
   
});}
catch(err){console.log(err);}
/*
$('body').on("submit", ".menucategory_form",  function(e){
    e.preventDefault();
    
    if (confirm('If you delete a category, all menu items associated with that category will be deleted. Are you sure you want to delete this category?')) {
    // Save it!
    
    var $this = $(this);
    var data = $this.serialize();
    var url = $this[0].action;
    var type = $this[0].method;
    
    $.ajax({
             type: type,
             url: url,
             data: data,
             success: function(data){
                        if(data.success){             
                                $this.remove();    
                                
                                console.log( $('#menu_category_filter option[value="'+data.id+'"]'));
                                console.log('#menu_category_filter');
                                $('#menu_category_filter option[value="'+data.id+'"]').remove();
                                $('#menuitem_category option[value="'+data.id+'"]').remove();
                        }
                        else
                        {
                            alert(data.message);
                        }
                      },
             failure: function(errMsg) {
                         alert(errMsg);
                      },
            }); 
            
    } else {
        // Do nothing!
    }
});

*/


$('body').on("click", "#menu_categories a",  function(e){
    e.preventDefault();
    
    if (confirm('If you delete a category, all menu items associated with that category will be deleted. Are you sure you want to delete this category?')) {
    // Save it!
    
    var $this = $(this);
    var url = $this.attr('href');
    var type = 'get';
    
    $.ajax({
             type: type,
             url: url,
             success: function(data){
                        if(data.success){             
                                $this.parent().remove();    
                                
                                console.log( $('#menu_category_filter option[value="'+data.id+'"]'));
                                console.log('#menu_category_filter');
                                $('#menu_category_filter option[value="'+data.id+'"]').remove();
                                $('#menuitem_category option[value="'+data.id+'"]').remove();
                                $('#edit_menuitem_category option[value="'+data.id+'"]').remove();
                                
                                $('#menu_category_filter').val(0);
                                $('#menu_category_filter').trigger('change');
                              
                        }
                        else
                        {
                            alert(data.message);
                        }
                      },
             failure: function(errMsg) {
                         alert(errMsg);
                      },
            }); 
            
    } else {
        // Do nothing!
    }
});

/*
$('#addmenuitem_button').on('click', function(e){
    e.preventDefault();
    if (!$("#menu_category_filter option:selected").length) {
        alert("Not Selected");
    }
});

*/



$('#menu_category_filter').on('change', function(){
    
   var limit = $('#pagination_limit').val();
   var data = {id:$(this).val(), limit:limit};
    $.ajax({
             type: 'get',
             url: '../process_data/load_menu_items.php',
             data: data,
             success: function(data){
                 console.log(data.items);
                 //$('#showmenuitems').html(data.items);
                 $("#showmenuitems").fadeOut(400, function() {
                    //$("#showmenuitems").empty().hide().append(data).fadeIn(400);
                    $('#showmenuitems').html(data.items).fadeIn(400);
                 });
                 $('#menu_management_title').animatescroll({scrollSpeed:1000,easing:'easeOutQuart'});
             },
             failure: function(error){
                 alert('Error: '+error);
             }
         });
});





//////PAGINATION/////////////


//Making sure link tag is not clickable when disabled
$('body').on("click", ".pagination li a",  function(e){
    e.preventDefault();
    
    if(!$(this).parent().hasClass('disabled')){
        var $this = $(this);
        var page = $this.data('page');
        var limit = $('#pagination_limit').val();
        var category = $('#menu_category_filter').val();
        
        if (limit === null){
            limit = 10;
        }
        
        if (category === null){ 
            category = 0;
        }
        
        var data = {page:page, limit:parseInt(limit), category:parseInt(category)};
        console.log(data);
        $.ajax({
             type: 'get',
             url: '../process_data/paginate_menu_items.php',
             data: data,
             success: function(data){
                 console.log(data.items);
                 //$('#showmenuitems').html(data.items);
                 $("#showmenuitems").fadeOut(400, function() {
                    //$("#showmenuitems").empty().hide().append(data).fadeIn(400);
                    $('#showmenuitems').html(data.items).fadeIn(400);
                 });
                 
                 $('#menu_management_title').animatescroll({scrollSpeed:1000,easing:'easeOutQuart'});
             },
             failure: function(error){
                 alert('Error: '+error);
             }
         });
        
    }
    
});


$('#pagination_limit').on('change', function(){
    
   var limit = $(this).val();
   
   var page = $('.pagination li.active a').data('page');
   var category = $('#menu_category_filter').val();
        
        if (limit === null || typeof limit === 'undefined') {
    // the variable is defined
            limit = 10;
        }
        
        if (category === null || typeof category === 'undefined'){ 
            category = 0;
        }
        
        if (page === null || typeof page === 'undefined'){ 
            page = 1;
        }
        
        var data = {page:page, limit:parseInt(limit), category:parseInt(category)};
        
        
        console.log(data);
        $.ajax({
             type: 'get',
             url: '../process_data/paginate_menu_items.php',
             data: data,
             success: function(data){
                 console.log(data.items);
                 $("#showmenuitems").fadeOut(400, function() {
                    //$("#showmenuitems").empty().hide().append(data).fadeIn(400);
                    $('#showmenuitems').html(data.items).fadeIn(400);
                 });

                // $('#showmenuitems').html(data.items);
                 
                 $('#menu_management_title').animatescroll({scrollSpeed:1000,easing:'easeOutQuart'});
             },
             failure: function(error){
                 alert('Error: '+error);
             }
         });
});




///////////MENU FRONTEND////////////////////

$('.list9 li figure a').on('click', function(e){
    e.preventDefault();
    
    var cat = '#'+$(this).data('category');
    $(cat).animatescroll({scrollSpeed:1000,easing:'easeOutQuart', padding: 130});
    
});



$('#get_flight_data').click(function(e){
    
        $.ajax({
             type: 'post',
             url: 'http://localhost/GitHub/sliemapitch/process_data/xmlparser.php',
             success: function(data){
                 //console.log(data);
                 $('#flight_data').html("");
                var x = 1;
                var flight ="";
                
                            $.each(data.CWPReportRoster, function(index, value ) {
                                 console.log(value);
                                var dutyStart, dutyEnd, flyingStart, flyingEnd;
                                
                                if(typeof value.CheckInTime === 'string' && typeof value.CheckoutTime !== 'string'){
                                     flight = '<a href="#" class="list-group-item">'+x+'. '+value.RMDateDay+': '+value.ActivityInfo+' '+value.CheckInTime+' '+value.Origin+' - '+value.Destination;
                                     x++;
                                     dutyStart = new Date(value.ActivityDate);
                                      
                                      
                                   // $('#flight_data').append(flight);
                                     console.log(dutyStart);
                                 }
                                 
                                 if(typeof value.CheckInTime !== 'string' && typeof value.CheckoutTime === 'string'){
                                    
                                      flight += '  -  '+value.RMDateDay+': '+value.ActivityInfo+' '+value.CheckoutTime+' '+value.Origin+' - '+value.Destination+' Total Duty Period: </a>';
                                      dutyEnd = dutyStart = new Date(value.ActivityDate);
                                    console.log(dutyEnd);
                                   $('#flight_data').append(flight);
                                   
                                     console.log(value.CheckInTime);
                                 }
                                 
                                  
                                 
                                 
                               
                                
                              });
                      },
             failure: function(errMsg) {
                         alert(errMsg);
                      },
            }); 
    
})





}); // end ready
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


if ($(location).attr('pathname') == "/sliemapitch.com/contact.php" )
{
        $("#scrollto_map").on("click", function(e){
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



//Menu Category Management
//Adding new menu category
$('#add_menucategory').submit(function(e){
    e.preventDefault();
    var $this = $(this);
    var data = $this.serialize();
    var url = $this[0].action;
    var type = $this[0].method;
    
    console.log(url);
    console.log(type);
    
    $.ajax({
             type: type,
             url: url,
             data: data,
             success: function(data){
                        if(data.success){             
                                var form = '<div class="menu_category row" id="menu_category_'+data.category.category_id+'">\n\
                                                <form action="../process_data/delete_menu_category.php" method="post" id="form_'+data.category.category_id+'" class="menucategory_form">\n\
                                                      <div class="col-xs-9"><h3 class="blue">'+data.category.category_name+' </h3></div>\n\ \n\
                                                       <input type="hidden" name="id" value="'+data.category.category_id+'">\n\
                                                      <div class="col-xs-3"> <button class="btn btn-primary" type="submit"><span class="fa fa-trash-o"></span></button></div> \n\
                                                </form>\n\
                                               </div>';
                                $('#menu_categories').append(form); 
                                $('#menu_category_filter').append($('<option>', {value:data.category.catergory_id, text:data.category.category_name.toUpperCase()}));
                                $('#menucategory_name').val("");
                                
                               
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


$('body').on("submit", ".menucategory_form",  function(e){
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
                        if(data.success){             
                                $this.remove();    
                                $('#menu_category_filter option[value="'+data.id+'"]').remove();
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
    
    
});

$('#menu_category_filter').on('change', function(){
    var text = $("#menu_category_filter option:selected").text();
    $('#addmenuitem_header').text(text);
    $('#menuitem_category').val($(this).val());
    
})

$('#addmenuitem_button').on('click', function(e){
    e.preventDefault();
    if (!$("#menu_category_filter option:selected").length) {
        alert("Not Selected");
    }
});









}); // end ready
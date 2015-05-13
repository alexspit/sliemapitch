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




}); // end ready
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'db_connection.php';

/**
 * Description of product
 *
 * @author Alex
 */
class reservation {
    
    
    public $reservation_id;
    public $name;
    public $datetime;
    public $no_of_people;
    public $phone;
    public $email;
    public $area;
    public $comment; 
    public $date_added;
    public $date_modified;
    public $status;
    public $period;
    

        
       
  //  public function __construct($id, $name, $datetime, $no_of_people, $phone, $email, $area, $comment, $date_added, $status)
    public function __construct()
    {
        
        
      /*  $this->reservation_id = $id;
        $this->name = $name;
        
        $tmp_date = strtotime($datetime);
        $tmp_date_added = strtotime($date_added);
        
        $this->date = date( 'l jS F, Y', $tmp_date );
        $this->time = date( 'H:s', $tmp_date );
        $this->date_added = date( 'l jS F, Y', $tmp_date_added );
        $this->time_added = date( 'H:s', $tmp_date_added );
        
        $this->no_of_people = $no_of_people;
        $this->phone = $phone; 
        $this->status = $status;*/
    }
    
    public function getDate()
    {
        if (isset($this->datetime)){
        return date( 'l jS F, Y', strtotime($this->datetime) );
        }
        else{ return null;}
    }
    
    public function getShortDate()
    {
        if (isset($this->datetime)){
        return date( 'd/m/y', strtotime($this->datetime) );
        }
        else{ return null;}
    }
    
    public function getTime()
    {
        if (isset($this->datetime)){
        return date( 'H:s', strtotime($this->datetime) );
        }
         else{ return null;}
    }
    
    public function getPeriod()
    {
         $booking_hour = date('H', strtotime($this->datetime));
                                
         if ((int)$booking_hour <= 16){
            return "Lunch";    
         }
         else
         {
            return "Dinner";  
         }
    }
    
    public function getDateAdded()
    {
         if (isset($this->date_added)){
        return date( 'l jS F, Y', strtotime($this->date_added) );
        }
        else{ return null;}
    
     }
    
    public function getTimeAdded()
    {
        if (isset($this->date_added)){
        return date( 'H:s', strtotime($this->date_added) );
        }
        else{ return null;}
    }
    
    public function getDateModified()
    {
        if (isset($this->date_modified)){
        return date( 'l jS F, Y', strtotime($this->date_modified) );
        }
        else{ return null;}
    }
    
    public function getTimeModified()
    {
        if (isset($this->date_modified)){
        return date( 'H:s', strtotime($this->date_modified) );
        }
        else{ return null;}
    }
    
    public function getStatus()
    {
        if($this->status == 0)
          {
            return "Pending";
          }
         else if($this->status==1)
          {
            return "Approved";
          }
         else if($this->status==2)
          {
            return "Rejected";
          }                         
    }
  
    
   
    public function getPendingReservations()
    {
        $db = new db_connection();
        $link = $db->openConnection();
              
        $sql = "SELECT COUNT(bookings.status_id) AS pending_reservations FROM bookings INNER JOIN booking_status ON (booking_status.status_id=bookings.status_id) WHERE booking_status.status='pending'";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));          
        
        while ($row = mysqli_fetch_array($result))
        {
            $pending_reservations = $row['pending_reservations'];
        }
        $db->closeConnection(); 
        return $pending_reservations;
      
    }
      public function deleteBooking($id){
        
        $db = new db_connection();
         $link = $db->openConnection();
         
         $sql = "DELETE FROM bookings WHERE booking_id=$id";
         
         $result = mysqli_query($link, $sql) or die(mysqli_error($link)); 
         $success = ($result > 0 ? true : false); 
         $db->closeConnection(); 
        
        return $success;
    }
    
    public function checkIfExpired(){
        $msg="";
        $db = new db_connection();
        $link = $db->openConnection();
         
        $sql = "SELECT bookings.booking_id AS booking_id, bookings.date AS date, booking_status.status AS status FROM bookings INNER JOIN booking_status ON "
                . "(bookings.status_id = booking_status.status_id)";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
        // echo var_dump($result);
        while($row = mysqli_fetch_array($result))
                              {
                                $res = new reservation();
                                $res->datetime = $row['date'];
                                $res->reservation_id = $row['booking_id'];
                                $res->status = $row['status'];
                                
        
        date_default_timezone_set('Europe/Berlin');
        $currentDateTime = date('Y-m-d H:i:s', time());
        
        if ($res->datetime < $currentDateTime && $res->status != 'cancelled' && $res->status != 'expired'){
            
        
        $sql = ' UPDATE bookings SET status_id="5", date_modified="'.$currentDateTime.'" WHERE booking_id="'.$res->reservation_id.'"';
       
  
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
            if($result > 0){
                            $msg .= $res->reservation_id;
                           }
                           else{$msg = "nothing expired";}
        }
        }
        $db->closeConnection(); 
        
        return $msg;
    }
   
    /*
    public function checkIfExpired(){
        $msg="";
        $db = new db_connection();
        $link = $db->openConnection();
         
         $sql = "SELECT bookings.booking_id FROM bookings INNER JOIN booking_status ON (bookings.status_id = booking_status.status_id) WHERE date < NOW() AND booking_status.status <> 'cancelled'";
         $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
         
         while($row = mysqli_fetch_array($result))
         {
                                $res = new reservation();
                                
                                $res->reservation_id = $row['booking_id'];

        $sql = ' UPDATE bookings SET status_id="5", date_modified=NOW() WHERE booking_id="'.$res->reservation_id.'"';
       
  
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
            if($result > 0){
                            $msg .= $res->reservation_id;
                           }
                           else{$msg = "nothing expired";}
        }
        
        $db->closeConnection(); 
        
        return $msg;
    }*/
  
    //function used to filter and order reservations
    public function getSQL($startdate,$enddate,$orderby,$filter,$option)
    {
       $isRange;
       $getAll;
       $sql = "SELECT * FROM bookings INNER JOIN booking_status ON (bookings.status_id=booking_status.status_id) ";
       
       //Checking if it is a range of dates or just 1 date
       if (is_null($enddate)){
           $isRange = false;     
       }
       else {
           $isRange = true;
       }
       
       //Checking to get all bookings
       if (is_null($startdate) && is_null($enddate)){
           $getAll = true;
          
       }
       else if (is_null($startdate)){
           $getAll = true;
       }
       else{
           $getAll = false;
       }
       
       if (!$getAll && $isRange)
       {
           $sql .= "WHERE DATE(bookings.date) BETWEEN '$startdate' AND '$enddate' ";
       }
       else if (!$getAll && !$isRange)
       {
            $sql .= "WHERE DATE(bookings.date) = '$startdate' ";
       }
       else if ($getAll){
           $sql .= "WHERE bookings.booking_id >= 1 ";
       }
       else 
       {
           return "Wrong date format specified";
       }
       
       
       //Filtering reservations accrding to the filter options
       if (!is_null($filter) && !is_null($option))
       {
          switch (strtolower($filter)) {
            case "status":
                $sql .= "AND booking_status.status='$option' ";
                break;
            case "no. of diners":{
                if ($option >= 5)
                {$sql .= "AND bookings.no_of_people >=$option ";}
                else{
                $sql .= "AND bookings.no_of_people='$option' ";
                }
            break;}
            case "side":
               
                if (strtolower($option) == "no preference" )
                { $sql .= "AND bookings.side='' ";}
                else{
                 $sql .= "AND bookings.side='$option' ";
                }
                break;
            case "period":
                $sql .= "AND bookings.period='$option' ";
                break;
            case "no filter":
                
                break;
            default:
                return "Wrong filter specified";
            }
       }

       if (!is_null($orderby))
       {
           if(strtolower($orderby) == 'latest')
           {
               $sql .= "ORDER BY bookings.date_added DESC";
           }
           else  if(strtolower($orderby) == 'oldest') 
           {
               $sql .= "ORDER BY bookings.date_added ASC";
           }
           else { return "Wrong orderby option specified";}
       }
      
       return $sql;
    }
    
    public function getReservations($sql){
        $db = new db_connection();
                        
        $link = $db->openConnection();
        
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
                     
        $tmpstr = '<div id="result">';
        while($row = mysqli_fetch_array($result))
        {
           $res = new reservation();
           
           $res->reservation_id = $row['booking_id'];
           $res->name = $row['name'];
           $res->area = $row['side'];
           $res->period = $row['period'];
           $res->no_of_people = $row['no_of_people'];
           $res->status = $row['status'];
           $res->datetime = $row['date'];
           $res->date_added = $row['date_added'];
        
            
           $tmpstr .= '<div class="booking" >
                    <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                                        <h3 class="red booking-margin">'.$res->name.'</h3> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-6">
                                        <p class="booking-margin">'.$res->getShortDate().' for '.$res->period.'</p> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <p class="booking-margin">'.$res->area.' for '.$res->no_of_people.'</p> 
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-9">
                                        <a href="booking_confirmation.php?id='.$res->reservation_id.'#booking_confirmation" style="width: 100%" data-type="submit" class="'.$res->status.' btn btn-primary btn1">
                                            '.$res->status.' 
                                            <span class="glyphicon glyphicon-edit"></span> 
                                        </a>  
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
                                        <a href="../process_data/delete_booking.php?id='.$res->reservation_id.'" data-type="submit" class="'.$res->status.' btn btn-primary btn1">
                                             <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>       
                     </div>
                     <div class="row">
                                    <hr class="hidden-xs">
                                    <div class="hidden-xs col-sm-offset-8 col-sm-4"> 
                                         <p class="booking-details">Booked on '.$res->date_added.'</p> 
                                    </div>          
                     </div>
                 </div>';
                                
                             
    }
    
    $tmpstr .= '</div>';
    
    $db->closeConnection();
    
    echo $tmpstr;
    }
    
    }

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
class menu_item {
    
    public $item_id, $category_id, $category_name, $name, $description, $price, $item_img, $date_added, $last_edited, $vegitarian, $spicey, $gluten_free, $featured;
    
    public function __construct()
    {
          
    }
    
    
    public function addMenuItem()
    {
     
        $db = new db_connection();
        $link = $db->openConnection();
              
        $sql = "INSERT INTO menu_item (category_id, name, description, price, date_added, vegetarian, spicey, gluten_free, featured)"
                . "VALUES ($this->category_id, $this->name, $this->description, $this->price, $this->date_added, $this->vegitarian, $this->spicey, $this->gluten_free, $this->featured) ";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));          
        
        $item_id = mysqli_insert_id($link);
        $db->closeConnection(); 
        return $item_id;
      
    }
    public function deleteMenuItem($id){
        
        $db = new db_connection();
        $link = $db->openConnection();
         
        $sql = "DELETE FROM menu_item WHERE item_id=$id";
         
         $result = mysqli_query($link, $sql) or die(mysqli_error($link)); 
         $success = ($result > 0 ? true : false); 
         $db->closeConnection(); 
        
        return $success;
    }
    
      public function updateMenuItem(){
 
        date_default_timezone_set('Europe/Berlin');
        $currentDateTime = date('Y-m-d H:i:s', time());
        $db = new db_connection();
        $link = $db->openConnection();
         
        $sql = 'UPDATE menu_item SET category_id='.$this->category_id.', name="'.$this->name.'", description="'.$this->description.'", price='.$this->price.', last_edited="'.$currentDateTime.'", vegetarian='.$this->vegitarian.', spicey='.$this->spicey.', gluten_free='.$this->gluten_free.', featured='.$this->featured.''
                . 'WHERE item_id='.$this->item_id;
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
            if($result > 0){
                            $msg .= $res->reservation_id;
                           }
                           else{$msg = "nothing expired";}
        
        
        $db->closeConnection(); 
        
        return $msg;
    }
    
    
   
  
    public function getMenuItems($sql){
        $db = new db_connection();                      
        $link = $db->openConnection();
        
        $sql = "SELECT c.category_name, m.name
                FROM menu_item m
                INNER JOIN menu_category c ON ( c.category_id = m.category_id ) ";
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

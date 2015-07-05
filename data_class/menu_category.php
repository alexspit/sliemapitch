<?php

include_once 'db_connection.php';

/**
 * Description of product
 *
 * @author Alex
 */
class menu_category {
    
    public $category_id, $category_name, $category_img, $category_order;
    private $db;
    
    public function __construct($name = null)
    {
          $this->db = new db_connection(); 
          
          if ($name){
              if(is_numeric($name)) {
                    $this->category_id = $name;
              }
              else{
                    $this->category_name = $name;          
              }
              $this->get();
          }
          
          $this->category_img = "default.jpg";
          
 
    }
    
    public function add(){
        if($this){
            $link = $this->db->openConnection();
            $this->category_order = $this->count()+1;
            
            $sql = "INSERT INTO menu_category (category_name,category_img,category_order) VALUES ('$this->category_name', '$this->category_img', $this->category_order)";
            

            $result = mysqli_query($link, $sql) or die(mysqli_error($link));          

            $category_id = mysqli_insert_id($link);
            $this->db->closeConnection(); 
            return $category_id;
        }
    }
    
      public function delete(){
               
        $link = $this->db->openConnection();
         
        $sql = "DELETE FROM menu_category WHERE category_id=$this->category_id";
         
        $result = mysqli_query($link, $sql) or die(mysqli_error($link)); 
         
        $success = ($link->affected_rows > 0 ? true : false); 
        $this->db->closeConnection(); 
        
        return $success;
    }
    
    
    public function get(){
        $field = "";
         if(isset($this->category_name)){
             $field = "category_name";
         }
         else if (isset($this->category_id)){
             $field = "category_id";
         }
        
        
                           
        $link = $this->db->openConnection();
        
        if(isset($this->category_name)){
             $sql = "SELECT * FROM  `menu_category` WHERE category_name = '$this->category_name'";
         }
        else if (isset($this->category_id)){
            $sql = "SELECT * FROM  `menu_category` WHERE category_id = '$this->category_id'";
         }
        
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
                     
        while($row = mysqli_fetch_array($result))
        {
            $this->category_id = $row['category_id'];
            $this->category_img = $row['category_img'];
            $this->category_name = $row['category_name']; 
            $this->category_order = $row['category_order'];
        }
        $this->db->closeConnection();
        return $this;
   }
   
   
   public function getDropDown(){
        $link = $this->db->openConnection();
        
        $sql = "SELECT category_id, category_name FROM `menu_category` ORDER BY `category_order`";
        $string = '<select id="menu_category_filter" name="menu_category_filter" style="margin-top: 30px;" form="contact-form">
                               <option disabled="" selected="" style="display:none;">Menu Category:</option>
                               <option value="0">ALL</option>';
        
      
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
        
        while($row = mysqli_fetch_array($result))
        {  
            $string .= '<option value="'.$row['category_id'].'">'.strtoupper($row['category_name']).'</option>';  
        }
         
        $string .= '</select>';
         $this->db->closeConnection();
        
        echo $string;
  
   }
    
   public function getDropDownAddItem(){
        $link = $this->db->openConnection();
        
        $sql = "SELECT category_id, category_name FROM `menu_category` ORDER BY `category_order`";
        $string = '<select id="menuitem_category" name="menuitem_category" style="margin-bottom: 20px;" required>
                               <option disabled="" selected="" style="display:none;">Menu Category:</option>';
        
      
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
        
        while($row = mysqli_fetch_array($result))
        {
            
            $string .= '<option value="'.$row['category_id'].'">'.strtoupper($row['category_name']).'</option>';  
        }
         
        $string .= '</select>';
         $this->db->closeConnection();
        
        echo $string;
  
   }
   
       
   public function getDropDownEditItem(){
        $link = $this->db->openConnection();
        
        $sql = "SELECT category_id, category_name FROM `menu_category` ORDER BY `category_order`";
        $string = '<select id="edit_menuitem_category" name="menuitem_category" style="margin-bottom: 20px;" required>
                               <option disabled="" selected="" style="display:none;">Menu Category:</option>';
        
      
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
        
        while($row = mysqli_fetch_array($result))
        {
            
            $string .= '<option value="'.$row['category_id'].'">'.strtoupper($row['category_name']).'</option>';  
        }
         
        $string .= '</select>';
         $this->db->closeConnection();
        
        echo $string;
  
   }
    
     public function getList(){
        $link = $this->db->openConnection();
        
        $sql = "SELECT category_id, category_name FROM `menu_category` ORDER BY `category_order`";
      
        //$string = "";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
        $string =  '';
        
        while($row = mysqli_fetch_array($result))
        {
            
            //$string .= '<option value="'.$row['category_id'].'">'.ucwords($row['category_name']).'</option>';  
            
           /* $string .= '<div class="menu_category row" id="menu_category_'.$row['category_id'].'">
                    
                            <form action="../process_data/delete_menu_category.php" method="post" class="menucategory_form">
                                    <div class="col-xs-9">
                                        <h3 class="blue">'.ucwords($row['category_name']).'</h3> 
                                    </div>
                                    
                                    <div class="col-xs-3">
                                        <input type="hidden" name="id" value="'.$row['category_id'].'">
                                        <button class="btn btn-primary" type="submit"><span class="fa fa-trash-o"></span></button>  
                                    </div>                              
                             </form>
                        </div>';*/
            
            $string .= '<li data-id="'.$row['category_id'].'" class="list-group-item">
                                
                                <a href="../process_data/delete_menu_category.php?id='.$row['category_id'].'"><span class="fa fa-trash-o pull-right animated pulse"></span></a>
                                   
                                <p class="list-group-item-text"><span class="fa fa-arrows"></span>   '.ucwords($row['category_name']).'</p> 
                            </li>';
            
        }
        
       
         
         $this->db->closeConnection();
         
        
        
        echo $string;
  
   }
   
   public function count(){
        
        $link = $this->db->openConnection();
        
        $sql = "SELECT COUNT(*) AS total FROM `menu_category`";
         
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
                     
        while($row = mysqli_fetch_array($result))
        {
            $total = $row['total'];           
        }
        $this->db->closeConnection();
        return $total;
   }
   
   public function reorder($list){
        $link = $this->db->openConnection();
       
       $success = true;
       foreach ($list as $order => $id) {
            $order++;
            $sql = "UPDATE `menu_category` SET `category_order`=$order WHERE `category_id`=$id";

            $result = mysqli_query($link, $sql) or die(mysqli_error($link));    

            if($result <= 0){
                        $success = false;
            }                 
       }
      
        $this->db->closeConnection();
        return $success;
      
       
   }
   
   public function hasItems(){
        $link = $this->db->openConnection();
        
        $sql = "SELECT COUNT(item_id) AS total FROM menu_item WHERE category_id=$this->category_id";
         
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
                     
        while($row = mysqli_fetch_array($result))
        {
            $total = $row['total'];           
        }
        $this->db->closeConnection();
        if($total > 0){
            return true;
        }else{ return false; }
        
   }
  
    
}
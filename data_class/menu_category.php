<?php

include_once 'db_connection.php';

/**
 * Description of product
 *
 * @author Alex
 */
class menu_category {
    
    public $category_id, $category_name, $category_img;
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

            $sql = "INSERT INTO menu_category (category_name,category_img) VALUES ('$this->category_name', '$this->category_img')";


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
        }
        $this->db->closeConnection();
        return $this;
   }
   
   
   public function getDropDown(){
        $link = $this->db->openConnection();
        
        $sql = "SELECT category_id, category_name FROM `menu_category`";
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
        
        $sql = "SELECT category_id, category_name FROM `menu_category`";
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
    
     public function getList(){
        $link = $this->db->openConnection();
        
        $sql = "SELECT category_id, category_name FROM `menu_category`";
      
        $string = "";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
        
        while($row = mysqli_fetch_array($result))
        {
            
            //$string .= '<option value="'.$row['category_id'].'">'.ucwords($row['category_name']).'</option>';  
            
            $string .= '<div class="menu_category row" id="menu_category_'.$row['category_id'].'">
                    
                            <form action="../process_data/delete_menu_category.php" method="post" class="menucategory_form">
                                    <div class="col-xs-9">
                                        <h3 class="blue">'.ucwords($row['category_name']).'</h3> 
                                    </div>
                                    
                                    <div class="col-xs-3">
                                        <input type="hidden" name="id" value="'.$row['category_id'].'">
                                        <button class="btn btn-primary" type="submit"><span class="fa fa-trash-o"></span></button>  
                                    </div>                              
                             </form>
                        </div>';
        }
         
         $this->db->closeConnection();
        
        echo $string;
  
   }
    
}
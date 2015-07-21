<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'db_connection.php';
include_once 'menu_category.php';
include_once 'Paginator.php';


/**
 * Description of product
 *
 * @author Alex
 */
class menu_item {
    
    public $item_id, $category, $name, $description, $price, $date_added, $last_edited, $vegetarian, $spicy, $gluten_free, $featured, $thumbnail, $image;
    private $db;
    public function __construct($item_id = null)
    {
          $this->db = new db_connection();
          
           if ($item_id){   
              $this->item_id = $item_id;
              $this->get();
          }
          
          
    }
    
    
    public function get()
    {
        if(isset($this->item_id)){
            $link = $this->db->openConnection();
        
            $sql = "SELECT c.category_name, c.category_img, c.category_id, m.name, m.description, m.price, m.date_added, m.last_edited, m.vegetarian, m.spicy, m.gluten_free, m.featured, m.thumbnail, m.image
                    FROM menu_item m
                    INNER JOIN menu_category c ON ( c.category_id = m.category_id)
                    WHERE m.item_id = $this->item_id";
            
           
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
            
             while($row = mysqli_fetch_array($result))
            {
                $this->category = new menu_category($row['category_id']);
                
                $this->name = $row['name'];
                $this->description = $row['description'];
                $this->price = $row['price'];
                $this->date_added = $row['date_added'];
                $this->last_edited = $row['last_edited'];              
                $this->vegetarian = $row['vegetarian'];
                $this->spicy = $row['spicy'];
                $this->gluten_free = $row['gluten_free'];
                $this->featured = $row['featured']; 
                $this->thumbnail = $row['thumbnail'];
                $this->image = $row['image'];
                
            }
            $this->db->closeConnection();
            return $this;
        }
        else{
            return;
            
        }
        
        
    }
    
    public function addMenuItem()
    {    
       
        $link = $this->db->openConnection();
        
        
              
            $sql = "INSERT INTO menu_item (category_id, name, description, price, date_added, vegetarian, spicy, gluten_free, featured)"
                    . " VALUES (".$this->category->category_id.", '$this->name', '$this->description', $this->price, NOW(), $this->vegetarian, $this->spicy, $this->gluten_free, $this->featured) ";


            $result = mysqli_query($link, $sql) or die(mysqli_error($link));          

            $item_id = mysqli_insert_id($link);
            $this->db->closeConnection(); 
            return $item_id;
        
      
    }
    public function deleteMenuItem($id){
        
        
        $link = $this->db->openConnection();
         
        $sql = "DELETE FROM menu_item WHERE item_id=$id";
         
         $result = mysqli_query($link, $sql) or die(mysqli_error($link)); 
         
        
        //var_dump($result); exit;
         $success = ($link->affected_rows > 0 ? true : false); 
         $this->db->closeConnection(); 
        
        return $success;
    }
    
      public function updateMenuItem(){
 
        date_default_timezone_set('Europe/Berlin');
        $currentDateTime = date('Y-m-d H:i:s', time());
        
        $link = $this->db->openConnection();
         
        $sql = 'UPDATE menu_item SET category_id='.$this->category->category_id.', name="'.$this->name.'", description="'.$this->description.'", price='.$this->price.', last_edited="'.$currentDateTime.'", vegetarian='.$this->vegetarian.', spicy='.$this->spicy.', gluten_free='.$this->gluten_free.', featured='.$this->featured.''
                . ' WHERE item_id='.$this->item_id;
             
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
            
        $success = ($link->affected_rows > 0 ? true : false); 
        $this->db->closeConnection(); 
        
        return $success;
    }
    
    
   
  
    public function getMenuItems($limit = 10, $page = 1, $id = null){
        
        
                            
        $link = $this->db->openConnection();
        $sql = "SELECT c.category_id, c.category_name, m.name, m.price, m.item_id, m.date_added
                FROM menu_item m
                INNER JOIN menu_category c ON ( c.category_id = m.category_id )";
        
        if(isset($id) && $id != 0 && $id != "0" && $id != null)
        {
            
            $sql .= " WHERE m.category_id=$id";
        }
        
        $sql .= " ORDER BY m.date_added LIMIT ".($page - 1) * $limit.", ".$limit;
        
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
                   
        $tmpstr = '';
        $count = 0;
        while($row = mysqli_fetch_array($result))
        {
           $count++;
           $this->category = new menu_category($row['category_id']);
           
           $this->name = $row['name'];
           $this->item_id = $row['item_id'];
           $this->price = $row['price'];
           $this->date_added= $row['date_added'];
          
        
            
           $tmpstr .= '<div class="menu_item" id="menuitem_'.$this->item_id.'">
                    <div class="row">
                            
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <h3 class="red menu_item-margin">'.$this->name.'</h3> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-6">
                                        <p class=" menu_item-margin">&#8364;'.$this->price.'</p> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-6">
                                        <p class=" menu_item-margin">'.ucfirst($this->category->category_name).'</p> 
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-6">
                                        <a data-id="'.$this->item_id.'" href="#" data-toggle="modal" data-target="#editmenumodal" class="menuitem_editbtn btn btn-primary btn1">                                        
                                            <span class="glyphicon glyphicon-edit"></span> 
                                        </a>  
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-6">
                                        <a href="../process_data/delete_menu_item.php?id='.$this->item_id.'" class="menuitem_deletebtn btn-primary btn1">
                                           <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>   
                             
                     </div>
                     <div class="row">
                                    <hr class="hidden-xs">
                                    <div class="hidden-xs col-sm-offset-8 col-sm-4"> 
                                         <p class="menu_item-details">Added on '.$this->date_added.'</p> 
                                    </div>          
                     </div>
                 </div>';      
                
    }
    
    
     $sql2 = "SELECT COUNT(*) AS total FROM menu_item ";
        
     if(isset($id) && $id != 0 && $id != "0" && $id != null)
     {
            $sql2 .= " WHERE category_id=$id";
     }
     
     $result = mysqli_query($link, $sql2) or die(mysqli_error($link));    
     $total = 0;
      while($row = mysqli_fetch_array($result))
        {
           $total = $row['total'];
        }
   
    $this->db->closeConnection();
                 
    $p = new Paginator($total, $page, $limit);
    //$tmpstr .= $p->make();   
    
    $currNumber = ($total<$limit ? $total : $count);
    $tmpstr .= ' <div class="row">
                        <div class="col-sm-4 hidden-xs">
                            Showing <b>'.$currNumber.'</b> of <b>'.$total.'</b> item/s
                        </div>
                        <div class="col-sm-offset-1 col-sm-7 ">';
    $tmpstr .= $p->make();                         
    $tmpstr .= '        </div>'
            . '  </div>';
                       /*  <div class="col-sm-2 hidden-xs">
                           <select name="limit" id="pagination_limit">
                               <option disabled="" selected="" style="display:none;">Items:</option>
                               <option value="5">5</option>
                               <option value="10">10</option>
                               <option value="25">25</option>
                               <option value="50">50</option>
                            </select>
                        </div>
                       
                    </div>';*/
    
    //$tmpstr .= 
            
    return $tmpstr;
    }
    
    public function getMenuItemsFrontEnd($id=null){
                            
        $link = $this->db->openConnection();
      
        $sql = "SELECT DISTINCT(m.category_id) FROM menu_item m INNER JOIN menu_category c ON (m.category_id = c.category_id) ORDER BY c.category_order";
        
        $result = mysqli_query($link, $sql) or die(mysqli_error($link)); 
        
         
        $menuitemsStr = '';
        
        while($row = mysqli_fetch_array($result))
        {
              
           $this->category = new menu_category($row['category_id']);
           
           $menuitemsStr .= "<h2 id='".$this->category->category_name."' >".$this->category->category_name."</h2>";  
          
           $cat =  $this->category->category_id;
           $sql2 = "SELECT c.category_id, c.category_name, m.name, m.price, m.description, m.item_id, m.vegetarian, m.gluten_free, m.spicy, m.featured
                    FROM menu_item m
                    INNER JOIN menu_category c ON ( c.category_id = m.category_id )
                    WHERE m.category_id = $cat
                    ORDER BY m.featured DESC ";
        
           $result2 = mysqli_query($link, $sql2) or die(mysqli_error($link));   
           
           $count = 0;
           while($row = mysqli_fetch_array($result2)){
              $oddOrEven = ($count % 2 == 0 ? "even" : "odd");
               $count++;
               $this->name = $row['name'];
               $this->description = $row['description'];
               $this->price = $row['price'];
               $this->vegetarian = ($row['vegetarian'] > 0 ? true : false);
               $this->featured = ($row['featured'] > 0 ? true : false);
               $this->gluten_free = ($row['gluten_free'] > 0 ? true : false);
               $this->spicy = ($row['spicy'] > 0 ? true : false);
               $catName = $this->category->category_name;
               $menuitemsStr .=" <div class='$catName $oddOrEven category row'>
                  <div class='item col-sm-9'>
                    <h3 class='name'>$this->name";
                    
                    if($this->vegetarian){
                        $menuitemsStr .="  <span class='icon-leaf animated pulse' title='Vegetrian'></span>";
                    }
                    
                    if($this->spicy){
                        $menuitemsStr .="<span class='icon-flame animated pulse' title='Spicy'></span>";
                    }
                   
                    if($this->gluten_free){
                        $menuitemsStr .=" <span class='icon-gluten1 animated pulse' title='Gluten Free'></span>";
                    }   
               $menuitemsStr .="</h3>
                    <p class='description'>$this->description </p></div>
                  <div class='price col-sm-3'>
                    <p class='price'>$this->price €</p>
                  </div>
                </div>";
               
               
           }        
    }
   
   
    $this->db->closeConnection();
                  
    return $menuitemsStr;
    }
    
     
    public function getMenuCategoriesFrontEnd(){
        
        
                            
        $link = $this->db->openConnection();
      
        $sql = "SELECT DISTINCT(m.category_id) FROM menu_item m INNER JOIN menu_category c ON (m.category_id = c.category_id) ORDER BY c.category_order";
        
        $result = mysqli_query($link, $sql) or die(mysqli_error($link)); 
        $count = $result->num_rows;
        $x = true;
        $menuCategoriesStr = '<ul class="list9 visible-lg" id="tostick"><div class=row">';           
        $menuitemsStr = '';
        
        while($row = mysqli_fetch_array($result))
        {
           
          
           
           $this->category = new menu_category($row['category_id']);
         
          if($x){
           $x = false;
           $menuCategoriesStr .= '<li class="col-lg-offset-1 col-lg-1 collist6">
                                    <figure><a id="cat_'.$this->category->category_name.'" data-category="'.$this->category->category_name.'" href="#'.$this->category->category_name.'"><img src="img/menu/categories/'.$this->category->category_img.'" alt=""><span><em></em></span></a></figure>
                                    <h3>'.$this->category->category_name.'</h3>
                                  </li>';    
           }else{
                $menuCategoriesStr .= '<li class="col-lg-1 collist6">
                                    <figure><a id="cat_'.$this->category->category_name.'" data-category="'.$this->category->category_name.'" href="#'.$this->category->category_name.'"><img src="img/menu/categories/'.$this->category->category_img.'" alt=""><span><em></em></span></a></figure>
                                    <h3>'.$this->category->category_name.'</h3>
                                  </li>';    
           }
        }
    
        $menuCategoriesStr .= '</div></ul>';
   
        $this->db->closeConnection();
                  
        return $menuCategoriesStr;
    }
    
    
    
    public function getFeaturedItemsFirst(){
                            
        $link = $this->db->openConnection();
      
        $sql = "SELECT * FROM menu_item WHERE featured=1 ORDER BY date_added";
        
        $result = mysqli_query($link, $sql) or die(mysqli_error($link)); 
        
        $array = array();
        $str = '';
        $count = $result->num_rows;
        
        if($count < 4){
            //return "show nothing";
            return;
        }
        else if($count >= 4){
            //return "show first 4";
            $count = 4;
            
            for ($i = 0; $i < $count; $i++) {
                $row = mysqli_fetch_array($result);
                
                $image = "img/menu/featured/".$row['image'];
                $thumbnail = "img/menu/featured/".$row['thumbnail'];
                $category = new menu_category($row['category_id']);
                
                 $str .='                 <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist1">
                                                <figure><a href="'.$image.'" class="thumb"><img src="'.$thumbnail.'" alt=""><span><em></em></span></a></figure>
                                                <div class="wow animated fadeInDown" data-wow-duration="700ms" data-wow-delay="100ms">
                                                    <strong>'.$row['name'].'</strong>
                                                    <a data-category="'.$category->category_name.'" href="menu.php">View '.$category->category_name.' menu</a>
                                                </div>
                                          </li>'; 
            }
        }
        else{
            return;
        }
       
       
   
        $this->db->closeConnection();
                  
    return $str;
    }
    
    
    }

<?php
/**
 * Description of dbConnection
 *
 * @author Alex
 */

class db_connection {
    
    private $conn;
     
    function openConnection()
    {
        $host = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "sliemapitchdb";
        
        $this->conn = mysqli_connect($host, $username, $password, $dbname) or die(mysqli_error());
        return $this->conn;
    } // End of openConnection.
    
    function closeConnection()
    {
        mysqli_close($this->conn);
        $this->conn = null;
    } // End of closeConnection.
    
    function filter($data)
        {
          $data = trim($data);//Removes spaces from front and back of string
          $data = stripslashes($data); //Removes backslashes which can be used to maliciausly alter the data
          $data = htmlspecialchars($data); //Anti Script injection
          $data = strip_tags($data);
          $data = htmlentities($data);
          
          return $data;
        }
    
  /* function isLoggedIn() {
		if(isset($_SESSION['session_id']) && !empty($_SESSION['session_id']))
                {
                    return customers::GetUserFromSessionID($_SESSION['session_id']);
                }
                else
                {
                    return false;
                }
	}
        
         function isAdmin() {
		if(isset($_SESSION['session_id']) && !empty($_SESSION['session_id']))
                {
                    return customers::checkAdminWithSessionID($_SESSION['session_id']);
                }
                else
                {
                    return false;
                }
	}*/
}

?>
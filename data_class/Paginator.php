<?php

include_once 'db_connection.php';

/**
 * Description of product
 *
 * @author Alex
 */
class Paginator {
    
    private $_db, $_limit, $_currentPage, $_total, $_numOfLinks, $_firstPage, $_lastPage;
   
    public function __construct($total, $currentPage = 1, $limit = 10, $numOfLinks = 3)
    {
          $this->_db = new db_connection(); 
          $this->_limit = $limit;
          $this->_currentPage = $currentPage;
          $this->_total = $total;
          $this->_numOfLinks = $numOfLinks;
          $this->_firstPage = 1;
          $this->_lastPage = ceil($this->_total / $this->_limit);
    }
    
    public function make(){
                
        /*$start      = ( ( $this->_currentPage - $this->_numOfLinks ) > 0 ) ? $this->_currentPage - $this->_numOfLinks : 1;
        $end        = ( ( $this->_currentPage + $this->_numOfLinks ) < $this->_lastPage ) ? $this->_currentPage + $this->_numOfLinks : $this->_lastPage;

        $html       = '<ul class="pagination pull-right" style="margin: 0px">';

        $class      = ( $this->_currentPage == 1 ) ? "disabled" : "";
        $html       .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ( $this->_currentPage - 1 ) . '">&laquo;</a></li>';

        if ( $start > 1 ) {
            $html   .= '<li><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
            $html   .= '<li class="disabled"><span>...</span></li>';
        }

        for ( $i = $start ; $i <= $end; $i++ ) {
            $class  = ( $this->_currentPage == $i ) ? "active" : "";
            $html   .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
        }

        if ( $end < $this->_lastPage ) {
            $html   .= '<li class="disabled"><span>...</span></li>';
            $html   .= '<li><a href="?limit=' . $this->_limit . '&page=' . $this->_lastPage . '">' . $this->_lastPage . '</a></li>';
        }

        $class      = ( $this->_currentPage == $this->_lastPage ) ? "disabled" : "";
        $html       .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ( $this->_currentPage + 1 ) . '">&raquo;</a></li>';

        $html       .= '</ul>';

        return $html;*/
        
        $start      = ( ( $this->_currentPage - $this->_numOfLinks ) > 0 ) ? $this->_currentPage - $this->_numOfLinks : 1;
        $end        = ( ( $this->_currentPage + $this->_numOfLinks ) < $this->_lastPage ) ? $this->_currentPage + $this->_numOfLinks : $this->_lastPage;

        $html       = '<ul class="pagination pull-right" style="margin: 0px">';

        $class      = ( $this->_currentPage == 1 ) ? "disabled" : "";
        $html       .= '<li class="' . $class . '"><a data-page="' . ( $this->_currentPage - 1 ) . '" href="?page=' . ( $this->_currentPage - 1 ) . '">&laquo;</a></li>';

        if ( $start > 1 ) {
            $html   .= '<li><a data-page="1" href="?page=1">1</a></li>';
            $html   .= '<li class="disabled"><span>...</span></li>';
        }

        for ( $i = $start ; $i <= $end; $i++ ) {
            $class  = ( $this->_currentPage == $i ) ? "active" : "";
            $html   .= '<li class="' . $class . '"><a data-page="' . $i . '" href="?page=' . $i . '">' . $i . '</a></li>';
        }

        if ( $end < $this->_lastPage ) {
            $html   .= '<li class="disabled"><span>...</span></li>';
            $html   .= '<li><a data-page="' . $this->_lastPage . '" href="?page=' . $this->_lastPage . '">' . $this->_lastPage . '</a></li>';
        }

        $class      = ( $this->_currentPage >= $this->_lastPage ) ? "disabled" : "";
        $html       .= '<li class="' . $class . '"><a data-page="' . ( $this->_currentPage + 1 ) . '" href="?page=' . ( $this->_currentPage + 1 ) . '">&raquo;</a></li>';

        $html       .= '</ul>';

        
       
        return $html;
    }
    
    
}
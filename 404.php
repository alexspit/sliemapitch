<?php
include "header.php";?>
<!--==============================content=================================-->
<div id="content">
    <!--==============================row_11=================================-->   
    <div class="row_11"> 
        <div class="container">
          <div class="row block-404">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <figure><img src="img/404.jpg" alt=""></figure>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 forminfo">
                <div>
                    <h2 class="title404_1"><strong>Sorry!</strong><br>Page not found</h2>
                    <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                    <p>Please try using our search box below to look for information on the website.</p>
                    <form id="search-form2" action="search.php" method="GET" accept-charset="utf-8" class="form-404 clearfix" >
                        <input type="text" name="s" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''"  >
                        <a href="#" class="btn btn-primary btn1" onClick="document.getElementById('search-form2').submit()">search</a>
                    </form>
                </div>
            </div>  
          </div> 
        </div>
    </div>  

</div>
<?php
include "footer.php";?>

<div class="col-md-4">

    <!-- Blog Search Well -->
<div class="well">
 <form  action="search.php" method="post">
    <h4>Search</h4>
    <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
  </form><!--search form-->
    <!-- /.input-group -->
</div>



   <!-- login -->
<div class="well">
<form  action="includes/login.php" method="post">
    <h4>Login</h4>
    <div class="form-group">
        <input name="username" type="text" class="form-control" placeholder="Enter username">
    </div>
    <div class="input-group">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="input-group-btn">
<button class="btn btn-primary" name="login" type="submit">submit
</button>

        </span>
    </div>

</form><!--login form-->
    <!-- /.form-group -->
</div>


  <!-- Blog Categories Well -->
  <div class="well"> 
<?php
     $query = "SELECT * FROM categories  ";
     $select_categories_sidebar = mysqli_query($connection,$query);            
    ?>





    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
 <?php
while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
$cat_title=$row['cat_title'];  
$cat_id=$row['cat_id'];  
        echo "<li><a href='category.php?category= $cat_id'>{$cat_title}</a></li>";
    
    }

  ?>         
        </div>
         </ul>       
        </div>
        <!-- /.col-lg-6 -->
    </div>
    

     <!-- Side Widget Well -->
     <?php include "includes/widget.php" ?>

    </div>
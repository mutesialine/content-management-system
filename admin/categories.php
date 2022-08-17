<?php  include "includes/admin_header.php";?>
    <div id="wrapper">

        <!-- Navigation -->
       
        <?php  include "includes/admin_navigation.php";?> 

        <div id="page-wrapper">

            <div class="container-fluid">
       
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                      <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">
                       <?php insert_categories();?> 

                       <form  action="#" method="post">
                       <div  class="form-group">
                        <label  for="cat_title">Add Category</label>   
                           <input type="text" class="form-control" name="cat_title">
                       </div>
                       <div  class="form-group">
                           <input class="btn  btn-primary" type="submit" name="submit" value="add category">
                        </div>
                       </form>  
                             <?php //update data and include  query
                             if(isset($_GET['edit']))
                             $cat_id=$_GET['edit'];
                             ?>
                        </div>
                       <div class="col-xs-6">  
                       <form  action="#" method="post">
                       <div  class="form-group">
                        <label  for="cat_title"></label>


                        <?php //Updating data
                        if (isset($_GET['edit'])){
                            $cat_id=$_GET['edit'];
                            $query = "SELECT * FROM categories WHERE cat_id=$cat_id ";
                            $select_categories_id = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($select_categories_id)){
                              $cat_id=$row['cat_id'];
                               $cat_title=$row['cat_title'];
                                        
                        ?>
                     <input value="<?php if(isset($cat_title)){echo $cat_title; }?>" type="text" class="form-control"  name="cat_title" >
                      <?php }} ?>

          <?php //update query
          if(isset($_POST['update_category'])){
            $the_cat_title= $_POST['cat_title'];
            $query=" UPDATE  categories SET cat_title= '{$the_cat_title}' WHERE cat_id={$cat_id}";
            $update_query=mysqli_query($connection,$query);
            if(!$update_query){
                die("QUERY FAILED".mysqli_error($connection));
            }
            
        }
         

         ?>

                       </div>
                       <div  class="form-group">
                           <input class="btn  btn-primary" type="submit" name="update_category" value="update category">
                           </div>

                       </form>  

                               <table class="table  table-bordered  table-nover">
                                   <thead>
                                       <tr>
                                           <th>ID </th>
                                           <th>CATEGORY TITLE </th>
                                       </tr>
                                   </thead>
                                   <tbody>


<?php  findAllCategories(); //adding all categories ?>
<?php deleteCategory(); //deleting categories ?>
         </tbody>
    </table>        
                    </div>
<?php
if(isset($_GET['p_id'])){
     $the_post_id=$_GET['p_id'];}

                $query = "SELECT * FROM post WHERE post_id=$the_post_id ";
                $select_post_by_id = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_post_by_id)){       
                   $post_id=$row['post_id'];
                   $post_author=$row['post_author'];
                   $post_title=$row['post_title'];
                   $post_category_id=$row['post_category_id'];
                   $post_status=$row['post_status'];
                   $post_image=$row['post_image'];
                   $post_tags=$row['post_tags'];
                   $post_comment_count=$row['post_comment_count'];
                   $post_date=$row['post_date'];
                   $post_content=$row['post_content'];
                  }
                  if(isset($_POST['create_post'])){
                    $post_author=$_POST['post_author'];
                    $post_title=$_POST['post_title'];
                    $post_category_id=$_POST['post_category'];
                    $post_status=$_POST['post_status'];
                   //$post_image=$_FILES['image']['name'];
                  // $post_image_temp=$_FILES['image']['tmp_name'];
                    $post_tags=$_POST['post_tags'];
                    $post_comment_count=3;
                    $post_content=$_POST['post_content'];
               //  move_uploaded_file($post_image_temp, "../images/$post_image"); 
                   // if(empty($post_image)){
                   // $query="SELECT * FROM post WHERE post_id=$the_post_id";
                   // $select_image=mysqli_query($connection,$query);
                   // while($row=mysqli_fetch_array($select_image)){
                    //  $post_image=$row['post_image'];
                   // }
                   // }
                    $query= "UPDATE  post SET
                    post_title= '$post_title',
                    post_category_id= '$post_category_id', 
                    post_author= '$post_author', 
                    post_date= now(), 
                    post_content= '$post_content',
                    post_tags= '$post_tags',
                    post_status= '$post_status',
                    post_image= '$post_image' 
                    WHERE post_id = '$the_post_id' ";
                    $create_post= mysqli_query($connection,$query);
                    confirmQuery($create_post);
                   echo "<p class='bg-success'>Post  Updated.   <a href='../post.php?p_id={$the_post_id}'>view post</a> or <a href='post.php'>edit more post</a></p>";
                  }
?>


<form action= ""  method="post" enctype="multipart/form-data">
 <div  class="form-group">
   <label for="post_title">Post title</label>
      <input value= "<?php echo $post_title;?>"   type="text" name="post_title" class="form control">
</div>

<div  class="form-group">
<select name="post_category" id="post_category">
  
  <?php 

        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection,$query);

          confirmQuery($select_categories); 

        while($row = mysqli_fetch_assoc($select_categories)){
          $cat_id=$row['cat_id'];
           $cat_title=$row['cat_title'];
           echo "<option value='{$cat_id}'>{$cat_title} </option>";
            }

    ?>
</select>
</div>

<div  class="form-group">
<label for="post_author"> Author</label>
<input value= "<?php echo $post_author;?>" type="text" name=" post_author" class="form control">
</div>


<div  class="form-group">
<label for="post_status"> Post Status</label>
<input value= "<?php echo $post_status;?>" type="text" name="post_status" class="form control">
</div> 
<div  class="form-group">
<label for="post_tags"> Post Tags</label>
<input value= "<?php echo $post_tags;?>" type="text" name=" post_tags" class="form control">
</div>

<div  class="form-group">
<img  width="100"src="ii./images/<?php echo $post_image ?>" alt="">
</div>

<div  class="form-group">
<label for="post_content"> Post Content</label>
<textarea class="form-control" name="post_content" id="body" cols="30" rows="10">
<?php echo $post_content;?>
</textarea>
</div>

<div  class="form-group">
<input type="submit" name="create_post" class="btn btn-primary" value="publish post">
</div>

</form>
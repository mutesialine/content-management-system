<?php

if(isset($_POST['create_post'])){

    $post_author=$_POST['post_author'];
    $post_title=$_POST['post_title'];
    $post_category_id=$_POST['post_category'];
    $post_status=$_POST['post_status'];
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    $post_tags=$_POST['post_tags'];
    $post_comment_count=3;
    $post_date=date ('d-m-y');
    $post_content=$_POST['post_content'];

move_uploaded_file($post_image_temp,"../images/$post_image"); 

 $query= "INSERT INTO post (post_category_id, post_title, post_author, post_date,post_image, post_content,post_tags, post_comment_count,post_status)";
 
 $query .="VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_comment_count}','{$post_status}')";
 $create_post_query= mysqli_query($connection,$query);
 
 confirmQuery($create_post_query);
}
?>

<form action= ""  method="post" enctype="multipart/form-data">
 <div  class="form-group">
   <label for="post_title">Post title</label>
      <input type="text" name="post_title" class="form control">
</div>

<div  class="form-group">
  <label for="post_category">post category</label>
<select name="post_category" id="">
  
  <?php 

        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection,$query);

          confirmQuery($select_categories); 

        while($row = mysqli_fetch_assoc($select_categories)){
          $cat_id=$row['cat_id'];
           $cat_title=$row['cat_title'];
           echo "<option value='$cat_id'>{$cat_title} </option>";
            }

    ?>
</select>
</div>

<div  class="form-group">
<label for="post_author"> Author</label>
<input type="text" name=" post_author" class="form control">
</div>
<div  class="form-group">
<label for="post_status"> Post Status</label>
<input type="text" name="post_status" class="form control">
</div>
<div  class="form-group">
<label for="post_tags"> Post Tags</label>
<input type="text" name=" post_tags" class="form control">
</div>

<div  class="form-group">
<label for="post_image"> Post Image</label>
<input type="file" name="image" class="form control">
</div>

<div  class="form-group">
<label for="post_content"> Post Content</label>
<textarea  class="form-control" name="post_content" id="body" cols="30" rows="10"></textarea>
</div>

<div  class="form-group">
<input type="submit" name="create_post" class="btn btn-primary" value="publish post">
</div>
</form>
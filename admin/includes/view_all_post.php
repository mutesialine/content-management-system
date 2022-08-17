<?php
if(isset($_POST['checkBoxArray'])){
 foreach($_POST['checkBoxArray'] as $postValueId)
 $bulk_options = $_POST['bulk_options'];
 switch($bulk_options){
     case 'published':
     $query="UPDATE post set post_status='{$bulk_options}' WHERE post_id='$postValueId'";
     $update_to_published_status =mysqli_query($connection ,$query);
     confirmQuery($update_to_published_status);
     break;
 }
}
?>
<form action="" method='post'>
<table class="table  table-bordered table-hover">
           <div id="bulkOptionContainer" class="col-xs-4">
          <select  class= "form-control" name="bulk_options" id="">
        <option value="" id="">select options </option>
        <option value="published" id="">publish </option>
        <option value="draft" id="">Draft </option>
        <option value="delete" id="">Delete </option>
          </select>
           </div>
           <div class="col-xs-4">
            <input type ="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="add_post.php">Add New </a>
            </div>
             <thead>
                <tr>
                   <!-- <th> <input id="selectAllBoxes" type="checkboxes"></th> !-->
                     <th></th>
                    <th>Post Id</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th> Caategory id</th>
                    <th>Category</th>
                    <th>status</th>
                    <th>Tags</th>
                    <th>Image</th>
                    <th>comments</th>
                    <th>DATE</th>
                </tr>
            </thead>

            <tbody>
                <?php
            $query = "SELECT * FROM post  ";
                $select_post = mysqli_query($connection,$query);
                           
 while($row = mysqli_fetch_assoc($select_post)){
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
                   echo "<tr>";
                   ?>

                   <td><input  class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo "$post_id";?>'></td>

                   <?php
                  
                   echo "<td>$post_id</td>";
                   echo "<td>$post_author</td>";
                   echo "<td>$post_title</td>";
                   echo "<td>{$post_category_id}</td>";
                   $query = "SELECT * FROM categories WHERE cat_id={$post_category_id} ";
                   $select_categories_id = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($select_categories_id)){
                    $cat_id=$row['cat_id'];
                   $cat_title=$row['cat_title'];
                    echo "<td>{'$cat_title'}</td>";    
                    }  
                   echo "<td>$post_status</td>";
                   echo "<td>$post_tags</td>";
                   echo "<td><img width='100' src='../images/$post_image'alt='img1'</td>";
                   echo "<td>$post_comment_count</td>";
                   echo "<td>$post_date</td>";
                   echo "<td><a href= post.php?source=edit_post.php&p_id={$post_id} >Edit</a></td>";
                   echo "<td><a href= post.php?delete={$post_id} >delete</a></td>";
                   
                }

                ?>

            
       </tbody>
        </table>
            </form>
        <?php
        if(isset($_GET['delete'])){
            $the_post_id= $_GET['delete'];
            $query="DELETE FROM post WHERE post_id= {$the_post_id}";
            $delete_query=mysqli_query($connection,$query);
        }
        ?>
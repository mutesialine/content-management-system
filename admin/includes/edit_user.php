<?php
if(isset($_GET['p_id'])){
     $the_user_id=$_GET['p_id'];}

                $query = "SELECT * FROM users WHERE user_id=$the_user_id ";
                $select_user_by_id = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_user_by_id)){       
                    $user_id=$row['user_id'];
                    $username=$row['username'];
                    $user_firstname=$row['user_firstname'];
                    $user_lastname=$row['user_lastname'];
                    $user_password=$row['user_password'];
                    $user_email=$row['user_email'];
                    $user_image=$row['user_image'];
                    $user_role=$row['user_role'];
                  }
                  if(isset($_POST['create_user'])){
                  $username=$_POST['username'];
                  $user_firstname=$_POST['user_firstname'];
                  $user_lastname=$_POST['user_lastname'];
                  $user_password=$_POST['user_password'];
                  //$user_date=date ('d-m-y');
                  $user_email=$_POST['user_email'];
                  $user_role=$_POST['user_role'];
                  $user_image=$_FILES['image']['name'];
                  $user_image_temp=$_FILES['image']['tmp_name'];
                   
               
                    $query= "UPDATE users SET
                    username='$username',
                    user_firstname='$user_firstname',
                    user_lastname='$user_lastname',
                    user_password='$user_password',
                    user_email='$user_email',
                    user_role='$user_role',
                    user_image='$user_image'

                    WHERE user_id = '$the_user_id' ";
                    $create_user= mysqli_query($connection,$query);
                    confirmQuery($create_user);
                  }

?>

<form action= ""  method="post" enctype="multipart/form-data">
<div  class="form-group">
<label for="user_firstname"> Firstname</label>
<input  value="<?php echo $user_firstname;?>" type="text" name="user_firstname" class="form control">
</div>

<div  class="form-group">
<label for="user_lastname"> Lastname</label>
<input  value="<?php echo $user_lastname;?>" type="text" name=" user_lastname" class="form control">
</div>

<div  class="form-group">
<label for="username"> Username</label>
<input  value="<?php echo $username;?>" type="text" name=" username" class="form control">
</div>

<div  class="form-group">
<label for="user_password"> password</label>
<input  value="<?php echo $user_password;?>" type="text" name=" user_password" class="form control">
</div>
  
<div  class="form-group">
<label for="user_email"> Email</label>
<input  value="<?php echo $user_email;?>" type="text"  name="user_email" class="for control"  >
</div>

<div  class="form-group">
<select name="user_role" id="">
<option  value="subscriber"> <?php   echo $user_role ;?></option>

<?php 
if($user_role == 'admin'){
   echo" <option value= 'subscriber'>subscriber</option>";
  }else{
    echo "<option value='admin'>admin</option>";
}
?>
</select>
</div>

<div  class="form-group">
<label for="user_image"> user Image</label>
<input value="<?php echo $user_image;?>" type="file" name="image" class="form control">
</div>


<div  class="form-group">
<input type="submit" name="create_user" class="btn btn-primary" value="Update user">
</div>
</form>

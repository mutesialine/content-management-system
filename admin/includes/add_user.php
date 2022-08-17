<?php

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
move_uploaded_file($user_image_temp,"../images/$user_image"); 

 $query= " INSERT INTO users ( username, user_firstname ,user_lastname,user_password,user_email,user_role,user_image)";
 
 $query .="VALUES( '{$username}','{$user_firstname}','{$user_lastname}','{$user_password}','{$user_email}','{$user_role}','{$user_image}')";
 $create_user_query= mysqli_query($connection,$query);
 
 confirmQuery($create_user_query);
 echo "user created:". " ". "<a href='users.php'>view users </a> ";
}
?>

<form action= ""  method="post" enctype="multipart/form-data">
<div  class="form-group">
<label for="user_firstname"> Firstname</label>
<input type="text" name="user_firstname" class="form control">
</div>

<div  class="form-group">
<label for="user_lastname"> Lastname</label>
<input type="text" name=" user_lastname" class="form control">
</div>

<div  class="form-group">
<label for="username"> Username</label>
<input type="text" name=" username" class="form control">
</div>

<div  class="form-group">
<label for="user_password"> password</label>
<input type="text" name=" user_password" class="form control">
</div>
  
<div  class="form-group">
<label for="user_email"> Email</label>
<input type="text"  name="user_email" class="for control"  >
</div>

<div  class="form-group">
<select name="user_role" id="">
<option  value="subscriber">select option</option>
<option  value="Admin">Admin</option>
<option   value="subscriber">subscriber</option>
</select>
</div>

<div  class="form-group">
<label for="user_image"> user Image</label>
<input type="file" name="image" class="form control">
</div>


<div  class="form-group">
<input type="submit" name="create_user" class="btn btn-primary" value="Create user">
</div>
</form>

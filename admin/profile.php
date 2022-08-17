<?php  include "includes/admin_header.php";?>
  <?php
  if(isset($_SESSION['username'])){
      $username=$_SESSION['username'];
      $query=" SELECT * FROM users WHERE username ='{$username}'";
      $select_user_profile_query=mysqli_query($connection, $query);
  while($row=mysqli_fetch_array($select_user_profile_query)){
    $user_id=$row['user_id'];
    $username=$row['username'];
    $user_firstname=$row['user_firstname'];
    $user_lastname=$row['user_lastname'];
    $user_password=$row['user_password'];
    $user_email=$row['user_email'];
    $user_image=$row['user_image'];
    $user_role=$row['user_role'];
  }
  
    }
  ?>  
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
<input type="submit" name="create_user" class="btn btn-primary" value="Update profile">
</div>
</form>

</div>
</div>
</div>
</div>
       
 <?php  include "includes/admin_footer.php"; ?>

<table class="table  table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Role</th>
                   
                    
                </tr>
            </thead>
            <tbody>
            <?php
            
            $query = "SELECT * FROM users  ";
            $select_users = mysqli_query($connection,$query);
                           
    while($row = mysqli_fetch_assoc($select_users)){
                   $user_id=$row['user_id'];
                   $username=$row['username'];
                   $user_firstname=$row['user_firstname'];
                   $user_lastname=$row['user_lastname'];
                   $user_password=$row['user_password'];
                   $user_email=$row['user_email'];
                   $user_image=$row['user_image'];
                   $user_role=$row['user_role'];
                   
                   echo "<tr>";
                   echo "<td>$user_id</td>";
                   echo "<td>$username</td>";
                   echo "<td>$user_firstname</td>";
                   echo "<td>$user_lastname</td>";
                   echo "<td>$user_password</td>";
                   echo "<td>$user_email</td>";
                   echo "<td>$user_image</td>";
                   echo "<td>$user_role</td>";
                   echo "<td><a href= users.php?delete={$user_id} >delete</a></td>";
                   echo "<td><a href= users.php?source=edit_user.php&p_id={$user_id} >Edit</a></td>";
                   echo "<td><a href= users.php?change_to_admin={$user_id} >Admin</a></td>";
                   echo "<td><a href= users.php?change_to_subscriber={$user_id} >subscriber</a></td>";
                
                  
                }
                  
                ?>

       </tbody>
        </table>
        <?php
 
if(isset($_GET['change_to_admin'])){
    $the_user_id= $_GET['change_to_admin'];

    $query="UPDATE users SET user_role='Admin' WHERE user_id={$the_user_id}";
    $change_to_admin_query=mysqli_query($connection,$query);
    header("location:users.php");
}

     if(isset($_GET['change_to_subscriber'])){
        $the_user_id= $_GET['change_to_subscriber'];
        $query="UPDATE users SET user_role='Subscriber' WHERE user_id={$the_user_id}";
        $change_to_subscriber_query=mysqli_query($connection,$query);
        header("location:users.php");
    }

        if(isset($_GET['delete'])){
            $the_user_id= $_GET['delete'];
            $query="DELETE FROM users WHERE user_id= {$the_user_id}";
            $delete_query=mysqli_query($connection,$query);
        }
        ?>
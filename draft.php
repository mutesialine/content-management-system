 <!-- Blog Comments -->
 <?php
                 if(isset($_POST['create_comment'])){
                  $the_post_id=$_GET['P_ID'];
                    $comment_content=$_POST['comment_content'];
                   $comment_email=$_POST['Email'];
                   $comment_author=$_POST['comment_author'];

                 
               $query="INSERT INTO COMMENTS(comment_post_id, comment_author, comment_content,comment_email,comment_status, comment_date)";
               $query.="VALUES ($the_post_id,'[$comment_author]','[$comment_content]', .now(),'[ $comment_email]','unproved')";
               $create_comment_query=mysqli_query($connectuion,$query) ;
               if(!$create_comment_query ){
              die("QUERY FAILED .".mysqli_error($connection));
                 }
              
        
                }
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" name="comment_author">
                    </div>
                    <div class ="form- group">
                        <label for="author">Email</label>
                        <input type="email"   class="form-control" name="Email">
                    </div>

                    <div class="form-group">
                    <label for="author">your comment</label>
                    <textarea  class="form-control  name="comment_content" cols="10"  rows="3"></textarea>
                   </div>
                   <div class= "form=group">
                   <button type="submit" name="create_post" class="btn btn-primary" >submit</button>
                     </div>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                            <!-- End Nested Comment -->
                    </div>
                </div>


                
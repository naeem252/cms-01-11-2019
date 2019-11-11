<?php include "includes/db.php";?>

<?php include "includes/header.php";?>

    <!-- Navigation -->
<?php include "includes/navigation.php";?>
<?php
if(isset($_GET['p_id'])){
    $post_id=$_GET['p_id'];
}

?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">



        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php
            mysqli_query($connection,'SET CHARACTER SET utf8');
            mysqli_query($connection,"SET SESSION collation_connection ='utf8_general_ci'");
            $query="SELECT * FROM posts WHERE post_id={$post_id}";
            $post_select_query=mysqli_query($connection,$query);
            $post_content=mysqli_fetch_assoc($post_select_query);
                ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $row['post_id'];?>"><?php echo $post_content['post_title'];?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_content['post_author'];?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_content['post_date'];?> at 10:00 PM</p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_content['post_image'];?>" alt="">
                <hr>
                <p><?php echo $post_content['post_content'];?></p>
               

                <hr>


         
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="comment_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="text">Text</label>
                            <textarea class="form-control" name="comment_text" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

            <?php
            if(isset($_POST['create_comment'])){
                $the_post_id=$_GET['p_id'];

                $comment_author= $_POST['comment_author'];
                $comment_email=$_POST['comment_email'];
                $comment_text=$_POST['comment_text'];
                $comment_query="INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_date) ";
                $comment_query.="VALUES ({$the_post_id},'{$comment_author}','{$comment_email}','{$comment_text}',now())";

                $comment_query_send=mysqli_query($connection,$comment_query);
                confirm($comment_query_send);

                $query="UPDATE posts SET post_comment_count=post_comment_count+1 ";
                $query.="WHERE post_id={$the_post_id}";
                $update_comment_count=mysqli_query($connection,$query);
                confirm($update_comment_count);
            }

            ?>

                <!-- Comment -->
            <?php
            $query="SELECT * FROM comments WHERE comment_post_id={$post_id} ";
            $query.="AND comment_status='approve' ORDER BY comment_id DESC";
            $add_comment_query=mysqli_query($connection,$query);
            confirm($add_comment_query);
            while($row=mysqli_fetch_assoc($add_comment_query)){

            ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <?php echo $row['comment_author'];?>
                            <small><?php echo $row['comment_date'];?></small>
                        </h4>
                        <?php echo $row['comment_content'];?>
                    </div>
                </div>
            <?php }?>


                <!-- Comment -->


        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php";?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
<?php include "includes/footer.php";?>
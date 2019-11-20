<?php include "includes/db.php";?>

<?php include "includes/header.php";?>

    <!-- Navigation -->
<?php include "includes/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

        

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                   <?php
            mysqli_query($connection,'SET CHARACTER SET utf8'); 
            mysqli_query($connection,"SET SESSION collation_connection ='utf8_general_ci'");

            if(isset($_GET['page'])){
                $page=$_GET['page'];

            }else{
                $page="";
            }


            if($page=='' || $page==1){
                 $page_num=0;
            }else{
                $page_num=($page * 5)-5;
            }


            $post_count_query="SELECT * FROM posts";
            $send_count_query=mysqli_query($connection, $post_count_query);
            $find_post_count=mysqli_num_rows($send_count_query);
           
            $count=ceil($find_post_count / 5);
 echo $count;
            $query="SELECT * FROM posts WHERE post_status='published' LIMIT $page_num,5";
            $post_select_query=mysqli_query($connection,$query);
                   if(mysqli_num_rows($post_select_query)<1){
                        echo "<h1 class='display-1 text-center text-capitalize'>no post found sorry</h1>";
                   }else{

            while($row=mysqli_fetch_assoc($post_select_query)){

            ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $row['post_id'];?>"><?php echo $row['post_title'];?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?author=<?php echo $row['post_author'];?>&p_id=<?php echo $row['post_id'];?>"><?php echo $row['post_author'];?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $row['post_date'];?> at 10:00 PM</p>
                <hr>
                <a href="post.php?p_id=<?php echo $row['post_id'];?>">
                <img class="img-responsive" src="images/<?php echo $row['post_image'];?>" alt="">
                </a>
                <hr>
                <p><?php echo substr($row['post_content'], 0,500)."......";?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $row['post_id'];?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

          
                 <?php } }?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
           <?php include "includes/sidebar.php";?>

        </div>
        <!-- /.row -->

        <hr>
        <ul class="pager">
            <?php

            for($i=1;$i<=$count;$i++){

                if($i==$page){
                    echo "<li ><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
                }else{
                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                }
                
            }

            ?>
        </ul>

        <!-- Footer -->
      <?php include "includes/footer.php";?>
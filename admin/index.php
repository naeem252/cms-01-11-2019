<?php include "includes/admin_header.php";?>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome to Admin 
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        $query="SELECT * FROM posts";
                        $select_all_post=mysqli_query($connection,$query);
                        $count_post=mysqli_num_rows($select_all_post);

                        ?>
                  <div class='huge'><?php echo $count_post;?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <a href="posts.php"><span class="pull-left">View Details</span></a>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                         <?php
                        $query="SELECT * FROM comments";
                        $select_all_comments=mysqli_query($connection,$query);
                        $count_comments=mysqli_num_rows($select_all_comments);

                        ?>
                     <div class='huge'><?php echo $count_comments;?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                            <a href="comments.php"><span class="pull-left">View Details</span></a>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                                              <?php
                        $query="SELECT * FROM users";
                        $select_all_user=mysqli_query($connection,$query);
                        $count_user=mysqli_num_rows($select_all_user);

                        ?>
                     <div class='huge'><?php echo $count_user;?></div>

                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                           <a href="users.php"><span class="pull-left">View Details</span></a>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                                             <?php
                        $query="SELECT * FROM categories";
                        $select_all_categories=mysqli_query($connection,$query);
                        $count_category=mysqli_num_rows($select_all_categories);

                        ?>
                     <div class='huge'><?php echo $count_category;?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                            <a href="categories.php"><span class="pull-left">View Details</span></a>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

 <?php
                        $query="SELECT * FROM posts WHERE post_status='draft'";
                        $select_all_post=mysqli_query($connection,$query);
                        $count_draft_post=mysqli_num_rows($select_all_post);


                        $query="SELECT * FROM comments WHERE comment_status='unapprove'";
                        $select_all_comments=mysqli_query($connection,$query);
                        $count_unapprove_comment=mysqli_num_rows($select_all_comments);

                       
                        $query="SELECT * FROM users WHERE user_role='subscriber'";
                        $select_all_user=mysqli_query($connection,$query);
                        $count_subscriber_user=mysqli_num_rows($select_all_user);

                     
                        ?>
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

          <?php

            $element_text=['Active Posts','Draft Post',"Category","Users",'Subscriber',"Comments","Unapprove Comment"];
            $element_count=[$count_post,$count_draft_post,$count_category,$count_user,$count_subscriber_user,$count_comments,$count_unapprove_comment];
            for($i=0;$i<count($element_text);$i++){
                echo "['{$element_text[$i]}'".",".$element_count[$i]."],";
            }

          ?>

        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
                <!-- /.row -->
                <div class="row">
                    <div id="columnchart_material" style="width:auto; height: 500px;"></div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php";?>
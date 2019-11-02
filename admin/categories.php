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
                           Welcome to Category
                            <small>Subheading</small>
                        </h1>
                        <div class="col-xs-6">
                            
                            <?php
                            if(isset($_POST['submit'])){

                              $cat_title=$_POST['cat_title'];

                              if($cat_title=="" || empty($cat_title)){
                                echo "This field should not be empty";
                              }else{
                                $query="INSERT INTO categories(cat_title)";
                                $query.="VALUE ('{$cat_title}')";
                                $inser_cat_query=mysqli_query($connection, $query);
                                if(!$inser_cat_query){
                                    die("query failed".mysqli_error($connection));
                                }
                              }
                            }

                            ?>



                        	<form action="" method="post">
                        		<div class="form-group">
                        			<label for="cat_title"><h4>Category Title</h4></label>
                        			<input placeholder="add category" type="text" name="cat_title" id="cat_title" class="form-control">
                        		</div>
                        		<input type="submit" class="btn btn-primary btn-block" name="submit" value="Add Catetory" >
                        	</form>
                        </div>

                        <div class="col-xs-6">
                            <?php

                            $query="SELECT * FROM categories";
                            $select_category=mysqli_query($connection,$query);

                            ?>
                        	<table class="table table-striped">
                        		<thead>
                        			<tr class="text-center">
                        				<th style="text-align: center;">ID</th>
                        				<th style="text-align: center;">Category Titile</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                                    <?php 
                                    while ($row=mysqli_fetch_assoc($select_category)):
                                    ?>

                        			<tr>
                        				<td align="center"><?php echo $row['cat_id'];?></td>
                                        <td align="center"><?php echo $row['cat_title'];?></td>
                        				
                        			</tr>

                                <?php endwhile;?>
                        		</tbody>
                        	</table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php";?>
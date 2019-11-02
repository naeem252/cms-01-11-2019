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
                            <!--insert categories-->
                            <?php insert_categories();?>

                        	<form action="" method="post">
                        		<div class="form-group">
                        			<label for="cat_title"><h4>Category Title</h4></label>
                        			<input placeholder="add category" type="text" name="cat_title" id="cat_title" class="form-control">
                        		</div>
                        		<input type="submit" class="btn btn-primary btn-block" name="submit" value="Add Catetory" >
                        	</form>

                    <?php include "includes/update_categories.php";?>


                        </div>

                        <div class="col-xs-6">
                        	<table class="table table-striped">
                        		<thead>
                        			<tr class="text-center">
                        				<th style="text-align: center;">ID</th>
                        				<th style="text-align: center;">Category Titile</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                                    <?php
                                        findAllCategories();

                                    ?>

                        		</tbody>

                                <?php
                                    deleteCategories();
                                ?>
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
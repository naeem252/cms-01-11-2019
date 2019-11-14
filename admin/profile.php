<?php include "includes/admin_header.php";?>

<?php

if(isset($_SESSION['username'])){
	$username=$_SESSION['username'];
	$query="SELECT * FROM users WHERE username='{$username}'";
	$select_profile_query=mysqli_query($connection,$query);
	 $fetch_user=mysqli_fetch_assoc($select_profile_query);
}
?>


<?php

if(isset($_POST['update_profile'])){
	 $query="UPDATE users SET ";
    $query.="user_firstname='{$_POST['user_firstname']}', ";
    $query.="user_lastname='{$_POST['user_lastname']}', ";
    $query.="user_role='{$_POST['user_role']}', ";
    $query.="username='{$_POST['username']}', ";
    $query.="user_email='{$_POST['user_email']}', ";
    $query.="user_password='{$_POST['user_password']}' ";
    $query.="WHERE username='{$username}'";
    $update_user=mysqli_query($connection,$query);
    confirm($update_user);
    header("Location:users.php");
}

?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Profile
                            <small>Subheading</small>
                        </h1>

                 	<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="fname">First Name</label>
        <input id="fname" value="<?php echo $fetch_user['user_firstname'];?>" type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" value="<?php echo $fetch_user['user_lastname'];?>" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="role">
            User Role
        </label>
        <select class="form-control" name="user_role" id="role">
            <?php
            $admin="";
            $subscriber="";
            if($fetch_user['user_role']=="admin"){
                $admin="selected";
            }else{
                $subscriber="selected";
            }

            ?>
            <option <?php echo $admin; ?> value="admin">Admin</option>
            <option <?php echo $subscriber; ?> value="subscriber">Subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label for="username">
            Username
        </label>
        <input type="text" value="<?php echo $fetch_user['username'];?>" id="username" class="form-control" name="username">
    </div>
    <!--    <div class="form-group">-->
    <!--        <label for="image">-->
    <!--            Post Image-->
    <!--        </label>-->
    <!--        <input type="file" class="form-control" name="image">-->
    <!--    </div>-->
    <div class="form-group">
        <label for="email">
            Email
        </label>
        <input type="email"  value="<?php echo $fetch_user['user_email'];?>" id="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="password">
            Password
        </label>
        <input type="password" id="password"  value="<?php echo $fetch_user['user_password'];?>" name="user_password" class="form-control">
    </div>
    <input type="submit" name="update_profile" value="Update Profile" class="btn btn-primary">
</form>

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
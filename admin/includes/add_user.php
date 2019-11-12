
<?php
    if(isset($_POST['add_user'])){
        $user_firstname=$_POST['user_firstname'];
        $user_lastname=$_POST['user_lastname'];
        $user_role=$_POST['user_role'];
        $username=$_POST['username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];

        $query="INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password) ";
        $query.="VALUES('$user_firstname','$user_lastname','$user_role','$username','$user_email','$user_password')";
        $user_query=mysqli_query($connection,$query);
        confirm($user_query);
    }
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="fname">First Name</label>
        <input id="fname" type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="role">
            User Role
        </label>
        <select class="form-control" name="user_role" id="role">
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label for="username">
            Username
        </label>
        <input type="text" id="username" class="form-control" name="username">
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
        <input type="email" id="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="password">
            Password
        </label>
        <input type="password" id="password" name="user_password" class="form-control">
    </div>
    <input type="submit" name="add_user" value="Add User" class="btn btn-primary">
</form>

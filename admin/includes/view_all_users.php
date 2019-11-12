<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>

    </tr>
    </thead>
    <tbody>
<!--    select all comments data and make table-->
    <?php
    $query="SELECT * FROM users";
    $select_users=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_users)) {
        ?>
        <tr>
            <td><?php echo $row['user_id'];?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['user_firstname'];?></td>
            <td><?php echo $row['user_lastname'];?></td>
            <td><?php echo $row['user_email'];?></td>
            <td><?php echo $row['user_role'];?></td>
            <td><a href="users.php?admin=<?php echo $row['user_id'];?>">Admin</a></td>
            <td><a href="users.php?subscriber=<?php echo $row['user_id'];?>">Subscriber</a></td>
            <td><a href="users.php?source=edit_user&edit_id=<?php echo $row['user_id'];?>">Edit</a></td>

            <td><a href="users.php?delete=<?php echo $row['user_id'];?>">Delete</a></td>


        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<!--for delete USER functionality-->
<?php
    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $query="DELETE FROM users WHERE user_id=$delete_id";
        $delete_query=mysqli_query($connection,$query);
        confirm($delete_query);
        header("Location:users.php");
    }
?>

    <!--change to admin  functionality-->

<?php
if(isset($_GET['admin'])){
    $the_admin_id=$_GET['admin'];
    $query="UPDATE users SET user_role='admin' WHERE user_id={$the_admin_id}";
    $admin_query=mysqli_query($connection,$query);
    confirm($admin_query);
    header("Location:users.php");

}

?>
<!--unapprove  functionality-->

<?php
if(isset($_GET['subscriber'])){
    $the_subscriber_id=$_GET['subscriber'];
    $query="UPDATE users SET user_role='subscriber' WHERE user_id={$the_subscriber_id}";
    $subscriber_query=mysqli_query($connection,$query);
    confirm($subscriber_query);
    header("Location:users.php");

}

?>

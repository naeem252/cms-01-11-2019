<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>Date</th>
        <th>In Response to</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query="SELECT * FROM comments";
    $select_comments=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_comments)) {
        ?>
        <tr>
            <td><?php echo $row['comment_id'];?></td>
            <td><?php echo $row['comment_author'];?></td>
            <td><?php echo $row['comment_content'];?></td>
            <td><?php echo $row['comment_email'];?></td>
            
            <td><?php echo $row['comment_status'];?></td>
            
            <td><?php echo $row['comment_date'];?></td>
            <td>Yes</td>
            <td><a href="posts.php?delete=<?php echo $row['comment_id'];?>">Approve</a></td>
            <td><a href="posts.php?source=edit_post&edit_id=<?php echo $row['comment_id'];?>">Unapprove</a>
            <td><a href="posts.php?delete=<?php echo $row['comment_id'];?>">Delete</a></td>
            <td><a href="posts.php?source=edit_post&edit_id=<?php echo $row['comment_id'];?>">Edit</a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>


<?php
    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $query="DELETE FROM posts WHERE post_id=$delete_id";
        $delete_query=mysqli_query($connection,$query);
        confirm($delete_query);
        header("Location:posts.php");
    }

?>
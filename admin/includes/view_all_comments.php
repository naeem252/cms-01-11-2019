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
<!--    select all comments data and make table-->
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
<!--            add post title in comment table and responsible for it-->
            <?php
            $query="SELECT * FROM posts WHERE post_id={$row['comment_post_id']}";
            $select_post_query=mysqli_query($connection,$query);
            $select_post_data=mysqli_fetch_assoc($select_post_query);
            ?>
            <td>
                <a target="_blank" href="../post.php?p_id=<?php echo $select_post_data['post_id'];?>">
                    <?php echo substr($select_post_data['post_title'],0,50);?>....
                </a>
            </td>
            <td><a href="comments.php?approve=<?php echo $row['comment_id'];?>">Approve</a></td>
            <td><a href="comments.php?unapprove=<?php echo $row['comment_id'];?>">Unapprove</a></td>
            <td><a href="comments.php?delete=<?php echo $row['comment_id'];?>">Delete</a></td>
            <td><a href="posts.php?source=edit_post&edit_id=<?php echo $row['comment_id'];?>">Edit</a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<!--for delete comment functionality-->
<?php
    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $query="DELETE FROM comments WHERE comment_id=$delete_id";
        $delete_query=mysqli_query($connection,$query);
        confirm($delete_query);
        header("Location:comments.php");
    }
?>

<!--approve  functionality-->

<?php
if(isset($_GET['approve'])){
    $the_approve_id=$_GET['approve'];
    $query="UPDATE comments SET comment_status='approve' WHERE comment_id={$the_approve_id}";
    $status_query=mysqli_query($connection,$query);
    confirm($status_query);
    header("Location:comments.php");

}

?>
<!--unapprove  functionality-->

<?php
if(isset($_GET['unapprove'])){
    $the_approve_id=$_GET['unapprove'];
    $query="UPDATE comments SET comment_status='unapprove' WHERE comment_id={$the_approve_id}";
    $status_query=mysqli_query($connection,$query);
    confirm($status_query);
    header("Location:comments.php");

}

?>

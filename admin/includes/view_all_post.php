<?php 
if(isset($_POST['checkBoxArr'])){
   foreach ($_POST['checkBoxArr'] as $checkBoxValue) {
       $bulkOptions=$_POST['bulkOptions'];

       switch ($bulkOptions) {
           case 'published':
               $query="UPDATE posts SET post_status='{$bulkOptions}' WHERE post_id={$checkBoxValue}";
               $update_publish_query=mysqli_query($connection, $query);
               confirm($update_publish_query);
               break;
           case 'draft':
           $query="UPDATE posts SET post_status='{$bulkOptions}' WHERE post_id={$checkBoxValue}";
           $update_draft_query=mysqli_query($connection, $query);
           confirm($update_draft_query);
           break;
            case 'delete':
           $query="DELETE FROM posts WHERE post_id={$checkBoxValue}";
           $update_delete_query=mysqli_query($connection, $query);
           confirm($update_delete_query);
                break;
                case "clone":

                $query="SELECT * FROM posts WHERE post_id={$checkBoxValue}";
                $select_post_query=mysqli_query($connection, $query);
                $mysqli_data=mysqli_fetch_assoc($select_post_query);
             
                $post_title=$mysqli_data['post_title'];
        $post_category_id=$mysqli_data['post_category_id'];
        $post_author=$mysqli_data['post_author'];
        $post_image=$mysqli_data['post_image'];
        $post_tags=$mysqli_data['post_tags'];
        $post_status=$mysqli_data['post_status'];
        $post_content=$mysqli_data['post_content'];

                $query="INSERT INTO posts(post_title,post_category_id,post_author,post_status,post_image,post_tags,post_content,post_date)";
        $query.="VALUES('$post_title','$post_category_id','$post_author','$post_status','$post_image','$post_tags','$post_content',now())";
        $create_post_query=mysqli_query($connection,$query);
        confirm($create_post_query);

              

           
           default:
               # code...
               break;
       }
   }
}


?>
<form action="" method="post">
    <div id="bulkOptionContainer"  class=" col-xs-4">
        <select class="form-control" name="bulkOptions" id="">
            <option value="">Select Option</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
            <option value="clone">Clone</option>
        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" name="apply" value="Apply" class="btn btn-success">
        <a href="posts.php?source=add_post" class="btn btn-primary">Add Post</a>
    </div>


<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th><input type="checkbox" id="selectAllBoxes"></th>


        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query="SELECT * FROM posts";
    $select_posts=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_posts)) {
        ?>
        <tr>
         
                <td><input type="checkbox" class="checkBoxes" name="checkBoxArr[]" value="<?php echo $row['post_id'];?>"></td>
            
            <td><?php echo $row['post_id'];?></td>
            <td><?php echo $row['post_author'];?></td>
            <td><a target="_blank" href="../post.php?p_id=<?php echo $row['post_id'];?>"><?php echo $row['post_title'];?></a></td>
            <?php
            $query="SELECT * FROM categories WHERE cat_id={$row['post_category_id']}";
            $cat_query=mysqli_query($connection,$query);
            $cat_data=mysqli_fetch_assoc($cat_query);
            ?>
            <td><?php echo $cat_data['cat_title'];?></td>
            <td><?php echo $row['post_status'];?></td>
            <td><img width="100" src="../images/<?php echo $row['post_image'];?>" alt=""></td>
            <td><?php echo $row['post_tags'];?></td>
            <td><?php echo $row['post_comment_count'];?></td>
            <td><?php echo $row['post_date'];?></td>
            <td><a onclick="javascript:return confirm('Are You sure want to delete this post!');" href="posts.php?delete=<?php echo $row['post_id'];?>">Delete</a></td>
            <td><a href="posts.php?source=edit_post&edit_id=<?php echo $row['post_id'];?>">Edit</a></td>
        </tr>
        <?php
    }
    ?>
    </form>
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
<?php
if(isset($_GET['edit_id'])) {
    $the_post_id = $_GET['edit_id'];

    $query = "SELECT * FROM posts WHERE post_id=$the_post_id";
    $select_posts = mysqli_query($connection, $query);
    $select_posts_data = mysqli_fetch_assoc($select_posts);

}

if(isset($_POST['update_post'])){
    $post_title=$_POST['title'];
    $post_category_id=$_POST['post_category'];
    $post_author=$_POST['author'];
    $post_status=$_POST['status'];
    $post_tags=$_POST['tags'];
    $post_content=$_POST['content'];
    $post_image=$_FILES['image']['name'];
    $post_image_tmp=$_FILES['image']['tmp_name'];

    if(empty($post_image)){
        $post_image=$select_posts_data['post_image'];
    }

    move_uploaded_file($post_image_tmp,"../images/$post_image");

    $query="UPDATE posts SET ";
    $query.="post_title='$post_title', ";
    $query.="post_category_id='$post_category_id' ,";
    $query.="post_date=now(), ";
    $query.="post_author='$post_author', ";
    $query.="post_status='$post_status', ";
    $query.="post_tags='$post_tags', ";
    $query.="post_content='$post_content', ";
    $query.="post_image='$post_image' ";
    $query.="WHERE post_id={$the_post_id}";
    $update_post=mysqli_query($connection,$query);
    confirm($update_post);


    echo "<p class='bg-success'>Post Updated: <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='posts.php'>Edit More Post</a></p>";
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php echo $select_posts_data['post_title'];?>" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="post_category">
            Post Category
        </label>
        <select class="form-control" name="post_category" id="category">
            <?php
            $query="SELECT * FROM categories";
            $post_category=mysqli_query($connection,$query);
            confirm($post_category);
            while ($row=mysqli_fetch_assoc($post_category)){
                if($select_posts_data['post_category_id']==$row['cat_id']){
                    $select="selected";
                }else{
                    $select="";
                }
                echo "<option {$select} value='{$row['cat_id']}'>{$row['cat_title']}</option>";
            }

            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="author">
            Post Author
        </label>
        <input id="author" value="<?php echo $select_posts_data['post_author'];?>" type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label for="status">
            Post Status
        </label>

        <select name="status" id="" class="form-control">
            <option value="published" <?php if($select_posts_data['post_status']=='published'){echo "selected";}?>>
                Published
            </option>
            <option value="draft" <?php if($select_posts_data['post_status']=='draft'){echo "selected";}?>>
                draft
            </option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">
            Post Image
        </label>
        <img src="../images/<?php echo $select_posts_data['post_image'];?>" width="100" alt="">
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <label for="tags">
            Post Tags
        </label>
        <input type="text" value="<?php echo $select_posts_data['post_tags'];?>" class="form-control" name="tags">
    </div>
    <div class="form-group">
        <label for="content">
            Post Content
        </label>
        <textarea name="content"class="form-control" id="content" cols="30" rows="10"><?php echo $select_posts_data['post_content'];?></textarea>
    </div>
    <input type="submit" name="update_post" value="Publish Post" class="btn btn-primary">
</form>
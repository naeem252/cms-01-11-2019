
<?php
    if(isset($_POST['publish'])){
        $post_title=$_POST['title'];
        $post_category_id=$_POST['category_id'];
        $post_author=$_POST['author'];
        $post_status=$_POST['status'];
        $post_image=$_FILES['image']['name'];
        $post_image_temp=$_FILES['image']['tmp_name'];
        $post_tags=$_POST['tags'];
        $post_content=$_POST['content'];
        $post_date=date('d-m-y');
        $post_comment_count=4;
      


        move_uploaded_file($post_image_temp,"../images/$post_image");

        $query="INSERT INTO posts(post_title,post_category_id,post_author,post_status,post_image,post_tags,post_content,post_date,post_comment_count)";
        $query.="VALUES('$post_title','$post_category_id','$post_author','$post_status','$post_image','$post_tags','$post_content',now(),$post_comment_count)";
        $create_post_query=mysqli_query($connection,$query);


    }
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="post_category">
            Post Category Id
        </label>
        <input type="text" class="form-control" name="category_id">
    </div>
    <div class="form-group">
        <label for="author">
            Post Author
        </label>
        <input id="author" type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label for="status">
            Post Status
        </label>
        <input type="text" class="form-control" name="status">
    </div>
    <div class="form-group">
        <label for="image">
            Post Image
        </label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <label for="tags">
            Post Tags
        </label>
        <input type="text" class="form-control" name="tags">
    </div>
    <div class="form-group">
        <label for="content">
            Post Content
        </label>
        <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
    </div>
    <input type="submit" name="publish" value="Publish Post" class="btn btn-primary">
</form>

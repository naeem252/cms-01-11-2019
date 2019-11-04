



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="post_category">
            Post Category Id
        </label>
        <input type="text" class="form-control" name="post_category_id">
    </div>
    <div class="form-group">
        <label for="author">
            Post Author
        </label>
        <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="status">
            Post Status
        </label>
        <input type="text" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label for="image">
            Post Image
        </label>
        <input type="file" class="form-control" name="post_image">
    </div>
    <div class="form-group">
        <label for="tags">
            Post Tags
        </label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="content">
            Post Content
        </label>
        <textarea name="post_content" class="form-control" id="content" cols="30" rows="10"></textarea>
    </div>
    <input type="submit" name="publish" value="Publish Post" class="btn btn-primary">
</form>

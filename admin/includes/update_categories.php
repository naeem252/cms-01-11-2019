

<?php
if(isset($_GET['edit'])){
    $cat_id=$_GET['edit'];
    $query="SELECT * FROM categories WHERE cat_id={$cat_id}";
    $select_category_id=mysqli_query($connection,$query);
    $category_row=mysqli_fetch_assoc($select_category_id);

    ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="cat_title"><h4>Update Category</h4></label>
            <input placeholder="update category" type="text" name="cat_title" id="cat_title" value="<?php echo $category_row['cat_title'];?>" class="form-control">
        </div>
        <input type="submit" class="btn btn-primary btn-block" name="update_category" value="Update Catetory" >
    </form>
<?php } ?>

<?php
//update categories
if(isset($_POST['update_category'])){
    $cat_title=$_POST['cat_title'];
    $query="UPDATE categories SET cat_title='{$cat_title}' WHERE cat_id={$cat_id}";
    $update_query=mysqli_query($connection,$query);
    header("Location:categories.php");
    if(!$update_query){
        die("query failed".mysqli_error($connection));
    }
}
?>
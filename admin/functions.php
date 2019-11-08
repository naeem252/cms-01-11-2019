<?php
function confirm($result){
    global $connection;
    if(!$result){
        die("QUERY FAIELD".mysqli_error($connection));
    }
}
function insert_categories(){

    global $connection;

    if (isset($_POST['submit'])) {

        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE ('{$cat_title}')";
            $insert_cat_query = mysqli_query($connection, $query);
            if (!$insert_cat_query) {
                die("query failed" . mysqli_error($connection));
            }
        }
    }


}

function findAllCategories(){
    global $connection;
    $query="SELECT * FROM categories";
    $select_category=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_category)) {
        echo "<tr>";
        echo "<td align=\"center\">{$row['cat_id']}</td>";
        echo "<td align=\"center\">{$row['cat_title']}</td>";
        echo "<td><a href=\"categories.php?delete={$row['cat_id']}\">Delete</a></td>";
        echo "<td><a href=\"categories.php?edit={$row['cat_id']}\">Edit</a></td>";

        echo "</tr>";
    }

}


function deleteCategories(){
    global $connection;
    if(isset($_GET['delete'])){
        $cat_id=$_GET['delete'];


        $query="SELECT * FROM categories WHERE cat_id={$cat_id}";
        $select_query=mysqli_query($connection,$query);
        if(mysqli_num_rows($select_query)==0){
            echo "something went wrong";
        }else{
            $query="DELETE FROM categories WHERE cat_id={$cat_id}";
            $delete_query=mysqli_query($connection,$query);
            header("location:categories.php");
        }



    }
}











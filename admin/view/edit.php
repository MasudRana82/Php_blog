<?php
if (isset($_POST['update_cat'])) {
    if (isset($_GET['edit'])) {
        $id = $_GET["edit"];
        
        $return_msg = $obj->edit($_POST, $id); //Object already created in template.php
    }
}

if (isset($return_msg)) {
    echo $return_msg; //success or error show
}

$id = $_GET["edit"]; //get the id from url

$category= $obj->edit_data_show($id);

?>
<form action="" method="POST">

    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">edit Category</label>
        <input class="form-control py-4" type="text" value="<?= $category['cat_name']; ?>" placeholder="Enter Category " name="cat_name" />
    </div>
    <div class="form-group">
        <label class="small mb-1" for="inputPassword"> Edit Description</label>
        <input class="form-control py-4" type="text" value="<?= $category['cat_des']; ?>" placeholder="Description" name="cat_des" />
    </div>
    <input class="btn btn-primary" type="submit" value="Update" name="update_cat">


</form>
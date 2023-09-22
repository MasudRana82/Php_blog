<?php

if(isset($_POST['add_cat'])) {

   $return_msg = $obj->add_category($_POST); //Object already created in template.php
}

?>
<?php

if(isset($return_msg)){
     echo $return_msg;
    }

?>
<form action="" method="POST">

    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">Add Category</label>
        <input class="form-control py-4"  type="text" placeholder="Enter Category " name="cat_name" />
    </div>
    <div class="form-group">
        <label class="small mb-1" for="inputPassword">Description</label>
        <input class="form-control py-4"  type="text" placeholder="Description" name="cat_des" />
    </div>
    <input class="btn btn-primary" type="submit"  name="add_cat">


</form>
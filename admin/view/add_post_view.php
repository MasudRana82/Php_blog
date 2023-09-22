<?php



?>
<?php
$ctg = $obj->all_category();

if (isset($_POST['add_post'])) {

    // var_dump($_POST);
    // exit;
   
    
    
    $return_msg = $obj->add_post($_POST); //Object already created in template.php
}

?>
<?php

if (isset($return_msg)) {
    echo $return_msg;
}

?>
<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">Post Title</label>
        <input class="form-control py-4" type="text" placeholder="" name="post_title" />
    </div>
    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">Post content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">Upload thumbnail</label> <br>
        <input type="file" placeholder="" name="post_img" />
    </div>

    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">Category Name</label>
        <Select name="post_category" class="form-control">

            <?php

            while ($category = mysqli_fetch_assoc($ctg)) {


            ?>
                <option value="<?= $category['cat_id'] ?>"><?= $category['cat_name'] ?></option>

            <?php } ?>


        </Select>
    </div>

    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">Summery</label>
        <input class="form-control py-4" type="text" placeholder=" " name="post_summery" />
    </div>
    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">Tag</label>
        <input class="form-control py-4" type="text" placeholder=" " name="post_tag" />
    </div>
    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">Status</label>
        <Select name="post_status" class="form-control">
            <option value="" disabled>Select status</option>
            <option value="1">Publish</option>
            <option value="0">Unpublish </option>

        </Select>
    </div>


    <input class="btn btn-primary" type="submit" name="add_post">


</form>
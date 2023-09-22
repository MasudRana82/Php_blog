<h1>Manage post</h1>

<div class="table-responsive">

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Author</th>
                <th>date</th>
                <th>category</th>
                <th>status</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php

            $post = $obj->all_post();
            var_dump(mysqli_fetch_assoc($post));
            exit;




            ?>
        </tbody>
    </table>
</div>
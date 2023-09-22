     <?php


        $category = $obj->all_category(); //Object already created in template.php
        session_start();
           var_dump($_SESSION['admin_name']);
                    exit;
        if(isset($_GET['delete'])){   

            $id= $_GET['delete'];
            $msg = $obj->delete($id);
            echo $msg;
        }
        if(isset($_GET['edit'])){   

            $id= $_GET['delete'];
            $msg = $obj->edit($id);
            echo $msg;
        }
        
       
        ?>


     <div class="card mb-4">
         <div class="card-header">
             <i class="fas fa-table mr-1"></i>
             Category Page
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>

                         <tr>
                             <th>Id</th>
                             <th>Category Name</th>
                             <th>Description</th>
                             <th>Action</th>

                         </tr>

                     </thead>

                     <tbody>
                         <?php
                            while ($catdata = mysqli_fetch_assoc($category)) {

                            ?>
                             <tr>

                                 <td> <?= $catdata['cat_id']; ?></td>

                                 <td><?php echo $catdata['cat_name'];  ?></td>
                                 <td><?php echo $catdata['cat_des'];  ?></td>
                                 <td><a href="edit.php?edit=<?= $catdata['cat_id'] ?>" class="btn btn-primary">Edit</a>
                                     <a href="?delete=<?= $catdata['cat_id'] ?>" class="btn btn-danger">Delete</a>
                                 </td>



                             </tr>
                         <?php } ?>

                     </tbody>
                 </table>
             </div>
         </div>
     </div>
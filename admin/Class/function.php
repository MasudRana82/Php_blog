<?php
    class adminBlog{

    private $conn;
    public function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "phpblog";
        $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) ;
        if(!$this->conn){
            die("Database connection Error");
        }   
    }

    public function admin_login($data){
    
       
        $admin_email=$data['admin_email'];
        
        $admin_pass=$data['admin_pass'];

        $query="SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_password='$admin_pass'";
        
        if(mysqli_query($this->conn,$query)){
            $admin_info = mysqli_query($this->conn,$query);
            $admin_data=mysqli_fetch_assoc($admin_info);
            
            if($admin_data){

                Session_start();
                $_SESSION["admin_id"] = $admin_data['id'];
                $_SESSION["admin_name"]=$admin_data['admin_name'];
            
                header("location:dashboard.php");
                exit;
            }
            else{
                echo "Login failed! Please check your credentials";
            }
        }
    }

    public function add_category($data){
        
         $cat_name=$data['cat_name'];      
         $cat_des=$data['cat_des'];
                
        $query = "INSERT INTO category(cat_name,cat_des) VALUE('$cat_name','$cat_des')";

        if(mysqli_query($this->conn, $query)){
            return "Category added successfully.";
        }
         
    }

    public function add_post($data){
        // var_dump($data);
        // exit;
        $post_title=$data['post_title'];
        $post_content=$data['post_content'];
        // $post_img=$data['post_img'];
        $post_img=$_FILES['post_img']['name'];
        $post_img_tmp = $_FILES['post_img']['tmp_name'];
        

        $post_category=$data['post_category'];
        $post_author=$data['post_author'];
      
        $post_summery=$data['post_summery'];
        $post_tag=$data['post_tag'];
        $post_status=$data['post_status'];
                
        $query = "INSERT INTO posts(post_title,post_content,post_img,post_ctg,post_author,post_date,post_comment_count,post_summery,post_tag,post_status) VALUE('$post_title','$post_content','$post_img',$post_category,'Admin',now(),3,'$post_summery','$post_tag',$post_status)";

        if(mysqli_query($this->conn, $query)){
            
            // Move file to upload folder. Not working perfectly on mac os, i think its mac permission issue. spent lot of time to fix this.
            $upload = move_uploaded_file($post_img_tmp,'../upload/'.$post_img);

            // we can use unlink() function delete the image from folder
        
            return "Post added successfully.";
        }
         
    }

    public function all_post()
    {


        $query = "SELECT * FROM posts";

        if (mysqli_query($this->conn, $query)) {
            $data = mysqli_query($this->conn, $query);


            return $data;
       
        }
    }


    public function post_view($id)
    {
        $query = "SELECT * FROM posts WHERE post_id=$id";

        if (mysqli_query($this->conn, $query)) {
            $data = mysqli_query($this->conn, $query);
            return $data;
        }
    }


    public function all_category(){

        $query = "SELECT * FROM category";

        if(mysqli_query($this->conn, $query)){
            $data=mysqli_query($this->conn, $query);


            return $data;
            
        }
         
    }
    

    //category name show in home page
    public function cat_view($id){
//         We also create view table named 'post_with_ctg' running this sql command:  Create VIEW post_with_ctg AS
// SELECT post_title,post_content,post_img,post_author,post_date,post_comment_count,post_summery,post_tag,post_status,cat_id,cat_name
// FROM posts
// INNER JOIN category
// ON posts.post_ctg * category.cat_id
              
         $query = "SELECT post_title,post_content,post_img,post_author,post_date,post_comment_count,post_summery,post_tag,post_status,cat_id,cat_name 
                            FROM posts
                            INNER JOIN category
                            ON posts.post_ctg * category.cat_id WHERE category.cat_id=$id "; //inner join 

        if(mysqli_query($this->conn, $query)){
            $data=mysqli_query($this->conn, $query);

            $a= mysqli_fetch_assoc($data);
            
            return $a;
            
        }
         
    }

    // category edit
    public function edit_data_show($data){


        $query = "SELECT * FROM category WHERE cat_id='$data'";

        if (mysqli_query($this->conn,$query)) {
        $info = mysqli_query($this->conn, $query);
           return mysqli_fetch_assoc($info);
        }

    }
  
    public function delete($data){
        $query = "DELETE FROM category WHERE cat_id='$data'";

        if(mysqli_query($this->conn, $query)){

            return "Delete Successfully Done.<br>";
        }
    }
    public function edit($data,$id){

        $cat_name= $data['cat_name'];
        $cat_des= $data['cat_des'];
        $cat_id= $data['cat_id'];
        $query = "UPDATE category SET cat_name='$cat_name', cat_des=' $cat_des'  WHERE cat_id='$id'";

        if(mysqli_query($this->conn, $query)){

            return "Edit Successfully Done. <br>";
        }
    }
} 



?>
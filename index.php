<?php
require_once('./components/header.php');
spl_autoload_register(function ($class_name) {
    include './database/' . $class_name . '.php';

});
require_once('./components/navbar.php');
if($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_FILES['image'])) {
        $errors = array();
// var_dump($_FILES);
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
// get file extension
        $ext = explode('.', $_FILES['image']['name']);
        $file_ext = strtolower(end($ext));
// or
       // $ext = pathinfo($file_name)["extension"];
        $extensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG
file.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "./components/file1/" . $file_name);
            if(user::updateImage($file_name)){
                $_SESSION['user']->image=$file_name;
                header('Location:index.php?result=1');
            }
         else{

                header('Location:index.php?result=2');
         }
        } else {
                header('Location:index.php?result=2');
            //print_r($errors);
        }

    }

?>
<div class="container">
    <?php
}
    elseif($_SERVER['REQUEST_METHOD']=='GET')
    {
       if(isset($_GET['result']))
       {
           if($_GET['result']==1)
           {
               echo "<div class='alert alert-success text-center fw-bold my-5 '>
     Image  Updated Successfully
    </div>";
           }
           elseif($_GET['result']==2)
           {
               echo "<div class='alert alert-dange text-center fw-bold my-5 '>
     Iamge Not  Successfully
    </div>";
           }
       }
        else
        {
            echo "<div class='alert alert-info text-center fw-bold my-5 '>
     Change Your Profile Iamge 
    </div>";
        }

    }

    ?>
<div>
    <form action="" method="post" enctype="multipart/form-data">
<div class="text-center">
    <label for="image">
        <img class="img-thumbnail  " style="width:200px;height:200px ; display: inline-block" src=<?=empty($image)?"./components/file1/default.jpg":"./components/file1/$image"?>>
    </label>
    <input type="file" name="image" id="image" hidden>
</div>

<div class="text-center mt-3">
    <input type="submit" value="Change" class="btn btn-primary">
</div>
    </form>
</div>



</div>



<?php
require_once('./components/footer.php');

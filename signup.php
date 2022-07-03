<?php
require_once('./components/header.php');
spl_autoload_register(function ($class_name) {
    include './database/' . $class_name . '.php';

});
if(isset($_SESSION['user']))
{
    header('Location:index.php');
}
$errors = [];
if($_SERVER['REQUEST_METHOD']=='GET')
{
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['first_name'])) {
        $errors['first_name'] = "first name Is Required";

    } elseif (empty($_POST['last_name'])) {
        $errors['last name'] = "last name Is Required";
    } elseif (empty($_POST['email'])) {
        $errors['email'] = "Email Is Required";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email Is Invalid";
    } elseif (empty($_POST['password'])) {
        $errors['password'] = "Password is Required";
    }
    elseif (empty($_POST['confirmPassword'])) {
        $errors['confirmPassword'] = "confirmPassword  is Required";
    }
    elseif($_POST['password']!=$_POST['confirmPassword'])
    { $errors['Password'] = "password and confirmPassword  are not the same";}

    if(empty($errors))
    {
        if(user::addUser($_POST['first_name'],$_POST['last_name'],$_POST['email'],password_hash($_POST['password'],
            PASSWORD_DEFAULT))){
            header('Location:login.php');
        }
    }

}
?>
<div class="container">

<form method="post" class="shadow p-5  w-50 mx-auto " >

    <div class="mb-3">
        <label  class="form-label">First Name</label>
        <input type="text" name="first_name" class="form-control" placeholder="First name" aria-label="First name">
        <?= isset($errors['first_name'])?"<div class='alert alert-danger'>".$errors['first_name']."</div>>":""?>
    </div>
    <div class="mb-3">
        <label  class="form-label">Last Name</label>
        <input type="text" name="last_name"  class="form-control" placeholder="Last name" aria-label="Last name">
        <?= isset($errors['last_name'])?"<div class='alert alert-danger'>".$errors['last_name']."</div>>":""?>
    </div>


    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">

        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        <?= isset($errors['email'])?"<div class='alert alert-danger'>".$errors['email']."</div>>":""?>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        <?= isset($errors['password'])?"<div class='alert alert-danger'>".$errors['password']."</div>>":""?>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirmed Password</label>
        <input type="password" name="confirmPassword" class="form-control" id="exampleInputPassword1">
        <?= isset($errors['confirmPassword'])?"<div class='alert alert-danger'>".$errors['confirmPassword']."</div>>":""?>
    </div>
<!--    <div class="mb-3 form-check">-->
<!--        <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
<!--        <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
<!--    </div>-->

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Register</button>
        <br>
        <br>
        <a href="login.php" class="form-link">Login</a>
    </div>
</form>

</div>





<?php

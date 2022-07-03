
<?php
require_once("components/header.php");


spl_autoload_register(function ($class_name) {
    include './database/' . $class_name . '.php';
});
//session_start();
$errors = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['email'])) {
        $errors['email'] = "Email Is Required";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email Is Invalid";
    } elseif (empty($_POST['password'])) {
        $errors['password'] = "Password is Required";
    }
//    print_r($_POST);
//    print_r($errors);die;
//    print_r($_POST);
    if (empty($errors)) {
        $user = user::getUser($_POST['email']);
//        echo ($user->password."==".$_POST['password']);
        if (!password_verify($_POST['password'], $user->password )) {
            $errors['account'] = "InValid Email or Password";

        }
        else {
//            echo ("success");
            $_SESSION['user'] = $user;
        header("Location:index.php");
        }
//        print_r(user::getUser($_POST['email']));



    }
}
?>
<div class="container p-5 mt-5">
    <form class="w-50 p-5 shadow m-auto"   method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">

            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            <?= isset($errors['email'])?"<div class='alert alert-danger'>".$errors['email']."</div>>":""?>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            <?= isset($errors['password']) ?"<div class='alert alert-danger'>".$errors['password']."</div>":""?>
        </div>
        <!--        <div class="mb-3 form-check">-->
        <!--            <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
        <!--            <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
        <!--        </div>-->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Login</button>
            <?= isset($errors['account'])?"<div class='alert alert-danger'>".$errors['account']."</div>":""?>
            <br>
            <br>
            <a href="signup.php" class="form-link">SignUp</a>
    </form>
        </div>
</div>
<?php
require_once("components/footer.php");
?>
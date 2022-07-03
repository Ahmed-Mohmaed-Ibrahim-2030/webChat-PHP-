

<?php
$image=$_SESSION['user']->image;
?><div class="container" >
<nav class="navbar navbar-expand-lg navbar-light bg-light  " style="position:fixed;top:5px;height:50px; width:83%;z-index: 1">
    <div class="container-fluid">
<!--        <a class="navbar-brand" href="index.php">Home</a>-->
<!--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav w-100 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="persons.php">Persons</a>
                </li>
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="#">Link</a>-->
<!--                </li>-->
                <li class="nav-item dropdown ms-auto">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?=isset($_SESSION['user'])?$_SESSION['user']->first_name." ".$_SESSION['user']->last_name:"Login System" ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        if(isset($_SESSION['user']))

                      echo "<li><a class='dropdown-item' href='logout.php'>Logout</a></li>";
                 else {
                      echo "<li><a class='dropdown-item' href='login.php'>Login</a></li>";
                      echo "<li><a class='dropdown-item' href='signup.php'>SignUp</a></li>";

                 }
                        ?>
                    </ul>
                </li>
                <li>

                    <img class="img-thumbnail ms-5 rounded-circle " style="width:50px; height:50px" src=<?=empty($image)?"./components/file1/default.jpg":"./components/file1/$image"?> alt="">
                </li>
            </ul>
<!--            <form class="d-flex">-->
<!--                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                <button class="btn btn-outline-success" type="submit">Search</button>-->
<!--            </form>-->
        </div>
    </div>
</nav>





<?php

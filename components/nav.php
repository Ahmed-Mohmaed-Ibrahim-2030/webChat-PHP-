<ul class="nav nav-tabs" id="navId" role="tablist">
            <li class="nav-item">
                <a href="#tab1Id" class="nav-link active" data-bs-toggle="tab">Home</a>
            </li>
            <li class="nav-item">
                <a href="#tab1Id" class="nav-link " data-bs-toggle="tab">Products</a>
            </li>

            <li class="nav-item">
                <a href="#tab1Id" class="nav-link " data-bs-toggle="tab">Users</a>
            </li>
            <li class="nav-item">
                <a href="#tab1Id" class="nav-link " data-bs-toggle="tab">Manual Oeder</a>
            </li>

            <li class="nav-item">
                <a href="#tab1Id" class="nav-link " data-bs-toggle="tab">Checks</a>
            </li>

            <li class="nav-item dropdown ms-auto">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?= isset($_SESSION['user'])?$_SESSION['user']["name"]:"Login"; ?>
          </a>
          <ul class="dropdown-menu mt-2" style="" aria-labelledby="navbarDropdownMenuLink">
          <?php
          if(!isset($_SESSION['user']))
          {
              echo "<li><a class='dropdown-item' href='login.php'>Login</a></li>
              <li><a class='dropdown-item' href='index.php'>Registeration</a></li>";
            }
            else
            {
                echo "<li><a class='dropdown-item' href='logout.php'>Logout</a></li>";
          }
          ?>  </ul>
        </li>
        <li>
    <img class="img-thumbnail ms-5 rounded-circle " style="width: 50px;height: 50px;" src=<?=isset($_SESSION['user'])?"file1/".$_SESSION['user']["image"]:"file1/default.jpg"; ?> alt="">
</li>
        </ul>


        <script>
            $('#navId a').click(e => {
                e.preventDefault();
                $(this).tab('show');
            });
        </script>
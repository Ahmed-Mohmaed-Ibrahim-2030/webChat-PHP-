<?php

require_once('./components/header.php');
if(!isset($_SESSION['user']))
{
    header('Location: login.php');
}
require_once('./components/navbar.php');

spl_autoload_register(function ($class_name) {
    include  "C:/xampp/htdocs/task1/database/".  $class_name . ".php";
});
$users=user::index();
//print_r($users);die;
?>

<table class="table table-responsive mt-5">
    <thead>
    <th>
        Name
    </th>
    <th>
        image
    </th>
    <th>
        Chat
    </th>
    </thead>
    <tbody>
  <?php
  foreach($users as $us)
  {
      echo ("<tr>
<td>".
$us['first_name']." ".$us['last_name']."
</td>
<td>
<img class='image-thumbnail rounded-circle ' style='width:100px; height:100px;'  src='./components/file1/".$us['image']."'>
</td>
<td>
<a href='chat.php?id=".$us['id']."'><i class='fa-solid fa-message fs-1'></i></a>
</td>
</td>");

  }


  ?>
    </tbody>
</table>
</div>
<?php
require_once('./components/footer.php');
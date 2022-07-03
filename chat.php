<?php
require_once('./components/header.php');
spl_autoload_register(function ($class_name) {
    include "C:/xampp/htdocs/task1/database/" . $class_name . ".php";
});
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if($_GET['id'])
  {



      if (!isset($_SESSION['user'])) {
          header('Location: login.php');
      }
      require_once('./components/navbar.php');


      $messages=message::index($_GET['id']);
      ?>

      <ul  class="pt-5 alert alert-dark mb-5" style="list-style: none;">
          <?php
          foreach($messages as $messag)
          {
           if ( $messag['sender']==$_SESSION['user']->id){
               echo(" <li class='alert alert-primary rounded-pill my-1 me-auto p-2 ' style='width:fit-content'> ". $messag['message'] ." <span class ='badge badge-primary'>". $messag['time']."</span>   </li> " );}
           else {
                echo (" <li class='alert alert-info rounded-pill my-1 ms-auto p-2  ' style='width:fit-content'> ". $messag['message'] ." <span class ='badge badge-secondary'>". $messag['time']."</span>      </li> ");}
          }

          ?>


      </ul>



      <?php
  }

?>
<form method="post"  class=" " style="position:fixed; bottom:0;">
    <div class="mb-3 row justify-content-between">
<!--        <label for="exampleInputEmail1" class="form-label">Email address</label>-->
        <div class="col-11">

        <textarea class="form-control " name="mesg" id="exampleFormControlTextarea1" rows="1" cols="135"></textarea>
            <input type="hidden" name="second" value="<?=$_GET['id']?>">
        </div>
<div class="col-1">

    <button type="Submit" class="btn btn-primary ">send</button>
</div>
    </div>

</form>
<?php
    require_once('./components/footer.php');
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['mesg'])){
//        spl_autoload_register(function ($class_name) {
//            include "C:/xampp/htdocs/task1/database/" . $class_name . ".php";
//        });
//        session_start();
        message::store($_SESSION['user']->id,$_POST['second'],$_POST['mesg'],$_SESSION['user']->id);
        header("Location:chat.php?id=".$_POST['second']);
    }

}
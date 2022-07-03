<?php
//echo __DIR__ ;
spl_autoload_register(function ($class_name) {
    include  "C:/xampp/htdocs/task1/database/".  $class_name . ".php";
});
//session_start();

//$inde=new queryExecutes("select * from `user` ;");
 class user extends queryExecutes{
   static function index(){
     $query=  new queryExecutes("select * from `user` where id <> ".$_SESSION['user']->id .";");
//
//
return $query->queryExults()->fetch_all( MYSQLI_ASSOC);

     }

static function getUser($email){
    $query=  new queryExecutes("select * from `user` where `email` = '$email'  ;");
//
//
//    echo "select * from `user` where `email` = $email  ;";
    return $query->queryExults()->fetch_object();
}
//static function updateUser($id,$newName){
//    $query=  new queryExecutes("update `user` set first_name=$newName ,las where `id` = $id  ;");
////
////
//    $query->queryExults();
//    return self::getUser($id);
//}
//4
static function addUser($first_name,$last_name,$email,$password)
{
    $query=  new queryExecutes("INSERT INTO `user` (first_name , last_name , email , password  ) VALUES ( '$first_name' , '$last_name' , '$email' , '$password' );");
//      echo ("INSERT INTO `messages` (first_user_id , second_user_id , message , sender ) VALUES ( $first , $second ,'$content', $sender )");
//
    return $query->queryExults();
}

static function updateImage($image){
    $query=  new queryExecutes("UPDATE `user` SET image = '$image' where id = " . $_SESSION['user']->id.";");
    return $query->queryExults();
}
 }
//print_r( user::getUser('ahmed@example.bom')->password);

<?php

//echo __DIR__ ;
spl_autoload_register(function ($class_name) {
    include "C:/xampp/htdocs/task1/database/" . $class_name . ".php";
});
//session_start();

//$inde=new queryExecutes("select * from `user` ;");
class message extends queryExecutes
{
    static function index($id)
    {
        $query=  new queryExecutes("select * from `messages` where (first_user_id= ".$_SESSION['user']->id ." and second_user_id =$id) or (second_user_id= ".$_SESSION['user']->id ." and first_user_id =$id) order by `time`;");
//
//
//        echo ("select * from `messages` where (first_user_id= ".$_SESSION['user']->id ." and second_user_id =$id) or (second_user_id= ".$_SESSION['user']->id ." and first_user_id =$id) ;");
        return $query->queryExults()->fetch_all( MYSQLI_ASSOC);
    }
    static function store($first,$second,$content ,$sender){

        $query=  new queryExecutes("INSERT INTO `messages` (first_user_id , second_user_id , message , sender ) VALUES ( $first , $second ,'$content', $sender );");
//      echo ("INSERT INTO `messages` (first_user_id , second_user_id , message , sender ) VALUES ( $first , $second ,'$content', $sender )");
//
        return $query->queryExults();

    }


}
// print_r(message::index(1));
// print_r(message::store(1,2,'iam happy',1));
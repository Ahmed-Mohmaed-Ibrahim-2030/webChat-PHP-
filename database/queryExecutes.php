<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
//
//var_dump($conn->connect());

class queryExecutes extends Connection{
protected $query;
public function __construct($query){
    $this->query = $query;
}
    public function queryExults(){
$conn=new Connection('localhost','root','','chat' ,'3306');
return $conn->connect()->query($this->query);
    }
}
//$inde=new queryExecutes("select * from `user` ;");
//print_r( $inde->queryExults()->fetch_assoc());
?>

<?php
class connection {
    protected $host;
    protected $databaseName;
    protected $username;
    protected $password;
    protected $port;
    protected $connection;
    public function __construct( $host, $username, $password, $databaseName,$port){
        $this->host = $host;
        $this->databaseName = $databaseName;
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;

}
public function connect(){
 try   {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->databaseName,$this->port);
        if ($this->connection->connect_error) {
            trigger_error($this->connection->connect_error);
            print "Connection error: " . $this->connection->connect_error;
            exit();

        }
    }
    catch(Exception $e) {
     echo "Error: " . $e->getMessage();
    }
return $this->connection;
}



}
//$conn=new Connection('localhost','root','amiminiafci','chat' ,'3306');
//var_dump($conn->connect());
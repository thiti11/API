<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
class connectServer
{
   /*  public function MyConn()
    {
      
        $host = "127.0.0.1";
        $us = "root"; //Username
        $pw = ""; //Password
        $db = "welfare_req";  //database
        $pdo = new PDO("mysql:server=$host; database = $db ",$us ,$pw );
        return $pdo;
    } */


    private $localhost = "localhost";
    private $username = "root"; //Username
    private $password = ""; //Password
    private $database = "welfare_req";  //database
   

    public function MyConn()
    {
        
   
          $pdo=new PDO('mysql:host=' . $this->localhost. ';dbname=' . 
            $this->database, $this->username,$this->password);
           
           $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
          
            return $pdo;
        
      
  }   


}
<?php 
namespace AplicationConfig\Connection;

class Connection{
    protected $host,$db,$user,$passowrd;
    
    function __construct()
    {
        $env = file('.env');
        foreach($env as $line){
            $ex = explode("=", $line);
            // var_dump($ex);
            if( $ex[0] === "HOST" ){
                $this->host = $ex[1];
            }elseif( $ex[0] === "DATABSE" ){
                $this->db = $ex[1];
            }elseif( $ex[0] === "USER" ){
                $this->user = $ex[1];
            }elseif( $ex[0] === "PASSWORD" ){
                $this->password = $ex[1];
            }
        }
    }

    public function get_host(){
        return $this->host;
    }
}
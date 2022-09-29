<?php
class Database extends PDO{
    private $host="localhost";
    private $dbname="gestion_projet";
    private $user="root";
    private $password="";
    public function Connection():PDO{

        return new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->password,
        [PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
    }

    public function __construct()
    {
        parent::__construct("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->password,
        [PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);


    }
}
?>
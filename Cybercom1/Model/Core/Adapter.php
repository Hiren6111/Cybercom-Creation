<?php
namespace Model\Core;
class Adapter {
    private $config = [
        'host' => 'localhost:3307',
        'username' => 'root',
        'password' => '',
        'database' => 'project'
    ];

    private $connect = null;

    public function connection()
    {
        $connect = new \mysqli($this->config['host'], $this->config['username'], $this->config['password'], $this->config['database']);
        $this->setConnect($connect);
        return $this;
    }
    public function getConnect()
    {
        return $this->connect;
    }
    
    public function setConnect(\mysqli $connect)
    {
        $this->connect = $connect;
        return $this;
    }

    public function isConnected()
    {
        if(!$this->getConnect()){
            //echo 'Connection Failed';
            return false;
        }
        return true;
    }
    
    public function insert($query)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = mysqli_query($this->getConnect(),$query);
        
        if (!$result) {
            echo "Not inserted";
        }
        return $this->getConnect()->insert_id;
        
    }
    public function update($query) 
    {
        if(!$this->isConnected()) {
            $this->connection();
        }
        if(!$this->getConnect()->query($query)) {
            return false;
        }
        return true;
    }

    public function fetchRow($query) {
        if(!$this->isConnected()) {
            $this->connection();
        }

        $result=$this->getConnect()->query($query);
        $row=$result->fetch_assoc();
        
        if(!$row){
            return false;
        }
        return $row;
    }

    public function fetchAll($query)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        if (!$rows) {
            return false;
        }
        return $rows;
    }

    public function fetchPairs($query)
    {
        if (!$this->isConnected()) 
        {
        $this->connection();
        }
            $result = $this->getConnect()->query($query);
            $rows = $result->fetch_all();
        if (!$rows) 
        {
            return $rows;
        }
        $columns = array_column($rows,'0');
        $values = array_column($rows,'1');
        return array_combine($columns,$values);
    }
    
    public function delete($query)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);

        if (!$result) {
            return false;
        }
        return true;
    }
}


?>
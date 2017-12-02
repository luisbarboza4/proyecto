<?php
class SQL{
    private $link;
    private $res;
    public function SQL($host,$user,$pass,$dbName = null){
        try {
            $this->link = new PDO("mysql:host=$host;".(($dbName!=null)?"dbname=$dbName":""), $user, $pass);
            return $this;
        }catch (Exception $ex){
            if($ex->getCode() == 1049) {
                $db = $this->SQL($host,$user,$pass);
                if($db->createDB($dbName)) {
                    return $this->SQL($host, $user, $pass, $dbName);
                }
            }
        }
        return null;
    }
    public function query($sql, $params = array()){
        try {
            if (!$params) $params = array();
            $this->res = $this->link->prepare($sql);
             return $this->res->execute($params);
             //$this->res->debugDumpParams();
            //die();
        }catch (Exception $ex){
        }
        return false;
    }
    public function fetch_item($sql, $param=array()){
        if($this->query($sql,$param)){
            return $this->res->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }
    public function fetch_all($sql, $param=array(),$ColumnKey =false,$multi=false){
        if($this->query($sql,$param)){
            $rows = $this->res->fetchAll(PDO::FETCH_ASSOC);
            if($ColumnKey){
                foreach ($rows as $row) {
                    if($multi)
                        $items[$row[$ColumnKey]][] =$row;
                    else
                        $items[$row[$ColumnKey]] =$row;
                }
                return $items;
            }
            return $rows;
        }
        return null;
    }
    public function fetch_one_col($sql, $param=array()){
        if($this->query($sql,$param)){
            return $this->res->fetch(PDO::FETCH_NUM)[0];
        }
    }
    public function insert($sql, $param=array()){
        global $db;
        if($this->query($sql,$param)){
            
            $id = (int)$this->link->lastInsertId();
            $error = $db->getError();
            if($id){
                return $id;
            } else if($error[0] == "0000"){
                return true;
            }
        }
        return 0;
    }
    public function update($sql,$param=array()){
        if($this->query($sql,$param)){
            return $this->res->rowCount();
        }
        return false;
    }
    public function delete($sql,$param=array()){
        if($this->query($sql,$param)){
            return $this->res->rowCount();
        }
        return false;
    }
    public function getError(){
        return $this->res->errorInfo();
    }
    public function createDB($dbname){
        return $this->query("CREATE DATABASE $dbname");
    }
}
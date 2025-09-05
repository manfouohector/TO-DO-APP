<?php  
    require_once 'database.php';
    class TachesDB{
        private $db;

        public function __construct() {
            $this->db = new Database() ;
        }

        public function create($nom){
            $sql = "insert into taches set nom=?";
            $params = array($nom);
            return $this->db->prepareSQL($sql,$params);
        }

        public function read(){
            $sql = "select * from taches";
            $req = $this->db->prepareSQL($sql,null);
            return $this->db->Getdatas($req,false);
        }

        public function readOne($id){
            $sql = "select * from taches where id_taches=?";
            $params = array($id);
            $req = $this->db->prepareSQL($sql,$params);
            return $this->db->Getdatas($req,true);
        }

        public function update($id,$nom){
            $sql = "update taches set nom=? where id_taches=?";
            $params = array($nom,$id);
            return $this->db->prepareSQl($sql,$params);
        }

        public function  delete($id){
            $sql = "delete from taches where id_taches=?";
            $params = array($id);
            return $this->db->prepareSQL($sql,$params);
        }

         public function  deleteAll(){
            $sql = "truncate taches";
            return $this->db->prepareSQL($sql);
        }
    }
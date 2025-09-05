<?php   
    class Database{
        private $dns;
        private $userName;
        private $userpassword;
        private $pdo;

        public function __construct() {
            $this->dns = "mysql:host=localhost;dbname=todolist;charset=utf8";
            $this->userName = "root";
            $this->userpassword = "";
        }

        public function ConnectToDB(){
            try {
                $this->pdo = new PDO($this->dns,$this->userName,$this->userpassword);
            }
            catch(EXception $ex) {
                die("erreur de connection : " . $ex->getMessage());
            }
            return $this->pdo;
        }

        public function prepareSQL($sql,$params = null) {
            $req = $this->ConnectToDB()->prepare($sql);
            if($params == null) {
                $req->execute();
            } else {
                $req->execute($params);
            }
            return $req;
        }

        public function Getdatas($req,$one = true){
            $datas;
            if($one == true){
                $datas = $req->fetch();
            } else {
                $datas = $req->fetchAll();
            }
            return $datas;
        }
    }
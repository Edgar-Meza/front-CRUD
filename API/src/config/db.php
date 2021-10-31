<?php
    class db{
        private $host = "jhdjjtqo9w5bzq2t.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        private $user = "r5yt7vt1w4l3a33z";
        private $password = "gphmkg044hcp3gcc";
        private $database = "us80dn4domphm56j";

        public function conexionDB(){
            $connect = "mysql:dbname=$this->database;host=$this->host";
            $dbConexion = new PDO($connect, $this->user, $this->password);
            $dbConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConexion;
        }
    }

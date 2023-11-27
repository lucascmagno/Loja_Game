<!--Conexão com Banco de Dados-->
<?php
    define ('HOST', 'localhost');
    define ('DATABASENAME', 'lojagame');
    define('USER','root');
    define ('PASSWORD', '');

    class Connect{
        protected $connection;
        
        function __construct()
        {
            $this->connectDatabase();
        }

        function connectDatabase(){
            try
            {
                $this->connection = new PDO('mysql: host=' .HOST. ';dbname='.DATABASENAME, USER, PASSWORD);
            }catch (PDOException $e)
            {
                echo "Error! " . $e->getMessage();
                die();
            }
        }

        function closeConnection(){
            $this->connection = null;
        }

        function __destruct()
        {
            $this->closeConnection();
        }
    } 
?>
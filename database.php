<?php 
class Database {
    public $connection;

    public function __construct($config)
    {
        try {

            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
            $this->connection = new PDO($dsn, "root", "password", 
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            throw ($e);
        }
    }

    public function query($sql) {
        $statement = $this->connection->prepare($sql);

        $statement->execute();

        return $statement;
    }
}
?>
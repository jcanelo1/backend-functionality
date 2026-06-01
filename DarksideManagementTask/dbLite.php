 

<?php
class DbConnect
{
    private $dbPath;
    
    public function __construct()
    {
        $this->dbPath = __DIR__ . '/database.sqlite';
    }

    public function connect()
    {
        $pdo = new PDO("sqlite:" . $this->dbPath);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}

?>
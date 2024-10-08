<?php 

namespace Src\Infrastructure\Database;

namespace Src\Infrastructure\Database;

namespace Src\Infrastructure\Database;

class MysqlDatabaseStructure
{
    private static $instance;
    private $pdo;
    private $table;

    public function __construct(array $config)
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
        $this->pdo = new \PDO($dsn, $config['username'], $config['password']);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(array $config)
    {
        if (!self::$instance) {
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    public function getPDO()
    {
        return $this->pdo;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function setTable(string $table)
    {
        $this->table = $table;
    }

    public function select(array $conditions)
    {
        if (empty($this->table)) {
            throw new \Exception("Table not set.");
        }

        $query = "SELECT * FROM {$this->table} WHERE ";

        $conditionsString = implode(" AND ", array_map(function ($field) {
            return "$field = :$field";
        }, array_keys($conditions)));

        $query .= $conditionsString;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($conditions);

        return $stmt->fetchAll();
    }

    public function execute(array $data)
    {
        if (empty($this->table)) {
            throw new \Exception("Table not set.");
        }

        $fields = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));

        $query = "INSERT INTO {$this->table} ($fields) VALUES ($values)";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($data);
    }
}


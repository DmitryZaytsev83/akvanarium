<?php


namespace app\engine;


use app\traits\TSingleton;
use JetBrains\PhpStorm\Pure;
use PDO;
use PDOStatement;

class Db {
    use TSingleton;

    private array $config = DB_CONFIG;
    private ?PDO $connection = null;

    private function getConnection(): PDO {
        if (is_null($this->connection)) {
            $this->connection = new PDO(
                $this->prepareDSN(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );
        }
        return $this->connection;
    }

    #[Pure] private function prepareDSN(): string {
        return sprintf("%s:host=%s;dbname=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database']
        );
    }

    private function query(string $sql, array $params = []): PDOStatement {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function execute(string $sql, array $params = []): bool {
        $this->query($sql, $params);
        return true;
    }

    public function queryOne(string $sql, array $params = []): array {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = []): array {
        return $this->query($sql, $params)->fetchAll();
    }
}

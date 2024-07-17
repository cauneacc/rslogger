<?php
namespace RsApp\lib\driver;

use RsLogger\driver\DriverInterface;
use RsApp\lib\formatter\Mysql as MysqlFormatter;
use RsLogger\MessageInterface;

class Mysql implements DriverInterface{
    protected \PDO $pdo;
    protected \PDOStatement $stmt;
    
    public function __construct(protected MysqlFormatter $formatter, 
            protected array $mysqlConfiguration) {
        $this->pdo = new \PDO($this->mysqlConfiguration['dsn'], 
                $this->mysqlConfiguration['user'], 
                $this->mysqlConfiguration['password']);
        $tableName=$this->mysqlConfiguration['logTableName'];
        $this->stmt = $this->pdo->prepare('insert into `'.$tableName.'` (`time`, `log_level`, `message`, `metadata`, `trace_id`, `trace_attributes`) '
                . 'values (:time, :logLevel, :message, :metadata, :traceId, :traceAttributes)');
    }
    
    public function log (MessageInterface $message):void{
        $formattedMessage = $this->formatter->format($message);
        $this->stmt->execute($formattedMessage);
    }
} 
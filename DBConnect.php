<?php

    class DBConnect {
        private ?PDO $pdo = null;

        public function getPDO(): PDO {
            if ($this->pdo === null) {
                $config = require __DIR__ . '/config/database.php';
                $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
                $this->pdo = new PDO($dsn, $config['user'], $config['password'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            }
            return $this->pdo;
        }
    }
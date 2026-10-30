<?php
    require_once __DIR__ . '/DBConnect.php';

    class ContactManager {
        private DBConnect $db;

        public function __construct() {
            $this->db = new DBConnect();
        }

        public function findAll(): array {
            $statement = $this->db->getPDO()->query("SELECT * FROM contacts");
            $contacts = $statement->fetchAll();

            var_dump($contacts);

            return $contacts;
        }
    }
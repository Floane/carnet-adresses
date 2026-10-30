<?php
    require_once __DIR__ . '/DBConnect.php';
    require_once __DIR__ . '/Contact.php';

    class ContactManager {
        private DBConnect $db;

        public function __construct() {
            $this->db = new DBConnect();
        }

        /**
         * @return Contact[]
         */
        public function findAll(): array {
            $statement = $this->db->getPDO()->query("SELECT * FROM contacts");
            $rows = $statement->fetchAll();

            $contacts = [];

            foreach ($rows as $row) {
                $contact = new Contact();
                $contact->setId($row['id']);
                $contact->setName($row['nom']);
                $contact->setEmail($row['email']);
                $contact->setPhone($row['phone_number']);

                $contacts[] = $contact;
            }

            return $contacts;
        }

        public function findById(int $id): ?Contact {
            $statement = $this->db->getPDO()->prepare("SELECT * FROM contacts WHERE id = :id");
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();

            $row = $statement->fetch();

            if ($row === false) {
                return null;
            }

            $contact = new Contact();
            $contact->setId($row['id']);
            $contact->setName($row['nom']);
            $contact->setEmail($row['email']);
            $contact->setPhone($row['phone_number']);

            return $contact;
        }
    }
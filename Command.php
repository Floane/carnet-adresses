<?php

    require_once __DIR__ . '/ContactManager.php';

    class Command {
        private ContactManager $manager;

        public function __construct() {
            $this->manager = new ContactManager();
        }

        public function list(): void {
            $contacts = $this->manager->findAll();
            echo "Liste des contacts :" . PHP_EOL;
            echo "-------------------" . PHP_EOL;
            echo "ID | Nom | Email | Téléphone" . PHP_EOL;
            echo "-------------------" . PHP_EOL;
            foreach ($contacts as $contact) {
                echo $contact->toString() . PHP_EOL;
            }
        }

        public function detail(int $id): void {
            $contact = $this->manager->findById($id);

            if ($contact === null) {
                echo "Aucun contact avec l'ID : " . $id . PHP_EOL;
                return;
            }

            echo $contact->toString() . PHP_EOL;
        }
    }
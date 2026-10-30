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

        public function create(string $name, string $email, string $phone): void {
            $contact = new Contact();
            $contact->setName($name);
            $contact->setEmail($email);
            $contact->setPhone($phone);

            $this->manager->create($contact);
            echo "Contact créé avec l'id : " . $contact->getId() . PHP_EOL;
        }

        public function delete(int $id): void {
            $contact = $this->manager->findById($id);

            if ($contact === null) {
                echo "Aucun contact avec l'ID : " . $id . PHP_EOL;
                return;
            }

            $answer = strtolower(trim(readline("Êtes-vous sûr de vouloir supprimer le contact avec l'ID $id ? (oui/non) : ")));

            if ($answer === 'oui') {
                $this->manager->delete($id);
                echo "Le contact " . $id . " a été supprimé." . PHP_EOL;
            } else {
                echo "Suppression annulée." . PHP_EOL;
            }
        }

            public function help(): void {
                echo "Commandes disponibles :" . PHP_EOL;
                echo "  list                             Afficher tous les contacts" . PHP_EOL;
                echo "  detail [id]                      Afficher un contact" . PHP_EOL;
                echo "  create [name], [email], [phone]  Créer un contact" . PHP_EOL;
                echo "  delete [id]                      Supprimer un contact" . PHP_EOL;
                echo "  quit                             Quitter le programme" . PHP_EOL;
            }
    }
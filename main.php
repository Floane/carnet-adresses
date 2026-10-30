<?php 

    require_once __DIR__ . '/ContactManager.php';

    $manager = new ContactManager();

    while (true) {
        $line = strtolower(trim(readline("Entrez votre commande : ")));

        if ($line === 'list') {
            $contacts = $manager->findAll();
            echo "Liste des contacts :" . PHP_EOL;
            echo "-------------------" . PHP_EOL;
            echo "ID | Nom | Email | Téléphone" . PHP_EOL;
            echo "-------------------" . PHP_EOL;
            foreach ($contacts as $contact) {
                echo $contact->toString() . PHP_EOL;
            }
        }
        else {
            echo "Vous avez saisi : " . $line . PHP_EOL;
        }
    }
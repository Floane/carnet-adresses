<?php 

    require_once __DIR__ . '/Command.php';

    $command = new Command();

    while (true) {
        $line = strtolower(trim(readline("Entrez votre commande : ")));

        if ($line === 'list') {
            $command->list();
        }
        else {
            echo "Vous avez saisi : " . $line . PHP_EOL;
        }
    }
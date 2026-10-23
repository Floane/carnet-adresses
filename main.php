<?php 
    while (true) {
        $line = strtolower(trim(readline("Entrez votre commande : ")));

        if ($line === 'list') {
            echo "Liste des contacts :" . PHP_EOL;
        }
        else {
            echo "Vous avez saisi : " . $line . PHP_EOL;
        }
    }
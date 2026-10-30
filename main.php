<?php 

    require_once __DIR__ . '/Command.php';

    $command = new Command();

    while (true) {
        $line = strtolower(trim(readline("Entrez votre commande : ")));

        if ($line === 'list') {
            $command->list();
        }
        elseif (preg_match('/^detail\s+(\d+)$/', $line, $matches)) {
            $command->detail((int)$matches[1]);
        }
        else {
            echo "Vous avez saisi : " . $line . PHP_EOL;
        }
    }
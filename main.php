<?php 

    require_once __DIR__ . '/Command.php';

    $command = new Command();

    while (true) {
        $line = trim(readline("Entrez votre commande : "));

        if ($line === 'list') {
            $command->list();
        } elseif (preg_match('/^detail\s+(\d+)$/', $line, $matches)) {
            $command->detail((int)$matches[1]);
        } elseif (preg_match('/^create\s+([^,]+),([^,]+),([^,]+)$/', $line, $matches)) {
            $command->create(trim($matches[1]), trim($matches[2]), trim($matches[3]));
        } elseif (preg_match('/^create\b/', $line)) {
            echo "Syntaxe : create [name], [email], [phone]" . PHP_EOL;
        } else {
            echo "Vous avez saisi : " . $line . PHP_EOL;
        }
    }
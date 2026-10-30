<?php

    require_once __DIR__ . '/Command.php';

    $command = new Command();

    while (true) {
        $line = trim(readline("Entrez votre commande : "));

        if ($line === 'quit') {
            echo "Au revoir !" . PHP_EOL;
            break;
        }

        if ($line === '') {
            continue;
        }

        try {
            if ($line === 'list') {
                $command->list();
            } elseif (preg_match('/^detail\s+(\d+)$/', $line, $matches)) {
                $command->detail((int) $matches[1]);
            } elseif (preg_match('/^delete\s+(\d+)$/', $line, $matches)) {
                $command->delete((int) $matches[1]);
            } elseif (preg_match('/^create\s+([^,]+),([^,]+),([^,]+)$/', $line, $matches)) {
                $command->create(trim($matches[1]), trim($matches[2]), trim($matches[3]));
            } elseif (preg_match('/^create\b/', $line)) {
                echo "Syntaxe : create [name], [email], [phone]" . PHP_EOL;
            } else {
                echo "Commande inconnue : " . $line . PHP_EOL;
                $command->help();
            }
        } catch (PDOException $e) {
            echo "Erreur de base de données : impossible d'exécuter la commande." . PHP_EOL;
            echo "Détail : " . $e->getMessage() . PHP_EOL;
        }
    }
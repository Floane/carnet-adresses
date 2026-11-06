<?php

    require_once __DIR__ . '/Command.php';

    $command = new Command();

    while (true) {
        $line = trim(readline("Entrez votre commande : "));

        if ($line === '') {
            continue;
        }

        if ($line === 'quit') {
            echo "Au revoir !" . PHP_EOL;
            break;
        }

        $parts = explode(' ', $line, 2);
        $commandName = $parts[0];
        $args = trim($parts[1] ?? '');

        try {
            switch ($commandName) {
                case 'list':
                    $command->list();
                    break;

                case 'detail':
                    if (ctype_digit($args)) {
                        $command->detail((int)$args);
                    } else {
                        echo "Syntaxe : detail [id]" . PHP_EOL;
                    }
                    break;

                case 'delete':
                    if (ctype_digit($args)) {
                        $command->delete((int)$args);
                    } else {
                        echo "Syntaxe : delete [id]" . PHP_EOL;
                    }
                    break;

                case 'create':
                    $values = array_map('trim', explode(',', $args));
                    if (count($values) === 3 && !in_array('', $values, true)) {
                        $command->create($values[0], $values[1], $values[2]);
                    } else {
                        echo "Syntaxe : create [name], [email], [phone]" . PHP_EOL;
                    }
                    break;

                case 'modify':
                    $values = array_map('trim', explode(',', $args));
                    if (count($values) === 4 && ctype_digit($values[0]) && !in_array('', $values, true)) {
                        $command->modify((int)$values[0], $values[1], $values[2], $values[3]);
                    } else {
                        echo "Syntaxe : modify [id], [name], [email], [phone]" . PHP_EOL;
                    }
                    break;

                default:
                    echo "Commande inconnue : " . $commandName . PHP_EOL;
                    $command->help();
                    break;
            }
        } catch (PDOException $e) {
            echo "Erreur de base de données : impossible d'exécuter la commande." . PHP_EOL;
            echo "Détail : " . $e->getMessage() . PHP_EOL;
        }
    }
<?php
require_once 'DBConnect.php';
require_once 'Contact.php';
require_once 'ContactManager.php';
require_once 'Command.php';

$commandClass = new Command();


while (true) {

    $line = readline("Entrez votre commande (help, list, detail, create, delete, quit) : ");

    if ($line == 'list') {
        $commandClass->list(); 
        continue;
    }

    if (preg_match('/^detail (.*)$/', $line, $matches)) {
        $commandClass->detail($matches[1]);
        continue;
    }

    if (preg_match('/^create (.*), (.*), (.*)$/', $line, $matches)) {
        $commandClass->create($matches[1], $matches[2], $matches[3]);
        continue;
    }

    if (preg_match('/^delete (.*)$/', $line, $matches)) {
        $commandClass->delete($matches[1]);
        continue;
    }

    if ($line == "quit") {
        echo "Vous avez bien quitté le gestionnaire de carnet d'adresse";
        break;
    }
    
        echo "Commande non valide : $line\n";
    
}





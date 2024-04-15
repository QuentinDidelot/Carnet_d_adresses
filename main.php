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

    if ($line == "quit") {
        echo "Vous avez bien quitté le gestionnaire de carnet d'adresse";
        break;
    }

    else{
        echo "Commande non valide : $line\n";
    }
    
}





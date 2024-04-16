<?php

/**
 * Cette classe permet de gérer les interactions avec la table contact. C'est elle qui s'occupe
 * d'écrire les requêtes à la base de données Mysql, mais aussi de transformer les résultats en objets Contact.
 */

class ContactManager
{

    private $db;

    public function __construct()
    {
        
        $this->db = DBConnect::getInstance()->getPDO();
    }


    /* Méthode permettant de trouver tous les contacts de la table "contact
    */

    public function findAll(): array
    {
        $requete = $this->db->prepare("SELECT * FROM contact");
        $requete->execute();

        $contacts = [];
        while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
            $contacts[] = Contact::fromArray($row);
        }
        
        return $contacts;
    }

    

    public function findById(int $id): ?Contact
    {
        $requete = $this->db->prepare("SELECT * FROM contact WHERE id = :id");
        $requete->execute(["id" => $id]);

        $contact = $requete->fetch(PDO::FETCH_ASSOC);
        if (!$contact) {
            return null;
        }
        
        $contact = Contact::fromArray($contact);
        return $contact;
    }


    public function create(string $name, string $email, string $telephone): Contact
    {
        $requete = $this->db->prepare("INSERT INTO contact (name, email, telephone) VALUES (:name, :email, :telephone)");
        $requete->execute(["name" => $name, "email" => $email, "telephone" => $telephone]);
        $id = $this->db->lastInsertId();

        return $this->findById($id);
    }

    public function delete(int $id): void
    {
        $requete = $this->db->prepare("DELETE FROM contact WHERE id = :id");
        $requete->bindParam(":id", $id);
        $requete->execute();
    }
}
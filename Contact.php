<?php


class Contact
{
    private ?int $id;
    private ?string $name;
    private ?string $email;
    private ?string $telephone;

    public function __construct(int $id = null, string $name = null, string $email = null, string $telephone = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->telephone = $telephone;
    }


    public static function fromArray(array $array): Contact
    {
        $contact = new Contact();
        $contact->setId($array['id']);
        $contact->setName($array['name']);
        $contact->setEmail($array['email']);
        $contact->setTelephone($array['telephone']);
        return $contact;
    }

    public function __toString() {
        return $this->id . ", " . $this->name . ", " . $this->email . ", " . $this->telephone . "\n";
    }



    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }

}
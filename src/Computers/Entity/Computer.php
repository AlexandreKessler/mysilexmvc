<?php

namespace App\Computers\Entity;

class Computer
{
    protected $id;
    protected $nom;
    protected $marque;

    public function __construct($id, $nom, $marque)
    {
        $this->id = $id;
        $this->marque = $marque;
        $this->nom = $nom;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getMarque()
    {
        return $this->marque;
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['nom'] = $this->nom;
        $array['marque'] = $this->marque;

        return $array;
    }
}

<?php

namespace App\Association\Entity;
use App\Users\Entity\User;
use App\Computers\Entity\Computer;

class Association
{
    protected $id;
    protected $user;
    protected $computer;


    public function __construct(User $user,$id, $nom, $prenom, $marque)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->marque = $marque;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getPrenom()
    {
        return $this->prenom;
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
        $array['prenom'] = $this->prenom;

        return $array;
    }
}

<?php
require_once(__DIR__ . '/../helpers/db.php');
class Comment
{
    private $id;
    private $description;
    private $idUsers;
    private $idPublications;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setdescription($description)
    {
        $this->description = $description;
    }
    public function setIdUsers($idUsers)
    {
        $this->idUsers = $idUsers;
    }
    public function setIdPublications($idPublications)
    {
        $this->idPublications = $idPublications;
    }


    public function getId(): int
    {
        return $this->id;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getIdUsers(): int
    {
        return $this->idUsers;
    }
    public function getIdPublications(): int
    {
        return $this->idPublications;
    }

    public static function get(int $idUsers = null, int $idPublications = null)
    {
        if ($idUsers) {
            #return commentaire de l'user
        } elseif ($idPublications) {
            #return commentaire where 
        }
    }

    // END CLASS 
}

<?php
require_once(__DIR__ . '/../helpers/db.php');
class Like
{
    private int $id;
    private int $idUsers;
    private int $idPublications;
    private string $created_at;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setIdUsers($idUsers)
    {
        $this->idUsers = $idUsers;
    }
    public function setIdPublications($idPublications)
    {
        $this->idPublications = $idPublications;
    }
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getIdUsers()
    {
        return $this->idUsers;
    }
    public function getIdPublications()
    {
        return $this->idPublications;
    }
    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function addLikes(int $idUsers, int $idPublications): bool
    {
        $sql = "SELECT * FROM `likes` WHERE `likes`.`idUsers` = :idUsers AND `idPublications` = :idPublications";
        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':idPublications', $this->idPublications, PDO::PARAM_INT);
        $sth->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        if (!empty($result->created_at)) {
            return false;
        }

        if (empty($result)) {

            // insert dans table likes 
            $sql = "INSERT INTO `likes` (`idUsers`, `idPublications`, `created_at`) VALUES (:idUsers, :idPublications, NOW())";
            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':idPublications', $this->idPublications, PDO::PARAM_INT);
            $sth->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
            $sth->execute();
            // update colonne like dans table publication 
            $sql = "UPDATE `publications` SET `likes` = likes + 1 WHERE `publications`.`id` = :idPublications";
            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':idPublications', $this->idPublications, PDO::PARAM_INT);
            $sth->execute();
            $result = $sth->rowCount();

            return ($result > 0) ? true : false;
        }
    }



    // END CLASS 
}

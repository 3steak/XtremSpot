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

    /** Methode get permet de retourner les commentaires à valider si 0 paramètres rentrés,
     * Si param = $idUser la méthode retourne les commentaires validés de l'user 
     * Si param = $idPublication la méthode retourne les commentaires validés de la publication
     * get
     *
     * @param  mixed $idUser
     * @param  mixed $idPublication
     * @return array
     */
    public static function get(int $idUser = null, int $idPublication = null): array
    {
        if ($idUser) {
            #return commentaires de l'user
            $sql = 'SELECT `id` as `commentId`, `description`, `validated_at`, `created_at`, `idUsers`, `idPublications`
                    FROM `comments` 
                    WHERE (`validated_at` is not null) AND `idUsers` = :id ;';
            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':id', $idUser, PDO::PARAM_INT);
        } elseif ($idPublication) {
            #return commentaires de la publication
            $sql = 'SELECT `id` as `commentId`, `description`, `validated_at`, `created_at`, `idUsers`, `idPublications`
            FROM `comments` 
            WHERE (`validated_at` is not null) AND `idUsers` = :idPublication ;';
            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':id', $idPublication, PDO::PARAM_INT);
        } else {
            #return commentaires non validés pour modération
            $sql = 'SELECT `id` as `commentId`, `description`, `validated_at`, `created_at`, `idUsers`, `idPublications`
            FROM `comments` 
            WHERE (`validated_at` is null) ;';
            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':id', $idPublication, PDO::PARAM_INT);
        }
        $sth->execute();
        $comments = $sth->fetchAll();
        return $comments;
    }

    /** Methode qui permet d'ajouter un commentaire
     * addComments
     *
     * @return bool
     */
    public function addComments(): bool
    {
        $sql = "INSERT INTO `comments` (`idPublications`, `idUsers`,`description`)
                VALUES (:idPublications, :idUsers, :description);";

        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':idPublications', $this->idPublications, PDO::PARAM_INT);
        $sth->bindValue(':idPublications', $this->idPublications, PDO::PARAM_INT);
        $sth->bindValue(':description', $this->description, PDO::PARAM_STR);

        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }


    /** Methode qui permet de supprimer un commentaire
     * delete
     *
     * @param  mixed $idComments
     * @return bool
     */
    public static function delete(int $idComments): bool
    {
        $sql = 'DELETE FROM `comments` WHERE id = :id;';
        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':id', $idComments, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }

    // END CLASS 
}

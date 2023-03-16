<?php
require_once(__DIR__ . '/../helpers/db.php');
class Comment
{
    private $id;
    private $description;
    private $idUsers;
    private $idPublications;
    private $validated_at;

    /** Allows to set id
     * setId
     *
     * @param  mixed $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**Allows to set description
     * setdescription
     *
     * @param  mixed $description
     * @return void
     */
    public function setdescription($description)
    {
        $this->description = $description;
    }

    /**Allows to set idUsers
     * setIdUsers
     *
     * @param  mixed $idUsers
     * @return void
     */
    public function setIdUsers($idUsers)
    {
        $this->idUsers = $idUsers;
    }


    /** Allows to set idPublication
     * setIdPublications
     *
     * @param  mixed $idPublications
     * @return void
     */
    public function setIdPublications($idPublications)
    {
        $this->idPublications = $idPublications;
    }

    /** Allows to set validated_at
     * setValidated_at
     *
     * @param  mixed $validated_at
     * @return void
     */
    public function setValidated_at(string $validated_at)
    {
        $this->validated_at = $validated_at;
    }

    /** Allows to get id
     * getId
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /** Allows to get Description
     * getDescription
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }


    /** Allows to get idUsers
     * getIdUsers
     *
     * @return int
     */
    public function getIdUsers(): int
    {
        return $this->idUsers;
    }


    /** Allows to get idPublications
     * getIdPublications
     *
     * @return int
     */
    public function getIdPublications(): int
    {
        return $this->idPublications;
    }

    /** Allows to get validated_at
     * getValidated_at
     *
     * @return string
     */
    public function getValidated_at()
    {
        return $this->validated_at;
    }


    /** Allows to get user comment with his id in param
     * getUdserComment
     *
     * @param  mixed $idUser
     * @return array
     */
    public static function getUserComments(int $idUser): array
    {
        #return user's comments
        $sql = 'SELECT `id` as `commentId`, `description`, `validated_at`, `created_at`, `idUsers`, `idPublications`
                FROM `comments` 
                WHERE (`validated_at` is not null) AND `idUsers` = :id ;';
        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':id', $idUser, PDO::PARAM_INT);
        $sth->execute();
        $comments = $sth->fetchAll();
        return $comments;
    }
    /** Methode get permet de retourner les commentaires à valider si 0 paramètres rentrés,
     * Si param = $idPublication la méthode retourne les commentaires validés de la publication
     * get
     *
     * @param  mixed $idPublication
     * @return array
     */
    public static function get(int $idPublication = null): array
    {
        if ($idPublication) {
            #return commentaires de la publication
            $sql = 'SELECT `comments`.`id` as `commentId`, `description`, `comments`.`validated_at`, `comments`.`created_at`, `idUsers`, `idPublications`,`users`.`pseudo`
            FROM `comments` 
            JOIN `users` ON `comments`.`idUsers` = `users`.`id`
            WHERE (`validated_at` is not null) AND `idUsers` = :idPublication ;';
            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':id', $idPublication, PDO::PARAM_INT);
        } else {
            #return commentaires non validés pour modération
            $sql = 'SELECT `comments`.`id` as `commentId`, `comments`.`description`, `comments`.`validated_at`, `comments`.`created_at`, `comments`.`idUsers`, `idPublications`,`users`.`pseudo`,
                    `publications`.`title` AS `publicationTitle`, `publications`.`image_name` as `publicationImg` 
                    FROM `comments` 
                    JOIN `users` ON `comments`.`idUsers` = `users`.`id` 
                    JOIN `publications` ON `comments`.`idPublications` = `publications`.`id` 
                    WHERE (`comments`.`validated_at` is null) 
                    ORDER BY `created_at` ASC;';
            $sth = Database::connect()->prepare($sql);
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


    /** Allows to update comments and validated if admin and $validated_at is informed
     * update
     *
     * @return bool
     */
    public function update(string $validated_at = null): bool
    {
        if ($validated_at) {
            #update validated at and valid the comment or not
            $sql = 'UPDATE `comments` 
            SET  `validated_at`=:validated_at
            WHERE id = :id ;';
            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            $sth->bindValue(':validated_at', $this->validated_at, PDO::PARAM_STR);
        } else {
            $sql = 'UPDATE `comments` 
                SET   `description`=:description,`idPublications`=:idPublications,`idUsers`=:idUsers
                WHERE id = :id ;';
            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            $sth->bindValue(':description', $this->description, PDO::PARAM_STR);
            $sth->bindValue(':idPublications', $this->idPublications, PDO::PARAM_INT);
            $sth->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        }
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

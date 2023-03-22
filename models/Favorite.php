<?php
require_once(__DIR__ . '/../helpers/db.php');
class Favorite
{
    private $id;
    private $idPublications;
    private $idUsers;

    /** Allows to set id
     * setId
     *
     * @param  mixed $id
     * @return void
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /** Allows to set idpublication
     * setIdPublications
     *
     * @param  mixed $idPublications
     * @return void
     */
    public function setIdPublications(int $idPublications)
    {
        $this->idPublications = $idPublications;
    }



    /** Allows to set idUsers
     * setIdUsers
     *
     * @param  mixed $idUsers
     * @return void
     */
    public function setIdUsers(int $idUsers)
    {
        $this->idUsers = $idUsers;
    }



    /** Allows to get Id
     * getId
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**  Allows to get idPublication
     * getIdPublications
     *
     * @return int
     */
    public function getIdPublications(): int
    {
        return $this->idPublications;
    }


    /**  Allows to get idUsers
     * getIdUsers
     *
     * @return int
     */
    public function getIdUsers(): int
    {
        return $this->idUsers;
    }


    /**  Allows to get user's favorite(s)
     * get
     *
     * @param  mixed $idUser
     * @return array
     */
    public static function get(int $idUser): array
    {
        $sql = 'SELECT `favorites`.`id` AS `idFavorites`, `idPublications`, `publications`.`title`, `publications`.`description`, `publications`.`image_name`,`publications`.`marker_longitude`, `publications`.`marker_latitude`, `publications`.`town`, `publications`.`likes`, `categories`.`name` AS `categoryName`, `publications`.`idUsers` AS `publishBy`, `users`.`pseudo`,`users`.`avatar`, `users`.`admin` 
            FROM `favorites` 
            JOIN `users` ON `favorites`.`idUsers` = `users`.`id` 
            JOIN `categories` ON `categories`.`id` = `users`.`idCategories` 
            JOIN `publications` ON `favorites`.idPublications = `publications`.`id` 
            WHERE `users`.`id` = :id;';
        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':id', $idUser, PDO::PARAM_INT);
        $sth->execute();
        $favorites = $sth->fetchAll();
        return $favorites;
    }

    /** Allows to add favorites
     * addFavorites
     *
     * @return bool
     */
    public function addFavorites(): bool
    {
        $sql = "INSERT INTO `favorites` (`idPublications`, `idUsers`)
                VALUES (:idPublications, :idUsers);";

        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':idPublications', $this->idPublications, PDO::PARAM_INT);
        $sth->bindValue(':idPublications', $this->idPublications, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }


    /** Allows to delete Favorites 
     * delete
     *
     * @param  mixed $idFavorites
     * @return bool
     */
    public static function delete(int $idFavorites): bool
    {
        $sql = 'DELETE FROM `favorites` WHERE id = :id;';
        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':id', $idFavorites, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }

    //  END CLASS 
}

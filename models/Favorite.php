<?php
require_once(__DIR__ . '/../helpers/db.php');
class Favorite
{
    private $id;
    private $idPublications;
    private $idUsers;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setIdPublications(int $idPublications)
    {
        $this->idPublications = $idPublications;
    }

    public function setIdUsers(int $idUsers)
    {
        $this->idUsers = $idUsers;
    }



    public function getId(): int
    {
        return $this->id;
    }
    public function getIdPublications(): int
    {
        return $this->idPublications;
    }
    public function getIdUsers(): int
    {
        return $this->idUsers;
    }

    public static function get(int $idUser): array
    {
        $sql = 'SELECT `favorites`.`id` AS `idFavorites`, `idPublications`, `publications`.`title`, `publications`.`description`, `publications`.`marker_longitude`, `publications`.`marker_latitude`, `publications`.`town`, `publications`.`likes`, `categories`.`name` AS `categoryName`, `publications`.`idUsers` AS `publishBy`, `users`.`pseudo`, `users`.`admin` 
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

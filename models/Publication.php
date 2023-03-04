<?php
require_once(__DIR__ . '/../helpers/db.php');
class Publication
{
    private $id;
    private $title;
    private $description;
    private $marker_longitude;
    private $marker_latitude;
    private $town;
    private $id_categories;
    private $id_users;


    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
    public function setDescription(string $description)
    {
        $this->description = $description;
    }
    public function setMarker_longitude(float $marker_longitude)
    {
        $this->marker_longitude = $marker_longitude;
    }
    public function setMarker_latitude(float $marker_latitude)
    {
        $this->marker_latitude = $marker_latitude;
    }
    public function setTown(string $town)
    {
        $this->town = $town;
    }
    public function setId_categories(int $id_categories)
    {
        $this->id_categories = $id_categories;
    }
    public function setId_users(int $id_users)
    {
        $this->id_users = $id_users;
    }





    public function getId(): int
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getMarker_longitude(): float
    {
        return $this->marker_longitude;
    }
    public function getMarker_latitude(): float
    {
        return $this->marker_latitude;
    }
    public function getTown(): string
    {
        return $this->town;
    }
    public function getId_categories(): int
    {
        return $this->id_categories;
    }
    public function getId_users(): int
    {
        return $this->id_users;
    }


    public static function get(int $id = null): array
    {
        if ($id) {
            $sql = 'SELECT * from `publications` WHERE id = :id;';
            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
        } else {
            $sql = 'SELECT * from `publications`;';
            $sth = Database::connect()->prepare($sql);
        }
        $sth->execute();
        $publications = $sth->fetchAll();
        return $publications;
    }


    public function addPublication(): bool
    {
        $sql = "INSERT INTO `publications` (`title`,`description`,`marker_longitude`,`marker_latitude`,`town`,`id_categories`,`id_users`)
                 VALUES (:title,:description,:marker_longitude,:marker_latitude,:town,:id_categories,:id_users);";

        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':title', $this->title, PDO::PARAM_STR);
        $sth->bindValue(':description', $this->description, PDO::PARAM_STR);
        $sth->bindValue(':marker_longitude', $this->marker_longitude, PDO::PARAM_STR);
        $sth->bindValue(':marker_latitude', $this->marker_latitude, PDO::PARAM_STR);
        $sth->bindValue(':town', $this->town, PDO::PARAM_STR);
        $sth->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $sth->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }

    public function update(): bool
    {
        $sql = 'UPDATE `publications` 
                SET  `title`=:title, `description`=:description,
                `marker_longitude`=:marker_longitude,`marker_latitude`=:marker_latitude,
                `town`=:town,`id_categories`=:id_categories,`id_users`=:id_users
                WHERE id = :id ;';

        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sth->bindValue(':title', $this->title, PDO::PARAM_STR);
        $sth->bindValue(':description', $this->description, PDO::PARAM_STR);
        $sth->bindValue(':marker_longitude', $this->marker_longitude, PDO::PARAM_STR);
        $sth->bindValue(':marker_latitude', $this->marker_latitude, PDO::PARAM_STR);
        $sth->bindValue(':town', $this->town, PDO::PARAM_STR);
        $sth->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $sth->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }



    public static function delete($id): bool
    {
        $sql = 'DELETE FROM `publications` WHERE id = :id;';
        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }

    // end class
}

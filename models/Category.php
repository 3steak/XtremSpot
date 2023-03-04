<?php
require_once(__DIR__ . '/../helpers/db.php');
class Category
{
    private int $id;
    private string $name;



    // Setter getter
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function setName(string $name)
    {
        $this->name = $name;
    }



    public function getName(): string
    {
        return $this->name;
    }


    public static function get(int $id = null): array
    {
        if ($id) {
            $sql = 'SELECT * from `categories` WHERE id = :id;';
            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
        } else {
            $sql = 'SELECT * from `categories`;';
            $sth = Database::connect()->prepare($sql);
        }
        $sth->execute();
        $categories = $sth->fetchAll();
        return $categories;
    }

    public function update(): bool
    {
        $sql = 'UPDATE `categories` 
                SET  `name`=:name
                WHERE id = :id ;';

        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sth->bindValue(':name', $this->name, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }

    public function addCategory(): bool
    {
        $sql = "INSERT INTO `categories` (`name`) VALUES (:name);";

        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':name', $this->name, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }


    public static function delete($id): bool
    {
        $sql = 'DELETE FROM `categories` WHERE id = :id;';
        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }




    // FIN CLASS 
}

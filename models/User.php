<?php
require_once(__DIR__ . '/../helpers/db.php');

class User
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $pseudo;
    private  $password;
    private string $email;
    private string $birthday;
    // idcategories recup dans le select value 
    private $id_categories;


    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    public function setPseudo(string $pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setBirthday(string $birthday)
    {
        $this->birthday = $birthday;
    }

    public function setIdCategories(int $id_categories)
    {
        $this->id_categories = $id_categories;
    }






    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getlastname(): string
    {
        return $this->lastname;
    }

    public function getpseudo(): string
    {
        return $this->pseudo;
    }

    public function getpassword()
    {
        return $this->password;
    }

    public function getemail(): string
    {
        return $this->email;
    }

    public function getbirthday(): string
    {
        return $this->birthday;
    }

    public function getIdCategories(): int
    {
        return $this->id_categories;
    }



    public static function get(int $id = null): array
    {
        if ($id) {
            $sql = 'SELECT * from `users` WHERE id = :id;';
            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
        } else {
            $sql = 'SELECT * from `users`;';
            $sth = Database::connect()->prepare($sql);
        }
        $sth->execute();
        $users = $sth->fetchAll();
        return $users;
    }


    public function addUser(): bool
    {
        $sql = "INSERT INTO `users` (`firstname`,`lastname`,`pseudo`,`password`,`email`,`birthday`,`id_categories`)
                 VALUES (:firstname,:lastname,:pseudo,:password,:email,:birthday,:id_categories);";

        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $sth->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $sth->bindValue(':password', $this->password, PDO::PARAM_STR);
        $sth->bindValue(':email', $this->email, PDO::PARAM_STR);
        $sth->bindValue(':birthday', $this->birthday, PDO::PARAM_STR);
        $sth->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }


    public function update(): bool
    {
        $sql = 'UPDATE `users` 
                SET  `firstname`=:firstname, `lastname`=:lastname,
                `pseudo`=:pseudo,`password`=:password,`email`=:email,`birthday`=:birthday, `id_categories`=:id_categories,
                WHERE id = :id ;';

        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $sth->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $sth->bindValue(':password', $this->password, PDO::PARAM_STR);
        $sth->bindValue(':email', $this->email, PDO::PARAM_STR);
        $sth->bindValue(':birthday', $this->birthday, PDO::PARAM_STR);
        $sth->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }


    public static function delete($id): bool
    {
        $sql = 'DELETE FROM `uers` WHERE id = :id;';
        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }

    //  end of class
}

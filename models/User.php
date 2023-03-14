<?php
require_once(__DIR__ . '/../helpers/db.php');

class User
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $pseudo;
    private string  $password;
    private string $email;
    // idcategories recup dans le select value 
    private $idCategories;


    /** Allows to register id
     * setId
     *
     * @param  mixed $id
     * @return void
     */
    public function setId(int $id)
    {
        $this->id = $id;
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

    /** Allows to set Firstname
     * setFirstname
     *
     * @param  mixed $firstname
     * @return void
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /** Allows to set Lastname
     * setLastname
     *
     * @param  mixed $lastname
     * @return void
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }



    /** Allows to set Pseudo
     * setPseudo
     *
     * @param  mixed $pseudo
     * @return void
     */
    public function setPseudo(string $pseudo)
    {
        $this->pseudo = $pseudo;
    }


    /** Allows to set Password
     * setPassword
     *
     * @param  mixed $password
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /** Allows to set Email
     * setEmail
     *
     * @param  mixed $email
     * @return void
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }


    /** Allows to set IdCategories
     * setIdCategories
     *
     * @param  mixed $idCategories
     * @return void
     */
    public function setIdCategories(int $idCategories)
    {
        $this->idCategories = $idCategories;
    }






    /** Allows to get Firstname
     * getFirstname
     *
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /** Allows to get Lastname
     * getlastname
     *
     * @return string
     */
    public function getlastname(): string
    {
        return $this->lastname;
    }

    /** Allows to get Pseudo
     * getpseudo
     *
     * @return string
     */
    public function getpseudo(): string
    {
        return $this->pseudo;
    }

    /** Allows to get Password
     * getpassword
     *
     * @return void
     */
    public function getpassword()
    {
        return $this->password;
    }



    /**Allows to get Email
     * getemail
     *
     * @return string
     */
    public function getemail(): string
    {
        return $this->email;
    }


    /** Allows to get idCategories
     * getIdCategories
     *
     * @return int
     */
    public function getIdCategories(): int
    {
        return $this->idCategories;
    }


    /** Allows to get userlist if param is null,
     * If param = $id return user's information 
     * get
     *
     * @param  mixed $id
     * @return array
     */
    public static function get(int $id = null): array
    {
        if ($id) {
            $sql = 'SELECT `users`.`id`, `lastname`, `firstname`,`pseudo`,`email`, `admin`, `categories`.`name` AS `category`
                    FROM `users` JOIN `categories` ON `users`.`idCategories` = `categories`.`id`
                    WHERE users.id= :id;';

            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
        } else {
            $sql = 'SELECT `users`.`id`, `categories`.`name` AS `category` , `lastname`, `firstname`,`pseudo`,`email`, `admin` 
            FROM `users` JOIN `categories` ON `users`.`idCategories` = `categories`.`id`;';
            $sth = Database::connect()->prepare($sql);
        }
        $sth->execute();
        $users = $sth->fetchAll();
        return $users;
    }


    /** Allows to add user 
     * addUser
     *
     * @return bool
     */
    public function addUser(): bool
    {
        $sql = "INSERT INTO `users` (`firstname`,`lastname`,`pseudo`,`password`,`email`,`idCategories`)
                 VALUES (:firstname,:lastname,:pseudo,:password,:email,:idCategories);";

        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $sth->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $sth->bindValue(':password', $this->password, PDO::PARAM_STR);
        $sth->bindValue(':email', $this->email, PDO::PARAM_STR);
        $sth->bindValue(':idCategories', $this->idCategories, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }


    /** Allows to update infos of user
     * update
     *
     * @return bool
     */
    public function update(): bool
    {
        $sql = 'UPDATE `users` 
                SET  `firstname`=:firstname, `lastname`=:lastname,
                `pseudo`=:pseudo,`password`=:password,`email`=:email, `idCategories`=:idCategories,
                WHERE id = :id ;';

        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $sth->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $sth->bindValue(':password', $this->password, PDO::PARAM_STR);
        $sth->bindValue(':email', $this->email, PDO::PARAM_STR);
        $sth->bindValue(':idCategories', $this->idCategories, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }


    /** Allows to delete user 
     * delete
     *
     * @param  mixed $id
     * @return bool
     */
    public static function delete($id): bool
    {
        $sql = 'DELETE FROM `uers` WHERE id = :id;';
        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }



    /**
     * isMailExist
     *
     * @param  mixed $mail
     * @return bool
     */
    public static function isMailExist(string $email)
    {
        $request = 'SELECT * FROM `users` WHERE `email` = ? ;';
        $sth = Database::connect()->prepare($request);
        $sth->execute([$email]);
        $result = $sth->fetchAll();
        return !empty($result) ?? false;
    }

    //  end of class
}

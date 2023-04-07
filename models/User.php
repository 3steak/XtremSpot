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
    private $admin;
    private $avatar;

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


    /** Allows to set admin
     * setAdmin
     *
     * @param  mixed $admin
     * @return void
     */
    public function setAdmin(int $admin)
    {
        $this->admin = $admin;
    }


    /** Allows to set avatar
     * setAvatar
     *
     * @param  mixed $avatar
     * @return void
     */
    public function setAvatar(string $avatar)
    {
        $this->avatar = $avatar;
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
    public function getEmail(): string
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

    /** Allows to get admin
     * getAdmin
     *
     * @return int
     */
    public function getAdmin(): int
    {
        return $this->admin;
    }


    /** Allows to get avatar
     * getAvatar
     *
     * @return int
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }


    /** Allows to get userlist if param is null,
     * If param = $id return user's information 
     * get
     *
     * @param  mixed $id
     * @return object 
     */
    public static function get(int $id = null): object | array
    {
        if ($id) {
            $sql = 'SELECT `users`.`id`, `lastname`, `firstname`,`pseudo`,`avatar`,`password`,`email`, `admin`, `categories`.`name` AS `category`
                    FROM `users` JOIN `categories` ON `users`.`idCategories` = `categories`.`id`
                    WHERE users.id= :id;';

            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            $users = $sth->fetch();
        } else {
            $sql = 'SELECT `users`.`id`, `categories`.`name` AS `category` , `lastname`, `firstname`,`pseudo`,`avatar`,`email`, `admin` 
            FROM `users` JOIN `categories` ON `users`.`idCategories` = `categories`.`id`;';
            $sth = Database::connect()->prepare($sql);
            $sth->execute();
            $users = $sth->fetchAll();
        }
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


    /** Allows to update user's infos if admin in param  can updateAdmin
     * update
     *
     * @return bool
     */
    public function update(int $admin = null): bool
    {

        if ($admin === 1 || $admin == 0) {

            $sql = 'UPDATE `users` 
                    SET  `admin`=:admin
                    WHERE id = :id ;';

            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            $sth->bindValue(':admin', $this->admin, PDO::PARAM_INT);
            $sth->execute();
            $result = $sth->rowCount();
            return ($result > 0) ? true : false;
        } else {
            $sql = 'UPDATE `users` 
                SET  `firstname`=:firstname, `lastname`=:lastname,
                `pseudo`=:pseudo, `avatar`=:avatar,`email`=:email,`password`=:password, `idCategories`=:idCategories
                WHERE id = :id ;';
            $sth = Database::connect()->prepare($sql);
        }

        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $sth->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $sth->bindValue(':avatar', $this->avatar, PDO::PARAM_STR);
        $sth->bindValue(':email', $this->email, PDO::PARAM_STR);
        $sth->bindValue(':password', $this->password, PDO::PARAM_STR);
        $sth->bindValue(':idCategories', $this->idCategories, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }

    /** Allows to update password
     * newPass
     *
     * @return bool
     */
    public function newPass(): bool
    {
        $sql = 'UPDATE `users`
                SET `password`=:password
                WHERE id = :id;';
        $sth = Database::connect()->prepare($sql);

        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sth->bindValue(':password', $this->password, PDO::PARAM_STR);
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
        $sql = 'DELETE FROM `users` WHERE id = :id;';
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

    //VERIF ID
    /**
     * @param int $id
     * 
     * @return bool
     */
    public static function isIdExist(int $id): bool|object
    {
        $request = 'SELECT * FROM `users` WHERE `id` = ? ;';
        $sth = Database::connect()->prepare($request);
        $sth->execute([$id]);
        $result = $sth->fetch();
        return !empty($result) ?? false;
    }



    /**
     * isPseudoExist
     *
     * @param  mixed $pseudo
     * @return bool
     */
    public static function isPseudoExist(string $pseudo)
    {
        $request = 'SELECT * FROM `users` WHERE `pseudo` = ? ;';
        $sth = Database::connect()->prepare($request);
        $sth->execute([$pseudo]);
        $result = $sth->fetchAll();
        return !empty($result) ?? false;
    }

    /** Allows to get user by mail in param
     * getByMail
     *
     * @param  mixed $email
     * @return object
     */
    public static function getByMail(string $email): object
    {
        $request = 'SELECT * FROM `users` WHERE `email` = :mail ;';
        $sth = Database::connect()->prepare($request);
        $sth->bindValue(':mail', $email);
        $sth->execute();
        $user = $sth->fetch();
        return $user;
    }



    /** Allows to validate user's account with mail in param
     * validateMail
     *
     * @param  mixed $email
     * @return bool
     */
    public static function validateMail(string $email): bool
    {
        $sql = 'UPDATE `users` 
        SET  `validated_at`= NOW()
        WHERE email = :mail ;';

        $sth = Database::connect()->prepare($sql);

        $sth->bindValue(':mail', $email);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }

    //  end of class
}

<?php
require_once(__DIR__ . '/../helpers/db.php');
class Publication
{
    private $id;
    private $title;
    private $description;
    private $image_name;
    private $validated_at;
    private $marker_longitude;
    private $marker_latitude;
    private $town;
    private $idCategories;
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

    /** Allows to set title
     * setTitle
     *
     * @param  mixed $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /** Allows to set description
     * setDescription
     *
     * @param  mixed $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }
    /** Allows to set image_name
     * setImage_name
     *
     * @param  mixed $image_name
     * @return void
     */
    public function setImage_name(string $image_name)
    {
        $this->image_name = $image_name;
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

    /** Allows to set marker_longitude
     * setMarker_longitude
     *
     * @param  mixed $marker_longitude
     * @return void
     */
    public function setMarker_longitude(float $marker_longitude)
    {
        $this->marker_longitude = $marker_longitude;
    }

    /** Allows to set marker_latitude
     * setMarker_latitude
     *
     * @param  mixed $marker_latitude
     * @return void
     */
    public function setMarker_latitude(float $marker_latitude)
    {
        $this->marker_latitude = $marker_latitude;
    }

    /** Allows to set Town
     * setTown
     *
     * @param  mixed $town
     * @return void
     */
    public function setTown(string $town)
    {
        $this->town = $town;
    }

    /** Allows to set idCatagories
     * setIdCategories
     *
     * @param  mixed $idCategories
     * @return void
     */
    public function setIdCategories(int $idCategories)
    {
        $this->idCategories = $idCategories;
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




    /** Allows to get id
     * getId
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /** Allows to get Title
     * getTitle
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }


    /** Allows to get description
     * getDescription
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }


    /** Allows to get image_name
     * getImage_name
     *
     * @return string
     */
    public function getImage_name(): string
    {
        return $this->image_name;
    }

    /** Allows to get validated_at
     * getValidated_at
     *
     * @return string
     */
    public function getValidated_at(): string
    {
        return $this->validated_at;
    }


    /** Allows to get marker_longitude
     * getMarker_longitude
     *
     * @return float
     */
    public function getMarker_longitude(): float
    {
        return $this->marker_longitude;
    }


    /** Allows to get marker_latitude
     * getMarker_latitude
     *
     * @return float
     */
    public function getMarker_latitude(): float
    {
        return $this->marker_latitude;
    }


    /** Allows to get town
     * getTown
     *
     * @return string
     */
    public function getTown(): string
    {
        return $this->town;
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

    /** Allows to get idUsers
     * getIdUsers
     *
     * @return int
     */
    public function getIdUsers(): int
    {
        return $this->idUsers;
    }


    /** Allows to get all publications not validated for CRUD
     * get
     *
     * @param  mixed $userId
     * @return array
     */
    public static function getCrudPublications(): array
    {

        # return all publications validated
        $sql = 'SELECT `publications`.`id`, `publications`.`title`, `publications`.`description`,`publications`.`image_name`, `publications`.`created_at`, `publications`.`marker_longitude`, `publications`.`marker_latitude`, `publications`.`town`, `publications`.`likes`, `categories`.`name` as `categoryName`, `publications`.`idUsers`, `users`.`pseudo`, `users`.`avatar`, `users`.`admin` 
            FROM `publications` 
            JOIN `users` ON `publications`.`idUsers` = `users`.`id` 
            JOIN `categories` ON `categories`.`id` = `users`.`idCategories`
            WHERE (`validated_at` is null)
            ORDER BY `created_at` ASC;';
        $sth = Database::connect()->prepare($sql);
        $sth->execute();
        $publications = $sth->fetchAll();
        return $publications;
    }

    /** Allows to get all towns in DB with a SELECT DISTINCT
     * get
     *
     * @param  mixed $userId
     * @return array
     */
    public static function getTowns(): array
    {
        $sql = 'SELECT DISTINCT `publications`.`town`, `publications`.`id`
                FROM `publications`
                WHERE (`validated_at` is not null);';
        $sth = Database::connect()->prepare($sql);
        $sth->execute();
        $towns = $sth->fetchAll();
        return $towns;
    }

    /** Allows to get validated User's publication with his ID in Param
     * getUserPublication
     *
     * @param  mixed $userId
     * @return void
     */
    public static function getUserPublication(int $userId)
    {

        #return publication filtered by user id for profil or CRUD
        $sql = 'SELECT `publications`.`id`, `publications`.`title`, `publications`.`description`,`publications`.`image_name`, `publications`.`validated_at`,
                        `publications`.`marker_longitude`, `publications`.`marker_latitude`, `publications`.`town`, `publications`.`likes`, `categories`.`name` as `categoryName`, `publications`.`idUsers`, `users`.`pseudo`,`users`.`avatar`, `users`.`admin` 
                FROM `publications` 
                JOIN `users` ON `publications`.`idUsers` = `users`.`id` 
                JOIN `categories` ON `categories`.`id` = `users`.`idCategories` 
                WHERE (`publications`.`validated_at` is not null) AND users.id = :id;';
        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':id', $userId, PDO::PARAM_INT);
        $sth->execute();
        $publications = $sth->fetchAll();
        return $publications;
    }

    /** Allows to get all publications validated if param null 
     * if param is $town get all town's publication
     * get
     *
     * @param  mixed $userId
     * @return array
     */
    public static function get(string $town = null): array
    {

        $sql = 'SELECT `publications`.`id`, `publications`.`title`, `publications`.`description`,`publications`.`image_name`, `publications`.`validated_at`,
                             `publications`.`marker_longitude`, `publications`.`marker_latitude`, `publications`.`town`, `publications`.`likes`, `categories`.`name` as `categoryName`, `publications`.`idUsers`, `users`.`pseudo`,`users`.`avatar`, `users`.`admin` 
                    FROM `publications` 
                    JOIN `users` ON `publications`.`idUsers` = `users`.`id` 
                    JOIN `categories` ON `categories`.`id` = `users`.`idCategories` 
                    WHERE (`publications`.`validated_at` is not null)';
        $sql .= ($town) ? ' AND `publications`.`town` = :town' : '';
        $sql .= ' ORDER BY `publications`.`validated_at` DESC;';

        $sth = Database::connect()->prepare($sql);
        if ($town) {
            $sth->bindValue(':town', $town, PDO::PARAM_STR);
        }
        $sth->execute();
        $publications = $sth->fetchAll();
        return $publications;
    }


    /** Allows to get all publications validated by $idCategories
     * 
     * get
     *
     
     * @return array
     */
    public static function getPublicationByCategory(int $idCategories): array
    {
        # return publication filtered by idCategories
        $sql = 'SELECT `publications`.`id`, `publications`.`title`, `publications`.`description`,`publications`.`image_name`, `publications`.`validated_at`, `publications`.`marker_longitude`, `publications`.`marker_latitude`, `publications`.`town`, `publications`.`likes`, `categories`.`name` as `categoryName`, `publications`.`idUsers`, `users`.`pseudo`,`users`.`avatar`, `users`.`admin` 
                    FROM `publications` 
                    JOIN `users` ON `publications`.`idUsers` = `users`.`id` 
                    JOIN `categories` ON `categories`.`id` = `users`.`idCategories` 
                    WHERE (`publications`.`validated_at` is not null) AND `publications`.`idCategories` = :idCategories
                    ORDER BY `publications`.`validated_at` ASC;';
        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':idCategories', $idCategories, PDO::PARAM_INT);
        $sth->execute();
        $publications = $sth->fetchAll();
        return $publications;
    }


    /** Allows to add publication 
     * addPublication
     *
     * @return bool
     */
    public function addPublication(): bool
    {
        $sql = "INSERT INTO `publications` (`title`,`description`,`image_name`,`marker_longitude`,`marker_latitude`,`town`,`idCategories`,`idUsers`)
                 VALUES (:title,:description,:image_name,:marker_longitude,:marker_latitude,:town,:idCategories,:idUsers);";

        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':title', $this->title, PDO::PARAM_STR);
        $sth->bindValue(':description', $this->description, PDO::PARAM_STR);
        $sth->bindValue(':image_name', $this->image_name, PDO::PARAM_STR);
        $sth->bindValue(':marker_longitude', $this->marker_longitude, PDO::PARAM_STR);
        $sth->bindValue(':marker_latitude', $this->marker_latitude, PDO::PARAM_STR);
        $sth->bindValue(':town', $this->town, PDO::PARAM_STR);
        $sth->bindValue(':idCategories', $this->idCategories, PDO::PARAM_INT);
        $sth->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }


    /** Allows to update publication and validated if admin and $validated_at is informed
     * update
     *
     * @return bool
     */
    public function update(string $validated_at = null): bool
    {
        if ($validated_at) {
            #update validated at and valid the publication or not
            $sql = 'UPDATE `publications` 
            SET  `validated_at`=:validated_at
            WHERE id = :id ;';
            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            $sth->bindValue(':validated_at', $this->validated_at, PDO::PARAM_STR);
        } else {
            $sql = 'UPDATE `publications` 
                SET  `title`=:title, `description`=:description,`image_name`=:image_name,
                `marker_longitude`=:marker_longitude,`marker_latitude`=:marker_latitude,
                `town`=:town,`idCategories`=:idCategories,`idUsers`=:idUsers
                WHERE id = :id ;';

            $sth = Database::connect()->prepare($sql);
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            $sth->bindValue(':title', $this->title, PDO::PARAM_STR);
            $sth->bindValue(':description', $this->description, PDO::PARAM_STR);
            $sth->bindValue(':image_name', $this->image_name, PDO::PARAM_STR);
            $sth->bindValue(':marker_longitude', $this->marker_longitude, PDO::PARAM_STR);
            $sth->bindValue(':marker_latitude', $this->marker_latitude, PDO::PARAM_STR);
            $sth->bindValue(':town', $this->town, PDO::PARAM_STR);
            $sth->bindValue(':idCategories', $this->idCategories, PDO::PARAM_INT);
            $sth->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        }
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }



    /** Allows to delete publication by id
     * delete
     *
     * @param  mixed $id
     * @return bool
     */
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

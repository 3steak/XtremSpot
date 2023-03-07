<?php
require_once(__DIR__ . '/../helpers/db.php');
class Category
{
    private int $id;
    private string $name;

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

    /** Allows to get id
     * getId
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /** Allows to set name
     * setName
     *
     * @param  mixed $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }



    /** Allows to get Name
     * getName
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /** Allows to get all category if param null 
     * get category name if id in param 
     * get
     *
     * @param  mixed $id
     * @return array
     */
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

    /** Allows to update a category
     * update
     *
     * @return bool
     */
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

    /** Allows to add category
     * addCategory
     *
     * @return bool
     */
    public function addCategory(): bool
    {
        $sql = "INSERT INTO `categories` (`name`) VALUES (:name);";

        $sth = Database::connect()->prepare($sql);
        $sth->bindValue(':name', $this->name, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }


    /** Allows to delete a category
     * delete
     *
     * @param  mixed $id
     * @return bool
     */
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

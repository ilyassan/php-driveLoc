<?php
    class Category extends BaseClass {

    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function save()
    {
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        self::$db->query($sql);
        self::$db->bind(':name', $this->name);
        self::$db->execute();
    }

    public function delete()
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        self::$db->query($sql);
        self::$db->bind(':id', $this->id);
        self::$db->execute();
    }


    public static function find(int $id) {
        $sql = "SELECT * FROM categories
                WHERE id = :id";
        self::$db->query($sql);
        self::$db->bind(':id', $id);
        self::$db->execute();

        $result = self::$db->single();
        return new self($result->id, $result->name);
    }
    
    public static function all()
    {
        $sql = "SELECT * FROM categories";

        self::$db->query($sql);
        self::$db->execute();
    
        $result = self::$db->results();

        $categories = [];
        foreach ($result as $category) {
            $categories[] = new self($category["id"], $category["name"]);
        }
    
        return $categories;
    }

}
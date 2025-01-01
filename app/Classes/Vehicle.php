<?php
    class Vehicle extends BaseClass {

    private $id;
    private $name;
    private $model;
    private $seats;
    private $price;
    private $type_id;
    private $category_id;

    public function __construct($id, $name, $model, $seats, $price, $type_id, $category_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->model = $model;
        $this->seats = $seats;
        $this->price = $price;
        $this->type_id = $type_id;
        $this->category_id = $category_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getSeats()
    {
        return $this->seats;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getTypeId()
    {
        return $this->type_id;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public static function find(int $id) {
        $sql = "SELECT * FROM vehicles
                WHERE id = :id";
        self::$db->query($sql);
        self::$db->bind(':id', $id);
        self::$db->execute();

        $result = self::$db->single();
        return new self($result->id, $result->name, $result->model, $result->seats, $result->price, $result->type_id, $result->category_id);
    }
    
    public static function all()
    {
        $sql = "SELECT * FROM vehicles";
        self::$db->query($sql);
        self::$db->execute();

        $result = self::$db->results();
        $vehicles = [];
        foreach ($result as $vehicle) {
            $vehicles[] = new self($vehicle['id'], $vehicle['name'], $vehicle['model'], $vehicle['seats'], $vehicle['price'], $vehicle['type_id'], $vehicle['category_id']);
        }
        return $vehicles;  
    }


    public static function getTopVehiclesByCategory()
    {
        $sqlCategories = "SELECT * FROM categories LIMIT 3";
        self::$db->query($sqlCategories);
        self::$db->execute();
        $categories = self::$db->results();
    
        $result = [];
    
        foreach ($categories as $category) {
            $categoryName = $category['name'];
            $categoryId = $category['id'];
    
            $sqlVehicles = "
                SELECT v.*, AVG(r.rate) as rating, COUNT(r.rate) as rates_count, t.name as type
                FROM vehicles v
                LEFT JOIN ratings r ON r.vehicle_id = v.id
                JOIN types t ON t.id = v.type_id
                WHERE v.category_id = :category_id
                GROUP BY v.id
                ORDER BY rating DESC
                LIMIT 3
            ";
            self::$db->query($sqlVehicles);
            self::$db->bind(':category_id', $categoryId);
            self::$db->execute();
    
            $vehicles = self::$db->results();
            $result[$categoryName] = $vehicles;
        }
    
        return $result;
    }
    
}
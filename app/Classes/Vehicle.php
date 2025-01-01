<?php
    class Vehicle extends BaseClass {

    private $id;
    private $name;
    private $model;
    private $seats;
    private $price;
    private $type_id;
    private $category_id;
    private $rating;

    public function __construct($id, $name, $model, $seats, $price, $type_id, $category_id, $rating = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->model = $model;
        $this->seats = $seats;
        $this->price = $price;
        $this->type_id = $type_id;
        $this->category_id = $category_id;
        $this->rating = $rating;
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

    public function getRating()
    {
        return $this->rating;
    }

    public static function find(int $id) {
        $sql = "SELECT v.*, AVG(r.rate) as rating
                FROM vehicles v
                LEFT JOIN ratings r ON r.vehicle_id = v.id
                WHERE v.id = :id
                GROUP BY v.id";
        self::$db->query($sql);
        self::$db->bind(':id', $id);
        self::$db->execute();


        $result = self::$db->single();
        return new self($result->id, $result->name, $result->model, $result->seats, $result->price, $result->type_id, $result->category_id, $result->rating);
    }
    
    public static function all($filters = [])
    {
        $sql = "SELECT v.*,
                        AVG(r.rate) as rating,
                        COUNT(r.rate) as rates_count,
                        c.name as category,
                        t.name as type
                FROM vehicles v
                JOIN types t ON v.type_id = t.id
                JOIN categories c ON v.category_id = c.id
                LEFT JOIN ratings r ON v.id = r.vehicle_id
                WHERE 1=1 ";
    
        if (isset($filters['name']) && !empty($filters['name'])) {
            $sql .= " AND v.name LIKE :name ";
        }
        if (isset($filters['category_id']) && !empty($filters['category_id'])) {
            $sql .= " AND v.category_id = :category_id ";
        }
        if (isset($filters['min_price']) && !empty($filters['min_price'])) {
            $sql .= " AND v.price >= :min_price ";
        }
        if (isset($filters['max_price']) && !empty($filters['max_price'])) {
            $sql .= " AND v.price <= :max_price ";
        }
    
        $sql .= " GROUP BY v.id ORDER BY rating DESC";
    
        self::$db->query($sql);
    
        if (isset($filters['name']) && !empty($filters['name'])) {
            self::$db->bind(':name', '%' . $filters['name'] . '%');
        }
        if (isset($filters['category_id']) && !empty($filters['category_id'])) {
            self::$db->bind(':category_id', $filters['category_id']);
        }
        if (isset($filters['min_price']) && !empty($filters['min_price'])) {
            self::$db->bind(':min_price', $filters['min_price']);
        }
        if (isset($filters['max_price']) && !empty($filters['max_price'])) {
            self::$db->bind(':max_price', $filters['max_price']);
        }
    
        self::$db->execute();
    
        $result = self::$db->results();
    
        return $result;
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
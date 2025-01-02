<?php
    class Reservation extends BaseClass {

    private $id;
    private $pickup_date;
    private $return_date;
    private $place_id;
    private $vehicle_id;
    private $client_id;

    public function __construct($id, $pickup_date, $return_date, $place_id, $vehicle_id, $client_id)
    {
        $this->id = $id;
        $this->pickup_date = $pickup_date;
        $this->return_date = $return_date;
        $this->place_id = $place_id;
        $this->vehicle_id = $vehicle_id;
        $this->client_id = $client_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPickupDate()
    {
        return $this->pickup_date;
    }

    public function getReturnDate()
    {
        return $this->return_date;
    }

    public function getPlaceId()
    {
        return $this->place_id;
    }

    public function getVehicleId()
    {
        return $this->vehicle_id;
    }

    public function getClientId()
    {
        return $this->client_id;
    }

    public static function find(int $id) {
        $sql = "SELECT * FROM reservations
                WHERE id = :id";
        self::$db->query($sql);
        self::$db->bind(':id', $id);
        self::$db->execute();

        $result = self::$db->single();
        return new self($result->id, $result->from_date, $result->to_date, $result->place_id, $result->vehicle_id, $result->client_id);
    }
    
    public static function all()
    {
        $sql = "SELECT * FROM reservations";

        self::$db->query($sql);
        self::$db->execute();
    
        $results = self::$db->results();

        return $results;
    }

    public static function getReservationsOfClient($clientId, $filters = [])
    {
            $sql = "SELECT r.*,
                           v.name AS vehicle_name,
                           c.name AS category_name,
                           v.price * (DATEDIFF(r.to_date, r.from_date) + 1) AS total_cost
                    FROM reservations r
                    JOIN vehicles v ON r.vehicle_id = v.id
                    JOIN categories c ON v.category_id = c.id
                    WHERE r.client_id = :client_id ";
    
            if (isset($filters['status']) && $filters['status'] !== 'All Status' && !empty($filters['status'])) {
                if ($filters['status'] === 'Upcoming') {
                    $sql .= " AND r.from_date > NOW() ";
                } elseif ($filters['status'] === 'Active') {
                    $sql .= " AND r.from_date <= NOW() AND r.to_date >= NOW() ";
                } elseif ($filters['status'] === 'Completed') {
                    $sql .= " AND r.to_date < NOW() ";
                }
            }
    
            if (isset($filters['start_date']) && !empty($filters['start_date'])) {
                $sql .= " AND r.from_date >= :start_date ";
            }
    
            if (isset($filters['to_date']) && !empty($filters['to_date'])) {
                $sql .= " AND r.to_date <= :to_date ";
            }
    
            $sql .= " ORDER BY r.from_date DESC";
    
            self::$db->query($sql);
            self::$db->bind(':client_id', $clientId);
    
            if (isset($filters['start_date']) && !empty($filters['start_date'])) {
                self::$db->bind(':start_date', $filters['start_date']);
            }
    
            if (isset($filters['to_date']) && !empty($filters['to_date'])) {
                self::$db->bind(':to_date', $filters['to_date']);
            }
    
            if (!self::$db->execute()) {
                return false;
            }
    
            $results = self::$db->results();
    
            return $results;
    }

}
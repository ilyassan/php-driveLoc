<?php
class User extends BaseClass
{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $role_id;

    static public $adminRoleId = 1;
    static public $clientRoleId = 2;

    public function __construct($id, $first_name, $last_name, $email, $password, $role_id)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->role_id = $role_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function isAdmin()
    {
        return $this->role_id == self::$adminRoleId;
    }

    public function isClient()
    {
        return $this->role_id == self::$clientRoleId;
    }

    public function save()
    {
        $sql = "INSERT INTO users (first_name, last_name, email, password_hash, role_id) VALUES (:first_name, :last_name, :email, :password_hash, :role_id)";
        self::$db->query($sql);
        self::$db->bind(':first_name', $this->first_name);
        self::$db->bind(':last_name', $this->last_name);
        self::$db->bind(':email', $this->email);
        self::$db->bind(':password_hash', $this->password);
        self::$db->bind(':role_id', self::$clientRoleId);

        if (self::$db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function findUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        self::$db->query($sql);
        self::$db->bind(':email', $email);
        self::$db->execute();
        $result = self::$db->single();

        if (self::$db->rowCount() > 0) {
            return new self($result->id, $result->first_name, $result->last_name, $result->email, $result->password_hash, $result->role_id);
        } else {
            return false;
        }
    }
}
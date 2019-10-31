<?php
require_once "api/utils/Sanitize.php";
require_once "api/utils/Validate.php";
require_once "api/DBConnection.php";

class Patient
{
    private $id;
    private $first_name;
    private $middle_name;
    private $last_name;
    private $phone;
    private $birth_date;
    private $birth_date_formatted;
    private $email;
    private $street_and_number;
    private $city;
    private $account_number;

    private function __construct()
    {
        $this->id = (int)$this->id;
        try {
            $this->birth_date = new DateTime($this->birth_date);
            $this->birth_date_formatted = $this->birth_date->format("d-m-Y");
            $this->birth_date = $this->birth_date->format("Y-m-d");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function get(int $id): ?self
    {
        if (empty($id)) return null;
        $PDO = DBConnection::getConnection();
        $query = $PDO->prepare("SELECT * FROM patients WHERE id = :id");
        $query->bindParam("id", $id);
        $query->execute();
        if ($query->rowCount() === 1) {
            return $query->fetchObject(__CLASS__);
        } else return null;
    }

    public static function delete(int $id): bool
    {
        $db = DBConnection::getConnection();
        $query = $db->prepare("DELETE FROM patients WHERE id = :id");
        $query->bindParam("id", $id);
        $query->execute();
        return (bool)$query->rowCount();
    }

    public static function fetchAll(string &$searchArgs = null): iterable
    {
        $PDO = DBConnection::getConnection();
        if (empty($searchArgs)) {
            $stmt = $PDO->prepare("SELECT first_name, middle_name, last_name, id FROM Patients ORDER BY last_name, first_name");
        } else {
            $searchArgs = trim($searchArgs);
            $words = explode(" ", $searchArgs);
            $count = count($words);

            $likeClauses = [];
            for ($i = 0; $i < $count; $i++) {
                array_push($likeClauses, "search LIKE ?");
            }

            $PDO = DBConnection::getConnection();
            $stmt = $PDO->prepare(
                "SELECT *, CONCAT(id, first_name, COALESCE(middle_name, ''), last_name)
                          AS search 
                          FROM Patients 
                          HAVING " . implode(" AND ", $likeClauses));

            for ($i = 0; $i < $count; $i++) {
                $stmt->bindValue($i + 1, '%' . $words[$i] . '%', PDO::PARAM_STR);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Patient");
    }

    public static function add(&$first_name, &$middle_name, &$last_name, &$phone, &$birth_date, &$email, &$street_and_number, &$city, &$account_number): bool
    {
        if (self::isValid($first_name, $middle_name, $last_name, $phone, $birth_date, $email, $street_and_number, $city, $account_number)) {
            $PDO = DBConnection::getConnection();
            $query = "INSERT INTO patients 
                (first_name, middle_name, last_name, phone, birth_date, email, street_and_number, city, account_number) 
                VALUES (:first_name, :middle_name, :last_name, :phone, :birth_date, :email, :street_and_number, :city, :account_number)";
            $stmt = $PDO->prepare($query);
            $stmt->bindParam("first_name", $first_name);
            $stmt->bindParam("middle_name", $middle_name);
            $stmt->bindParam("last_name", $last_name);
            $stmt->bindParam("phone", $phone);
            $stmt->bindParam("birth_date", $birth_date);
            $stmt->bindParam("email", $email);
            $stmt->bindParam("street_and_number", $street_and_number);
            $stmt->bindParam("city", $city);
            $stmt->bindParam("account_number", $account_number);

            $stmt->execute();
            return (bool)$stmt->rowCount();
        } else {
            return false;
        }
    }

    public static function update(&$id, &$first_name, &$middle_name, &$last_name, &$phone, &$birth_date, &$email, &$street_and_number, &$city, &$account_number): bool
    {
        if (self::isValid($first_name, $middle_name, $last_name, $phone, $birth_date, $email, $street_and_number, $city, $account_number)) {
            $PDO = DBConnection::getConnection();
            $query = "UPDATE Patients SET
                first_name  = :first_name, middle_name = :middle_name, last_name = :last_name,
                    phone = :phone, birth_date = :birth_date, email = :email, 
                    street_and_number = :street_and_number, city = :city, account_number = :account_number
                    WHERE id = :id";
            $stmt = $PDO->prepare($query);
            $stmt->bindParam("id", $id);
            $stmt->bindParam("first_name", $first_name);
            $stmt->bindParam("middle_name", $middle_name);
            $stmt->bindParam("last_name", $last_name);
            $stmt->bindParam("phone", $phone);
            $stmt->bindParam("birth_date", $birth_date);
            $stmt->bindParam("email", $email);
            $stmt->bindParam("street_and_number", $street_and_number);
            $stmt->bindParam("city", $city);
            $stmt->bindParam("account_number", $account_number);

            $stmt->execute();
            return (bool)$stmt->rowCount();
        } else {
            return false;
        }
    }

    private static function isValid(&$first_name, &$middle_name, &$last_name, &$phone, &$birth_date, &$email, &$street_and_number, &$city, &$account_number, $debug = false): bool
    {
        Sanitize::name($first_name);
        Sanitize::string($middle_name);
        Sanitize::name($last_name);
        Sanitize::string($phone);
        Sanitize::string($email);
        Sanitize::string($street_and_number);
        Sanitize::string($city);
        Sanitize::string($account_number);

        if ($debug) {
            if (!Validate::date($birth_date)) {
                exit("");
            } elseif (empty($first_name)) {
                exit("empty first name");
            } elseif (empty($last_name)) {
                exit("empty last name");
            } elseif (empty($phone)) {
                exit("empty phone number");
            } elseif (empty($email)) {
                exit("empty email");
            } elseif (empty($street_and_number)) {
                exit("empty street and number");
            } elseif (empty($city)) {
                exit("empty city");
            } elseif (empty($account_number)) {
                exit("empty account number");
            }
        }

        return Validate::date($birth_date)
            && !empty($first_name)
            && !empty($last_name)
            && !empty($phone)
            && !empty($email)
            && !empty($street_and_number)
            && !empty($city)
            && !empty($account_number);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getMiddleName(): ?string
    {
        return $this->middle_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function getFullName(): string
    {
        return $this->first_name . (($this->middle_name != null) ? " $this->middle_name " : ' ') . $this->last_name;
    }

    public static function getFullNameFromId(&$id): string
    {
        if (empty($id)) return null;
        $db = DBConnection::getConnection();
        $query = $db->prepare("SELECT first_name, middle_name, last_name FROM patients WHERE id = :id LIMIT 1");
        $query->bindParam("id", $_GET["id"]);
        $query->execute();
        if ($query->rowCount() === 1) {
            $result = $query->fetch();
            return $result["first_name"] . (($result["middle_name"] != null) ? " {$result["middle_name"]} " : ' ') . $result["last_name"];
        } else return null;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getBirthDate(): string
    {
        return $this->birth_date;
    }

    public function getBirthDateFormatted(): string
    {
        return $this->birth_date_formatted;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getStreetAndNumber(): string
    {
        return $this->street_and_number;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getAccountNumber(): string
    {
        return $this->account_number;
    }
}
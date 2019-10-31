<?php

namespace me\dylan\healthOne\medicine;

use me\dylan\healthOne\DBConnection;
use me\dylan\healthOne\utils\Sanitize;
use me\dylan\healthOne\utils\Validate;
use PDO;

class Medicine
{
    private $id;
    private $name;
    private $price;
    private $insured;
    private $effects;
    private $side_effects;
    private $content;
    private $dosage;
    private $instructions;

    private function __construct()
    {
        $this->id = (int)$this->id;
        $this->price = round((float)$this->price, 2);
        $this->insured = (bool)$this->insured;
    }

    public static function get(int &$id): ?self
    {
        if (empty($id)) return null;
        $PDO = DBConnection::getConnection();
        $stmt = $PDO->prepare("SELECT * FROM medicines WHERE id = :id");
        $stmt->bindParam("id", $id);
        $stmt->execute();
        if ($stmt->rowCount() === 1) {
            return $stmt->fetchObject(__CLASS__);
        } else return null;
    }

    public static function delete(int $id): bool
    {
        $db = DBConnection::getConnection();
        $query = $db->prepare("DELETE FROM medicines WHERE id = :id");
        $query->bindParam("id", $id);
        $query->execute();
        return (bool)$query->rowCount();
    }

    public static function fetchAll(string &$searchArgs = null): iterable
    {
        $PDO = DBConnection::getConnection();
        if (empty($searchArgs)) {
            $stmt = $PDO->prepare("SELECT * FROM medicines ORDER BY name");
        } else {
            $stmt = $PDO->prepare("SELECT * FROM medicines WHERE name LIKE :search ORDER BY name");
            $bind = "%$searchArgs%";
            $stmt->bindParam("search", $bind);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Medicine");
    }

    public static function add(&$name, &$price, &$insured, &$effects, &$side_effects, &$content, &$dosage, &$instructions): bool
    {
        if (self::isValid($name, $price, $insured, $effects, $side_effects, $content, $dosage, $instructions)) {
            $PDO = DBConnection::getConnection();
            $query = "INSERT INTO Medicines
                      (name, side_effects, instructions, effects, price, dosage, content, insured)
                      VALUES (:name, :side_effects, :instructions, :effects, :price, :dosage, :content, :insured)";
            $stmt = $PDO->prepare($query);
            $stmt->bindParam("name", $name);
            $stmt->bindParam("price", $price);
            $stmt->bindValue("insured", $insured, PDO::PARAM_BOOL);
            $stmt->bindParam("effects", $effects);
            $stmt->bindParam("side_effects", $side_effects);
            $stmt->bindParam("content", $content);
            $stmt->bindParam("dosage", $dosage);
            $stmt->bindParam("instructions", $instructions);

            $stmt->execute();
            return (bool)$stmt->rowCount();
        } else {
            return false;
        }
    }

    public static function update(&$id, &$name, &$price, &$insured, &$effects, &$side_effects, &$content, &$dosage, &$instructions): bool
    {
        if (self::isValid($name, $price, $insured, $effects, $side_effects, $content, $dosage, $instructions)) {
            $sql = "UPDATE medicines SET name = :name, side_effects = :side_effects, instructions = :instructions, effects = :effects , price = :price, dosage = :dosage, content = :content, insured = :insured WHERE id = :id";

            $PDO = DBConnection::getConnection();
            $stmt = $PDO->prepare($sql);

            $stmt->bindParam("id", $id);
            $stmt->bindParam("name", $name);
            $stmt->bindParam("price", $price);
            $stmt->bindValue("insured", $insured, PDO::PARAM_BOOL);
            $stmt->bindParam("effects", $effects);
            $stmt->bindParam("side_effects", $side_effects);
            $stmt->bindParam("content", $content);
            $stmt->bindParam("dosage", $dosage);
            $stmt->bindParam("instructions", $instructions);

            $stmt->execute();
            return (bool)$stmt->rowCount();
        } else {
            return false;
        }
    }

    private static function isValid(&$name, &$price, &$insured, &$effects, &$side_effects, &$content, &$dosage, &$instructions, $debug = false): bool
    {
        Sanitize::name($name);
        Sanitize::bitBool($insured);
        Sanitize::string($effects);
        Sanitize::string($side_effects);
        Sanitize::string($content);
        Sanitize::string($dosage);
        Sanitize::string($instructions);

        if ($debug) {
            if (!Validate::float($price)) {
                exit("invalid price");
            } elseif (empty($name)) {
                exit("empty name");
            } elseif (empty($effects)) {
                exit("empty effects");
            } elseif (empty($side_effects)) {
                exit("empty side_effects");
            } elseif (empty($content)) {
                exit("empty content");
            } elseif (empty($dosage)) {
                exit("empty dosage");
            } elseif (empty($instructions)) {
                exit("empty instructions");
            }
        }

        return Validate::float($price)
            && !empty($name)
            && !empty($effects)
            && !empty($side_effects)
            && !empty($content)
            && !empty($dosage)
            && !empty($instructions);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): string
    {
        return number_format($this->price, 2, '.', '');
    }

    public function getPriceFormatted(): string
    {
        return number_format($this->price, 2, ',', ' ');
    }

    public function isInsured(): bool
    {
        return $this->insured;
    }

    public function getEffects(): string
    {
        return $this->effects;
    }

    public function getSideEffects(): string
    {
        return $this->side_effects;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getDosage(): string
    {
        return $this->dosage;
    }

    public function getInstructions(): string
    {
        return $this->instructions;
    }
}
<?php

namespace me\dylan\healthOne\recipe;

use DateTime;
use Exception;
use me\dylan\healthOne\DBConnection;
use PDO;

class Recipe
{
    private $id;
    private $date;
    private $amount;
    private $patient_id;
    private $medicine_id;
    private $prescriber_id;
    private $deliverer_id;
    private $delivered;
    private $prepared;
    private $billed;
    private $comment;

    public function __construct()
    {
        $this->id = (int)$this->id;
        try {
            $this->date = new DateTime($this->date);
        } catch (Exception $e) {
        }
        $this->amount = (int)$this->amount;
        $this->patient_id = (int)$this->patient_id;
        $this->medicine_id = (int)$this->medicine_id;
        $this->prescriber_id = (int)$this->prescriber_id;
        $this->deliverer_id = (int)$this->deliverer_id;
        $this->delivered = (bool)$this->delivered;
        $this->prepared = (bool)$this->prepared;
        $this->billed = (bool)$this->billed;
        $this->comment = (string)$this->comment;
    }

    public static function get(int $id): ?self
    {
        $PDO = DBConnection::getConnection();
        $query = $PDO->prepare(
            "SELECT * FROM Recipes WHERE Recipes.id = :id"
        );
        $query->bindParam('id', $id, PDO::PARAM_INT);
        $query->execute();
        if ($query->rowCount() === 1) {
            return $query->fetchObject(__CLASS__);
        } else return null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function getPatientId(): ?int
    {
        return $this->patient_id;
    }

    public function getMedicineId(): ?int
    {
        return $this->medicine_id;
    }

    public function getPrescriberId(): ?int
    {
        return $this->prescriber_id;
    }

    public function getDelivererId(): ?int
    {
        return $this->deliverer_id;
    }

    public function isDelivered(): ?bool
    {
        return $this->delivered;
    }

    public function isPrepared(): ?bool
    {
        return $this->prepared;
    }

    public function isBilled(): ?bool
    {
        return $this->billed;
    }

    public function getComment()
    {
        return $this->comment;
    }
}
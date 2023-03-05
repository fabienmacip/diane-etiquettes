<?php

class MyDate
{
    use Modele;

    private $id;
    private $date;
    private $actif;
    
    public function afficherDate($id)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT * FROM dates WHERE id = ?');
        }
        $date = null;
        if ($stmt->execute([$id])) {
            $date = $stmt->fetchObject('MyDate',[$this->pdo]);
            if (!is_object($date)) {
                $date = null;
            }
        }
        $stmt->closeCursor();
        return $date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

}
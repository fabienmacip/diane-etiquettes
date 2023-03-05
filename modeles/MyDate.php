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

    private function jourSemaine($jour){
        switch($jour) {
            case 0:
                return "Dimanche";
                break;
            case 1:
                return "Lundi";
                break;
            case 2:
                return "Mardi";
                break;
            case 3:
                return "Mercredi";
                break;
            case 4:
                return "Jeudi";
                break;
            case 5:
                return "Vendredi";
                break;
            case 6:
                return "Samedi";
                break;
            default:
                return "";
        }
    }

    public function getDateLong()
    {
        $dt = DateTime::createFromFormat('Y-m-d', $this->date);
        $jour = $dt->format('d');
        $mois = $dt->format('m');
        $an = $dt->format('Y');
        $jourSemaine = $this->jourSemaine($dt->format('w'));

        $dateLong = $jourSemaine." ".$jour." ".$mois." ".$an;

        return $dateLong;
    }


}
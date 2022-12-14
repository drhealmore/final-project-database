<?php
class Card{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getCards(){
        $this->db->query(
            'SELECT *,
            CONCAT_WS(" ", CardID, CardName) as name
            FROM Card
            ORDER BY CardName'
        );
        $results = $this->db->resultSet();

        return $results;
    }

    public function addCard($data){
        $this->db->query("INSERT INTO Card(CardID, CardName, CardHealth, CardAttack, BloodCost, BoneCost, TribeID, FirstSigilID, SecondSigilID) VALUES(:CardID, :CardName, :CardHealth, :CardAttack, :BloodCost, :BoneCost, :TribeID, :FirstSigilID, :SecondSigilID)");
        $this->db->bind(':CardID', $data['CardID']);
        $this->db->bind(':CardName', $data['CardName']);
        $this->db->bind(':CardHealth', $data['CardHealth']);
        $this->db->bind(':CardAttack', $data['CardAttack']);
        $this->db->bind(':BloodCost', $data['BloodCost']);
        $this->db->bind(':BoneCost', $data['BoneCost']);
        $this->db->bind(':TribeID', $data['TribeID']);
        $this->db->bind(':FirstSigilID', $data['FirstSigilID']);
        $this->db->bind(':SecondSigilID', $data['SecondSigilID']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateCard($data){
        $this->db->query("UPDATE Card SET CardName= :CardName, CardHealth= :CardHealth, CardAttack= :CardAttack, BloodCost= :BloodCost, BoneCost= :BoneCost, TribeID= :TribeID, FirstSigilID= :FirstSigilID, SecondSigilID= :SecondSigilID WHERE CardID = :CardID");
        $this->db->bind(':CardID', $data['CardID']);
        $this->db->bind(':CardName', $data['CardName']);
        $this->db->bind(':CardHealth', $data['CardHealth']);
        $this->db->bind(':CardAttack', $data['CardAttack']);
        $this->db->bind(':BloodCost', $data['BloodCost']);
        $this->db->bind(':BoneCost', $data['BoneCost']);
        $this->db->bind(':TribeID', $data['TribeID']);
        $this->db->bind(':FirstSigilID', $data['FirstSigilID']);
        $this->db->bind(':SecondSigilID', $data['SecondSigilID']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteCard($CardID){
        $this->db->query("DELETE FROM Card WHERE CardID = :CardID");

        $this->db->bind(':CardID', $CardID);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getCardByID($CardID){
        $this->db->query('SELECT 
        Card.CardID as CardID, 
        Tribe.TribeName as tribeName,
        Card.CardName as name
        FROM Tribe RIGHT JOIN Card on Tribe.ID = Card.TribeID
        WHERE Card.CardID = :CardID
        ');

        $this->db->bind(':CardID', $CardID);
        $row = $this->db->single();
        return $row;
    }
}
?>
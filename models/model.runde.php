<?php 
class Runde extends DB{
// Variablenliste
    public $m_oid;
    public $c_ts;
    public $m_ts;
    public $Nummer;
    public $resultat;
    public $to_Antwort;
    public $to_Frage;
    public $to_Spiel;
    public $to_User;
    public $ts;
    public $Punkte;
    public $Zeit;
    public $TP;
    public $m_ts_exakt;

    public $dataMapping=array(
        'm_oid'=>'m_oid',
        'Nummer'=>'Nummer',
        'resultat'=>'resultat',
        'to_Antwort'=>'to_Antwort',
        'to_Frage'=>'to_Frage',
        'to_Spiel'=>'to_Spiel',
        'to_User'=>'to_User');
// Konstanten
    const SQL_INSERT='INSERT INTO Runde (Nummer, resultat, to_Antwort, to_Frage, to_Spiel, to_User) VALUES (?,?,?,?,?,?)';
    const SQL_UPDATE='UPDATE Runde SET Nummer=?, resultat=?, to_Antwort=?, to_Frage=?, to_Spiel=?, to_User=?, Punkte=?, Zeit=?, TP=?, m_ts_exakt=? WHERE m_oid=?';
    const SQL_SELECT_PK='SELECT * FROM Runde WHERE m_oid=?';
    const SQL_SELECT_ALL='SELECT * FROM Runde';
    const SQL_DELETE='DELETE FROM Runde WHERE m_oid=?';
    const SQL_PRIMARY='m_oid';

    public $validateMapping=array(
        'm_oid'=>'FILTER_VALIDATE_INT',
        'Nummer'=>'FILTER_VALIDATE_INT',
        'resultat'=>'FILTER_VALIDATE_INT',
        'to_Antwort'=>'FILTER_VALIDATE_INT',
        'to_Frage'=>'FILTER_VALIDATE_INT',
        'to_Spiel'=>'FILTER_VALIDATE_INT',
        'to_User'=>'FILTER_VALIDATE_INT'
    );

    public $sanitizeMapping=array(
        'm_oid'=>'FILTER_SANITIZE_NUMBER_INT',
        'Nummer'=>'FILTER_SANITIZE_NUMBER_INT',
        'resultat'=>'FILTER_SANITIZE_NUMBER_INT',
        'to_Antwort'=>'FILTER_SANITIZE_NUMBER_INT',
        'to_Frage'=>'FILTER_SANITIZE_NUMBER_INT',
        'to_Spiel'=>'FILTER_SANITIZE_NUMBER_INT',
        'to_User'=>'FILTER_SANITIZE_NUMBER_INT'
    );
}
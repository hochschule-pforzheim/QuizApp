<?php 
class Antwort extends DB{
// Variablenliste
    public $m_oid;
    public $c_ts;
    public $m_ts;
    public $Antworttext;
    public $korrekt;
    public $to_Frage;
    public $ts;

    public $dataMapping=array(
        'm_oid'=>'m_oid',
        'Antworttext'=>'Antworttext',
        'korrekt'=>'korrekt',
        'to_Frage'=>'to_Frage');
// Konstanten
    const SQL_INSERT='INSERT INTO Antwort (Antworttext, korrekt, to_Frage) VALUES (?,?,?)';
    const SQL_UPDATE='UPDATE Antwort SET Antworttext=?, korrekt=?, to_Frage=? WHERE m_oid=?';
    const SQL_SELECT_PK='SELECT * FROM Antwort  WHERE m_oid=?';
    const SQL_SELECT_ALL='SELECT * FROM Antwort';
    const SQL_DELETE='DELETE FROM Antwort WHERE m_oid=?';
    const SQL_PRIMARY='m_oid';

    public $validateMapping=array(
        'm_oid'=>'FILTER_VALIDATE_INT',
        'korrekt'=>'FILTER_VALIDATE_INT',
        'to_Frage'=>'FILTER_VALIDATE_INT'
    );

    public $sanitizeMapping=array(
        'm_oid'=>'FILTER_SANITIZE_NUMBER_INT',
        'korrekt'=>'FILTER_SANITIZE_NUMBER_INT',
        'to_Frage'=>'FILTER_SANITIZE_NUMBER_INT'
    );
    
   
}
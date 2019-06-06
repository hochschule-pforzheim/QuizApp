<?php 
class Frage extends DB{
// Variablenliste
    public $m_oid;
    public $c_ts;
    public $m_ts;
    public $beschreibung;
    public $Kategorie;
    public $ts;
    public $antwortzeit;

    public $dataMapping=array(
        'm_oid'=>'m_oid',
        'beschreibung'=>'beschreibung',
        'Kategorie'=>'Kategorie');
// Konstanten
    const SQL_INSERT='INSERT INTO Frage (beschreibung, Kategorie) VALUES (?,?)';
    const SQL_UPDATE='UPDATE Frage SET beschreibung=?, Kategorie=? WHERE m_oid=?';
    const SQL_SELECT_PK='SELECT * FROM Frage WHERE m_oid=?';
    const SQL_SELECT_ALL='SELECT Frage.*, KategorieT.myval, count(Antwort.m_oid) as antworten FROM Frage LEFT JOIN Antwort ON to_Frage=Frage.m_oid INNER JOIN KategorieT On Kategorie=codes GROUP BY Frage.m_oid';
    const SQL_DELETE='DELETE FROM Frage WHERE m_oid=?';
    const SQL_PRIMARY='m_oid';

    public $validateMapping=array(
        'm_oid'=>'FILTER_VALIDATE_INT',
        'Kategorie'=>'FILTER_VALIDATE_INT'
    );

    public $sanitizeMapping=array(
        'm_oid'=>'FILTER_SANITIZE_NUMBER_INT',
        'Kategorie'=>'FILTER_SANITIZE_NUMBER_INT'
    );
    /**
     * 
     */
    Public function showAntworten(){
        $SQL="SELECT * FROM Antwort WHERE to_Frage=?";
        $antworten=db::query($SQL, [$this->m_oid]);
        return $antworten;
    }
    /** Gibt die korrekte Antwort zur aktuellen Frage als Anwort-Objekt zurück
     * 
     * @return \Antwort
     */
    Public function korrekteAnwort(){
            $antwort=new Antwort();
            $SQL="SELECT * FROM Antwort WHERE to_Frage=? and korrekt=1";
            $antwortResult=db::query($SQL, [$this->m_oid]);
            $antwort->import($antwortResult[0]);
            return $antwort;
    }
}
<?php 
class StatusT extends DB{
// Variablenliste
    public $myval;
    public $codes;
    public $valActive;
    public $rno;
    public $ts;

    public $dataMapping=array(
        'myval'=>'myval',
        'codes'=>'codes',
        'valActive'=>'valActive',
        'rno'=>'rno');
// Konstanten
    const SQL_INSERT='INSERT INTO StatusT (myval, codes, valActive, rno) VALUES (?,?,?,?)';
    const SQL_UPDATE='UPDATE StatusT SET myval=?, valActive=?, rno=? WHERE codes=?';
    const SQL_SELECT_PK='SELECT * FROM StatusT WHERE codes=?';
    const SQL_SELECT_ALL='SELECT * FROM StatusT';
    const SQL_DELETE='DELETE FROM StatusT WHERE codes=?';
    const SQL_PRIMARY='codes';

    public $validateMapping=array(
        'codes'=>'FILTER_VALIDATE_INT',
        'valActive'=>'FILTER_VALIDATE_INT',
        'rno'=>'FILTER_VALIDATE_INT'
    );

    public $sanitizeMapping=array(
        'codes'=>'FILTER_SANITIZE_NUMBER_INT',
        'valActive'=>'FILTER_SANITIZE_NUMBER_INT',
        'rno'=>'FILTER_SANITIZE_NUMBER_INT'
    );
}
<?php 
class Avatar extends DB{
// Variablenliste
    public $m_oid;
    public $myval;

    public $dataMapping=array(
        'm_oid'=>'m_oid',
        'myval'=>'myval');
// Konstanten
    const SQL_INSERT='INSERT INTO Avatar (myval) VALUES (?)';
    const SQL_UPDATE='UPDATE Avatar SET myval=? WHERE m_oid=?';
    const SQL_SELECT_PK='SELECT * FROM Avatar WHERE m_oid=?';
    const SQL_SELECT_ALL='SELECT * FROM Avatar';
    const SQL_DELETE='DELETE FROM Avatar WHERE m_oid=?';
    const SQL_PRIMARY='m_oid';

    public $validateMapping=array(
        'm_oid'=>'FILTER_VALIDATE_INT'
    );

    public $sanitizeMapping=array(
        'm_oid'=>'FILTER_SANITIZE_NUMBER_INT'
    );
}
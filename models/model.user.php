<?php 
class User extends DB{
// Variablenliste
    public $m_oid;
    public $c_ts;
    public $m_ts;
    public $nachname;
    public $vorname;
    public $kennung;
    public $passwort;
    public $gruppe;
    public $rating;
    public $nickname;
    public $bild;
    public $ts;

    public $dataMapping=array(
        'm_oid'=>'m_oid',     
        'nachname'=>'nachname',
        'vorname'=>'vorname',
        'kennung'=>'kennung',
        'passwort'=>'passwort',
        'gruppe'=>'gruppe',
        'rating'=>'rating',
        'nickname'=>'nickname',
        'bild'=>'bild',
        'ts'=>'ts',
        'avatar'=>'avatar');
// Konstanten
    const SQL_INSERT='INSERT INTO User (m_oid,  nachname, vorname, kennung, passwort, gruppe, rating, nickname, bild, avatar) VALUES (?,?,?,?,?,?,?,?,?,?)';
    const SQL_UPDATE='UPDATE User SET nachname=?, vorname=?, kennung=?, passwort=?, gruppe=?, rating=?, nickname=?, bild=?, avatar=? WHERE m_oid=?';
    const SQL_SELECT_PK='SELECT * FROM User WHERE m_oid=?';
    const SQL_SELECT_ALL='SELECT * FROM User';
    const SQL_DELETE='DELETE FROM User WHERE m_oid=?';
    const SQL_PRIMARY='m_oid';

    public $validateMapping=array(
        'm_oid'=>'FILTER_VALIDATE_INT',      
        'gruppe'=>'FILTER_VALIDATE_INT',
        'rating'=>'FILTER_VALIDATE_INT'
    );

    public $sanitizeMapping=array(
        'm_oid'=>'FILTER_SANITIZE_NUMBER_INT',
        'gruppe'=>'FILTER_SANITIZE_NUMBER_INT',
        'rating'=>'FILTER_SANITIZE_NUMBER_INT'
    );
    public function login($username,$password){
    $param=array($username,$password);
    
    $SQL="SELECT * FROM User WHERE kennung=? AND passwort=md5(?)";
    
    $result=$this->query($SQL, $param);
    
    if($result){
        $this->import($result);
        $_SESSION['uid']=$this->m_oid;
        $_SESSION['fullName']=$this->vorname." ".$this->nachname;
        return true;
    }else{
        Core::redirect("login",array("message"=>"Sie konnten nicht angemeldet werden"));
        return false;
        
    }   
}
 
  
public  function logout(){
	$_SESSION['uid']="";
	$_SESSION['fullName']="";
        session_destroy();
    
        foreach ($this as $key => $value) {
            $this->$key = null;  // Löscht alle Werte aus dem aktuellen User-Objekt (nicht in der DB)
        }
       
}
    public function knownOpponents(){
        $SQL="SELECT count(User.m_oid) as Partien, if(Ersteller=?,Teilnehmer,Ersteller)  as Gegner , User.nickname, User.rating, User.m_oid  FROM Spiel  INNER JOIN User on if(Ersteller=?,Teilnehmer,Ersteller)=User.m_oid WHERE Ersteller=? Or Teilnehmer=? GROUP BY User.m_oid ORDER BY Spiel.m_oid DESC LIMIT 10";
        $liste=DB::query($SQL, [Core::$user->m_oid,Core::$user->m_oid,Core::$user->m_oid,Core::$user->m_oid]);
        return $liste;
    }
    
}
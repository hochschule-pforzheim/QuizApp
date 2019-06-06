<?php 
class Spiel extends DB{
// Variablenliste
    public $m_oid;
    public $c_ts;
    public $m_ts;
    public $status0;
    public $punkteA;
    public $punkteB;
    public $Teilnehmer;
    public $Ersteller;
    public $Gewinner;
    public $ts;
    public $katA1;
    public $katA2;
    public $katB1;
    public $katB2;
    public $fragenA;
    public $fragenB;
    public $antwortzeit;
    public $roundLength;
    public $roundWait;
    public $standingA;
    public $standingB;
    public $zeitA;
    public $zeitB;
    public $ratingA;   // derived
    public $ratingB;  // derived
    public $ratingPointsA;
    public $ratingPointsB;
    public $TPA;
    public $TPB;
    
    
    
    public $dataMapping=array(
        'm_oid'=>'m_oid',
        'status0'=>'status0',
        'punkteA'=>'punkteA',
        'punkteB'=>'punkteB',
        'Teilnehmer'=>'Teilnehmer',
        'Ersteller'=>'Ersteller',
        'Gewinner'=>'Gewinner');
// Konstanten
    const SQL_INSERT='INSERT INTO Spiel (status0, punkteA, punkteB, Teilnehmer, Ersteller,katA1,katA2) VALUES (?,?,?,?,?,?,?)';
    const SQL_UPDATE='UPDATE Spiel SET status0=?, katB1=?, katB2=? WHERE m_oid=?';
    const SQL_SELECT_PK='SELECT Spiel.*, User.rating as ratingA, User2.rating as ratingB, User.nickname as Host, User2.nickname as Gast FROM Spiel INNER JOIN User ON User.m_oid=Ersteller INNER JOIN User as User2 ON User2.m_oid=Teilnehmer WHERE Spiel.m_oid=?';
    const SQL_SELECT_ALL='SELECT Spiel.*, User.rating as ratingA, User2.rating as ratingB, User.nickname as Host, User2.nickname as Gast FROM Spiel INNER JOIN User ON User.m_oid=Ersteller INNER JOIN User as User2 ON User2.m_oid=Teilnehmer';
    const SQL_DELETE='DELETE FROM Spiel WHERE m_oid=?';
    const SQL_PRIMARY='m_oid';

    public $validateMapping=array(
        'm_oid'=>'FILTER_VALIDATE_INT',
        'status0'=>'FILTER_VALIDATE_INT',
        'punkteA'=>'FILTER_VALIDATE_INT',
        'punkteB'=>'FILTER_VALIDATE_INT',
        'Teilnehmer'=>'FILTER_VALIDATE_INT',
        'Ersteller'=>'FILTER_VALIDATE_INT',
        'Gewinner'=>'FILTER_VALIDATE_INT'
    );

    public $sanitizeMapping=array(
        'm_oid'=>'FILTER_SANITIZE_NUMBER_INT',
        'status0'=>'FILTER_SANITIZE_NUMBER_INT',
        'punkteA'=>'FILTER_SANITIZE_NUMBER_INT',
        'punkteB'=>'FILTER_SANITIZE_NUMBER_INT',
        'Teilnehmer'=>'FILTER_SANITIZE_NUMBER_INT',
        'Ersteller'=>'FILTER_SANITIZE_NUMBER_INT',
        'Gewinner'=>'FILTER_SANITIZE_NUMBER_INT'
    );
    
    public static function eigeneEinladungen(){
        $SQL="SELECT Spiel.c_ts as erstellDatum, Spiel.m_oid as id,  User.* FROM Spiel INNER JOIN User ON Spiel.Teilnehmer=User.m_oid WHERE Spiel.Ersteller=? AND status0=0";
        $param=array(Core::$user->m_oid);
        return self::query($SQL,$param);
    }
     public static function fremdeEinladungen(){
        $SQL="SELECT Spiel.c_ts as erstellDatum, Spiel.m_oid as id,  User.* FROM Spiel INNER JOIN User ON Spiel.Ersteller=User.m_oid WHERE Spiel.Teilnehmer=? AND status0=0";
        $param=array(Core::$user->m_oid);
        return self::query($SQL,$param);
    }
     public static function laufendeSpiele(){
        $SQL="SELECT Spiel.*, User.rating as ratingA, User2.rating as ratingB,User.nickname , User.avatar as avatar1, User2.avatar as avatar2, User2.nickname as nick2, User.m_oid as userid_1, User2.m_oid as userid_2 FROM Spiel INNER JOIN User ON Spiel.Ersteller=User.m_oid INNER JOIN User as User2 ON Spiel.Teilnehmer=User2.m_oid WHERE (Spiel.Teilnehmer=? OR Spiel.Ersteller=?) AND status0=1";
        $param=array(Core::$user->m_oid,Core::$user->m_oid);
        return self::query($SQL,$param);
    }
     public static function beendeteSpiele(){
        $SQL="SELECT Spiel.*,IF(Gewinner=?,'gewonnen','verloren') as ergebnis, User.rating as ratingA, User2.rating as ratingB,User.nickname, User.avatar as avatar1, User2.avatar as avatar2, User2.nickname as nick2, User.m_oid as userid_1, User2.m_oid as userid_2 FROM Spiel INNER JOIN User ON Spiel.Ersteller=User.m_oid INNER JOIN User as User2 ON Spiel.Teilnehmer=User2.m_oid WHERE (Spiel.Teilnehmer=? OR Spiel.Ersteller=?) AND status0=2 ORDER By m_ts DESC";
        $param=array(Core::$user->m_oid, Core::$user->m_oid,Core::$user->m_oid);
        return self::query($SQL,$param);
    }
    
    
    public function erstelleFragen($kategorie,$anzahl=3){
        $fragen=[];
        $liste=Frage::findAll("SELECT * FROM Frage WHERE Kategorie=$kategorie");
        $zahlen=Spiel::Zufallszahlen(3, count($liste));
        for($i=0;$i<=$anzahl-1;$i++){
            
            array_push($fragen,$liste[$zahlen[$i]-1]->m_oid);
        }
        return $fragen;
    }
    public static function Zufallszahlen($anzahl, $gesamt){
        $zahlen=[];
        if($anzahl>$gesamt){
            $anzahl=$gesamt;
        }
        for($i=1;$i<=$anzahl;$i++){
            do{
                $neu= random_int(1,$gesamt);
            } while(in_array($neu,$zahlen));
            array_push($zahlen,$neu);
        }
        return $zahlen;
    }
    /** Gibt für den aktuell angemeldeten User für das aktuelle Spiel die nächste Frage
     * 
     * @return \Frage
     */
    public function  nextFrage(){
     $SQL="SELECT Frage.*, KategorieT.myval, Runde.Nummer, Runde.m_oid as RundenID FROM Frage INNER JOIN KategorieT ON KategorieT.codes=Kategorie  INNER JOIN Runde on Runde.to_Frage=Frage.m_oid WHERE Runde.to_Spiel=? and Runde.to_User=? AND resultat=0  ORDER BY Runde.Nummer LIMIT 1";
     $next=DB::query($SQL, [$this->m_oid, Core::$user->m_oid]);
     $Frage=new Frage;
     $Frage->import($next);
     return $Frage;
    }
      public function  aktuelleFrage(){
     $SQL="SELECT Frage.*, KategorieT.myval, Runde.Nummer, Runde.m_oid as RundenID FROM Frage INNER JOIN KategorieT ON KategorieT.codes=Kategorie  INNER JOIN Runde on Runde.to_Frage=Frage.m_oid WHERE Runde.to_Spiel=? and Runde.to_User=? AND resultat=1  ORDER BY Runde.Nummer  DESC LIMIT 1";
     $next=DB::query($SQL, [$this->m_oid, Core::$user->m_oid]);
     $Frage=new Frage;
     $Frage->import($next);
     return $Frage;
    }
         public function  letzteFrage(){
     $SQL="SELECT Frage.*, KategorieT.myval, Runde.Nummer, Runde.m_oid as RundenID FROM Frage INNER JOIN KategorieT ON KategorieT.codes=Kategorie  INNER JOIN Runde on Runde.to_Frage=Frage.m_oid WHERE Runde.to_Spiel=? and Runde.to_User=? AND resultat<>0  ORDER BY Runde.Nummer  DESC LIMIT 1";
     $next=DB::query($SQL, [$this->m_oid, Core::$user->m_oid]);
     $Frage=new Frage;
     $Frage->import($next);
     return $Frage;
    }
    
    public function getLiveInfo(){
        $id=$this->m_oid;
        $this->renderSpielstand(); // bereitet die Anzeige der Einzelfragen vor
        $rolle="";
        if($this->Ersteller==Core::$user->m_oid){
           $rolle="Ersteller"; 
        }
        if($this->Teilnehmer==Core::$user->m_oid){
            $rolle="Teilnehmer";
        }
        $SQL="SELECT count(Runde.m_oid) as Anzahl FROM Runde INNER JOIN Spiel ON Runde.to_Spiel=Spiel.m_oid WHERE to_Spiel=? AND Ersteller=to_User AND resultat>0" ;
        $anzahl=db::query($SQL, [$id]);
        $this->fragenA=$anzahl[0]->Anzahl;
       
        if($this->fragenA===Null){$this->fragenA=0;}
         
        $SQL="SELECT count(Runde.m_oid) as Anzahl FROM Runde INNER JOIN Spiel ON Runde.to_Spiel=Spiel.m_oid WHERE to_Spiel=? AND Teilnehmer=to_User AND resultat>0" ;
        $anzahl=db::query($SQL, [$id]);
        $this->fragenB=$anzahl[0]->Anzahl;
        if($this->fragenB===Null){$this->fragenB=0;}
        if($rolle=="Teilnehmer"){ $Limit1=" LIMIT ".intval($this->fragenA/$this->roundLength)*$this->roundLength;}
         if($rolle=="Ersteller"){ $Limit2=" LIMIT ".intval($this->fragenB/$this->roundLength)*$this->roundLength;}
       
        $SQL="SELECT sum(Punkte) as Summe,  sum(Runde.Zeit) as gesamtZeit, sum(TP) as TPSumme FROM Runde INNER JOIN Spiel ON Runde.to_Spiel=Spiel.m_oid WHERE to_Spiel=? AND Ersteller=to_User ".$Limit1;
        $summe=db::query($SQL, [$id]);
        $this->punkteA=$summe[0]->Summe;
        $this->zeitA=$summe[0]->gesamtZeit;
        $this->TPA=round($summe[0]->TPSumme,2);
       
        if($this->punkteA===Null){$this->punkteA=0;}
        
        $SQL="SELECT sum(Punkte) as Summe,  sum(Runde.Zeit) as gesamtZeit, sum(TP) as TPSumme FROM Runde INNER JOIN Spiel ON Runde.to_Spiel=Spiel.m_oid WHERE to_Spiel=? AND Teilnehmer=to_User ".$Limit2;
        $summe=db::query($SQL, [$id]);
        $this->punkteB=$summe[0]->Summe;
        $this->zeitB=$summe[0]->gesamtZeit;
          $this->TPB=round($summe[0]->TPSumme,2);
        if($this->punkteB===Null){
            $this->punkteB=0;
            
        }
        $test=1;
    }
    public function renderSpielstand(){
         if($this->Ersteller==Core::$user->m_oid){
           $rolle="Ersteller"; 
        }
        if($this->Teilnehmer==Core::$user->m_oid){
            $rolle="Teilnehmer";
        }
         $SQL="SELECT count(Runde.m_oid) as Anzahl, sum(Runde.Zeit) as gesamtZeit FROM Runde INNER JOIN Spiel ON Runde.to_Spiel=Spiel.m_oid WHERE to_Spiel=? AND Ersteller=to_User AND resultat>0" ;
        $anzahl=db::query($SQL, [$this->m_oid]);
        $this->fragenA=$anzahl[0]->Anzahl;
        if($this->fragenA===Null){$this->fragenA=0;}
         
        $SQL="SELECT count(Runde.m_oid) as Anzahl,  sum(Runde.Zeit) as gesamtZeit FROM Runde INNER JOIN Spiel ON Runde.to_Spiel=Spiel.m_oid WHERE to_Spiel=? AND Teilnehmer=to_User AND resultat>0" ;
        $anzahl=db::query($SQL, [$this->m_oid]);
        $this->fragenB=$anzahl[0]->Anzahl;
         if($this->fragenB===Null){$this->fragenB=0;}
        
        
        
         if($rolle=="Teilnehmer"){
             $Limit1=intval($this->fragenA/$this->roundLength)*$this->roundLength;
            $Limit2=12;
         }
         if($rolle=="Ersteller"){
             $Limit2=intval($this->fragenB/$this->roundLength)*$this->roundLength;
             $Limit1=12;
         }
        
        
        
        /* @var $item Runde */
        $SQL="SELECT * FROM Runde WHERE to_Spiel=? and to_User=? ";
        $liste=db::Query($SQL, [$this->m_oid,$this->Ersteller]);
        $this->standingA="";$i=1;
        foreach($liste as $item){
            switch($item->Punkte){
                case "0":
                    if($i<=$Limit1){
                        $this->standingA=$this->standingA.'<div class="wrongAnswer">'.$i.'</div>';
                    }else{
                        $this->standingA=$this->standingA.'<div class="openAnswer">'.$i.'</div>';
                    }
                    break;
                 case "1":
                     if($i<=$Limit1){
                         $this->standingA=$this->standingA.'<div class="correctAnswer">'.$i.'</div>';
                     }else{
                         $this->standingA=$this->standingA.'<div class="openAnswer">'.$i.'</div>';
                     }
                    
                    break;
                default: 
                      $this->standingA=$this->standingA.'<div class="openAnswer">'.$i.'</div>';
            }
            $i++;
        }
        
        
        /*** Jetzt der Herausforderer */
         $SQL="SELECT * FROM Runde WHERE to_Spiel=? and to_User=? ";
        $liste2=db::Query($SQL, [$this->m_oid,$this->Teilnehmer]);
        $this->standingB="";
        
        $i=1;
        foreach($liste2 as $item){
            switch($item->Punkte){
                case "0":
                    if($i<=$Limit2){
                        $this->standingB=$this->standingB.'<div class="wrongAnswer">'.$i.'</div>';
                       
                    }else{
                          $this->standingB=$this->standingB.'<div class="openAnswer">'.$i.'</div>';
                    }
                   
                    
                    break;
                 case "1":
                     if($i<=$Limit2){
                             $this->standingB=$this->standingB.'<div class="correctAnswer">'.$i.'</div>';
                     }else{
                          $this->standingB=$this->standingB.'<div class="openAnswer">'.$i.'</div>';
                     }
                    break;
                default: 
                      $this->standingB=$this->standingB.'<div class="openAnswer">'.$i.'</div>';
            }
            $i++;
        }
         
         
        
        
    }
    Public function rating(){
        $ratio=$this->ratingA/$this->ratingB;
     
       
        // Gewinner ermitteln
        if($this->punkteA>$this->punkteB ||($this->punkteA==$this->punkteB && $this->TPA>$this->TPB )){
            $this->Gewinner=$this->Ersteller;
            if($this->ratingA>$this->ratingB){ // Favoritensieg               
                $this->ratingPointsA= $this->pointLimit(ceil(12/$ratio));
                $this->ratingPointsB=-$this->pointLimit(intval(12/$ratio));
            }else{   // Underdog                         
                $this->ratingPointsA= $this->pointLimit(ceil(12/$ratio));
                $this->ratingPointsB=-$this->pointLimit(intval(12/$ratio));
                
            }
            
        }elseif($this->punkteA<$this->punkteB || ($this->punkteA==$this->punkteB && $this->TPB>$this->TPA )){
             $this->Gewinner=$this->Teilnehmer;
             $ratio=1/$ratio;
              if($this->ratingA<$this->ratingB){ // Favoritensieg               
                $this->ratingPointsB= $this->pointLimit(ceil(12/$ratio));
                $this->ratingPointsA=-$this->pointLimit(intval(12/$ratio));
            }else{   // Underdog                         
                $this->ratingPointsB= $this->pointLimit(ceil(12/$ratio));
                $this->ratingPointsA=-$this->pointLimit(intval(12/$ratio));
                
            }
            
            
            
            
            
        }else{ // Tiebreaker
            if($this->TPA!=$this->TPB){
                
            }else{ // unentschieden
                $this->Gewinner=0;
                if($this->ratingA>$this->ratingB){
                     $this->ratingPointsA= -$this->pointLimit(intval(($ratio-1)*12));
                     $this->ratingPointsB= +$this->pointLimit(ceil(($ratio-1)*12));
                }else{
                    $this->ratingPointsA= +$this->pointLimit(intval((1/$ratio-1)*12));
                     $this->ratingPointsB= -$this->pointLimit(ceil((1/$ratio-1)*12));
                }
                    
            }
        }
   
    }
    private function pointLimit($value, $limit=25){
        if($value>$limit){
            $value=$limit;
        }
        return $value;
    }
}


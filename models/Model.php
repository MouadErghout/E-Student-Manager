<?php


abstract class Model
{
    public $id=0;
    //declaration d'une variable qui va contenir des objets PDO
    protected static $pdo=null;

    public function __construct()
    {
        $info_cnx= file(ROOT.".env");
        //$info_cnx= file("../.env");
        $server=trim(explode("=",$info_cnx[1])[1]);
        $dbname=trim(explode("=",$info_cnx[3])[1]);
        $user=trim(explode("=",$info_cnx[4])[1]);
        $password=trim(explode("=",$info_cnx[5])[1]);
        self::$pdo=new PDO('mysql:host='.$server.';dbname='.$dbname,$user,$password);

    }

    public function save()
    {
        $data=(array)$this;
        if($this->id==0)
        {
            $req=" insert into ".get_class($this)." (";
            $fields=$values="";
            foreach ($data as $key=>$value)
            {
                if($key!='id')
                {
                    $fields .= $key . ",";
                    $values .= "'" . $value . "',";
                }
            }
            $fields= substr($fields,0,-1);
            $values= substr($values,0,-1);
            $req.=$fields.") values (".$values.")";

            self::$pdo->exec($req);

        }else{
            $req="update ".get_class($this)." set ";
            foreach ($data as $key=>$value)
                if($key!='id')
                    $req.=$key."='".$value."',";
            $req= substr($req,0,-1);
            $req.=" where id=".$this->id;
            self::$pdo->exec($req);
        }
    }

    public function delete()
    {
        $req="delete from ".get_class($this)." where login='".$this->login."'";
        self::$pdo->exec($req);
    }

    public static function find($login)
    {
        $class=get_called_class();
        $req="select * from ".get_called_class()." where login='".$login."'";
        //echo $req;
        $o=new $class();
        $res=self::$pdo->query($req);
        $T=$res->fetch(PDO::FETCH_ASSOC);
        if($T!=false) {
            foreach ($T as $key => $value)
                $o->$key = $value;
            return $o;
        }else
        return false;

    }

    public static function login($login,$password)
    {
        $classe=get_called_class();
        $req="select * from utilisateur where login='".$login."' and password='".$password."'";
        new $classe();
        $res=self::$pdo->query($req);
        $result=$res->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function All($where="")
    {
        $classe=get_called_class();
        $req="select * from ".$classe;
        if($where!="")
            if($classe=='Eleve')
                $req.=" where niveau='".$where."'";
            else
                $req.=" where login='".$where."'";
        new $classe();
        $res=self :: $pdo->query($req);
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public static function MoyNiv($niveau)
    {
        $req="select AVG(moyenne) from moyenne where niveau='".$niveau."'";
        new Moyenne();
        $res=self :: $pdo->query($req);
        $moy=$res->fetch()['AVG(moyenne)'];
        return $moy!=NULL?$moy:0;
    }
}
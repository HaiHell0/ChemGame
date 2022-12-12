<?php
require_once('../settings.php');

class GameTypeItem
{
    /* @var MyPDO */
    protected $db;



    public function __construct()
    {
        $this->db = MyPDO::instance();
    }

    public function find($field, $value)
    {
        return $this->db->run("SELECT * FROM gametype WHERE $field = ?", [$value]);
    }


    public function authenticate($username, $password)
    {
        $query = $this->db->run("SELECT * FROM gametype WHERE username = ?", [$username]);
        if ($query->rowCount() == 0)
            return false;
        $result = $query->fetch();
        if ($result['password'] != $password)
            return false;
        return true;
    }

    public function addGame($adminid, $game_name, $php, $csc, $js)
    {
        $query = $this->find('GAME_NAME', $game_name);
        if ($query->rowCount() > 0)
            return false;
        $this->db->run('INSERT INTO gametype(admin_id,game_name,php,css,js) VALUES(?,?,?,?,?)', [$adminid, $game_name, $php, $csc, $js]);
        return true;
    }

    public function getAllGames()
    {
        return $this->db->run("SELECT * FROM gametype")->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function removeGameType($id)
    {
        $query = $this->find('game_type_id', $id);
        if ($query->rowCount() == 0)
            return false;
        $this->db->run('DELETE FROM gametype WHERE game_type_id=?', [$id]);
        return true;
    }

}

///$gameTypeItem = new GameItem();
//$gameTypeItem ->addGame(
//   "2","Test game ","dirPhp","dirCss","dirJs");


?>